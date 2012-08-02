<?php
class APIRequest {
    function __construct() {

    }
    
    /**
        Hashing mechanism since API only accepts encoded message body for POST transactions
        @param $data - the string to be hashed
    **/
    function md5_base64 ( $data ){
        //emulate perl's md5_base64 hashing
        return base64_encode(pack('H*',md5($data)));
    }

    /**
        Transactions via API are via signed request
        @param $data - the string to be hashed
    **/
    function signed_request($request_body = '') {
        $client_id = $this->client_id;
        $uri = parse_url($this->url);
        //only requests with message body are needed
        $content_md5 = '';
        if ($request_body != '')
        $content_md5 = $this->md5_base64($request_body);
        //the values under the options will be used on signing and building the header
        $options = array(
                'Date'              => date('r'),
                'Content-type'      => '',
                'Content-MD5'       => $content_md5,
                'request-method'    => $this->request_method
                );
        $sign_data = array(
                $options['request-method'],
                $uri['path'],
                $options['Date'],
                $options['Content-type'],
                $options['Content-MD5']
                );
        $sign_string = implode("\n", $sign_data) . "\n";
        $priv_key_file = $this->priv_key_file;
        $priv_key = openssl_get_privatekey(file_get_contents($priv_key_file));

        openssl_sign($sign_string, $signature, $priv_key);
        $headers = array('Authorization: '.$this->authorization_header.' ' . $client_id . ':' . trim(base64_encode($signature)),
                'Date: ' . $options['Date'],
                'Content-Type: ' . $options['Content-type'],
                'Content-MD5: ' . $options['Content-MD5'],
                'Content-Length: ' . strlen($request_body)
                );
        return $headers;
    }
    function curl_request($headers) {
        $url = $this->final_url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE);
        $response = curl_exec($ch);
        $httpresponse = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return array($httpresponse, $response);
    }
}
