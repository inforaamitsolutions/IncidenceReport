<?php

require APPPATH . '/libraries/JWT.php';

class ImplementJWT {

    PRIVATE $key = "ffe210.55c997e29dcbab0264c.9559455";

    public function GenerateToken($data) {
        $jwt = JWT::encode($data, $this->key);
        return $jwt;
    }

    public function DecodeToken($token) {
        //try {
        $decoded = JWT::decode($token, $this->key, array('HS256'));
        $decodedData = (array) $decoded;
        return $decodedData;
        /* } catch (\Exception $e) {
          return FALSE;
          } */
    }

}

?>