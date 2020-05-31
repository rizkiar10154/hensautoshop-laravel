<?php

/**
 * Created by PhpStorm.
 * User: abdialam
 * Date: 11/13/18
 * Time: 09:47
 */

namespace App;


class Firebase
{
    public function  send($registration_ids, $message)
    {
        $fields = array(
            'registration_ids' => $registration_ids,
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }

    private function sendPushNotification($fields)
    {
        //importing db
        //$this->db;

        //firebase url
        $url = 'https://fcm.googleapis.com/fcm/send';


        $headers = array(
            'Authorization: key=AAAA_ui0GkU:APA91bECLrSpGZ8x5Ie9RMgdUZy12TG9Q_z0jsTy2u8Q100W3oU0RzH1R-R2UxsKnONds-zUWkK2znfwlPttGv4T-D41dR2bUa4zSe8o-QQ-Ys-JCgJE_BQJCRbOvbVCBf7K5hPGzPpv',
            'Content-Type: application/json'
        );


        //Initializing curl to open a connection
        $ch = curl_init();

        //Setting the curl url
        curl_setopt($ch, CURLOPT_URL, $url);

        //setting the method as post
        curl_setopt($ch, CURLOPT_POST, true);

        //adding headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //disabling ssl support
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //adding the fields in json format
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        //finally executing the curl request
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        //Now close the connection
        curl_close($ch);

        //and return the result
        return $result;
    }
}
