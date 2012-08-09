<?php
class MCA extends APIRequest {
    function __construct() {
        //the url of the web service
        $this->url = 'http://test02.mymusicstore.ph/ws/index.php/store/';
        $this->buy_url = 'http://www.mymusicstore.com.ph/music/';
        //using label id as identifier in MMS record labels since it will also be used to query items assigned for this label
        $this->client_id = '1310167525239';
        $this->priv_key_file = 'c:\1310167525239.private';
        $this->authorization_header = 'MCWS';
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
