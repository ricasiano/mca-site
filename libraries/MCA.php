<?php
class MCA extends APIRequest {
    function __construct() {
        //the url of the web service
        $this->url = CONFIG_API_URL;
        $this->buy_url = CONFIG_STORE_URL;
        //using label id as identifier in MMS record labels since it will also be used to query items assigned for this label
        $this->client_id = CONFIG_CLIENT_ID;
        $this->priv_key_file = CONFIG_PRIVATE_KEY_FILE;
        $this->authorization_header = CONFIG_AUTHORIZATION_HEADER;
        $this->endpoint = '';
        $this->request_method = 'GET';
        //additional parameters for endpoint
        $this->params = null;
        //the endpoint, concatenated with query string/segments
        $this->final_url = '';
    }
    /***
        initialize the request to mymusicstore server
    **/
    function request() {
        $headers = $this->signed_request();
        $this->final_url = $this->url.$this->endpoint;
        if ($this->params != null)
        $this->final_url .= '/'.$this->params;
        $result = $this->curl_request($headers);
        return json_decode($result[1]);
    }
    function clean_url($string, $tolower = false) {
        $string = str_replace(' ', '-', $string);
        $string = str_replace(array('\'', '"'), '', $string);
        $string = str_replace('&', 'and', $string);
        if ($tolower == true)
        $string = strtolower($string);
        return $string;
    }
}
