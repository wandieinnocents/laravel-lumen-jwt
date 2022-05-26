<?php
namespace App\Http\Helper;


class ResponseBuilder {
    public static function result($code='', $status='', $message='', $data=''){
        // return format
        return [
            "code"        => $code,
            "success"     => $status,
            "message"     => $message,
            "data"        => $data

        ];

    }

}

?>