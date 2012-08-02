<?php
class MCA extends APIRequest {
    function __construct() {
        $this->initial = 1;
        $this->url = 'http://test02.mymusicstore.ph/ws/index.php/store/';
        $this->client_id = '1310167525239';
        $this->priv_key_file = '/home/rai/.ssh/1310167525239.private';
        $this->authorization_header = 'MCWS';
        $this->endpoint = '';
        $this->request_method = 'GET';
        $this->final_url = '';
    }
    function listArtists() {
        $headers = $this->signed_request();
        $this->final_url = $this->url.$this->endpoint.'/'.$this->initial;
        $result = $this->curl_request($headers);
        return $result[1];
    }

}
