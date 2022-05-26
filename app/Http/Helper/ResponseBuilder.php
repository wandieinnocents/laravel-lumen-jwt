<?php
namespace App\Http;


class ResponseBuilder {
    public function result($status='', $info='', $data=''){
        // return format
        return [
            "success"     => $status,
            "information" => $info,
            "data"        => $data


        ];

    }

}

?>