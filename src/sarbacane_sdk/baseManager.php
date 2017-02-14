<?php

namespace sarbacane_sdk;

class baseManager {

    protected static $sdkVersion = "1.0.5";
    protected static $baseURL = 'https://api.primotexto.com/v2/';
    protected static $smtpHost = 'smtp.tipimail.com';
    protected static $smtpPort = 587;
    protected static $CURLOPT_SSL_VERIFYPEER = 'false';
    protected static $CURLOPT_PROXY = '';

    protected static function sendTransport($email) {
        $mail = new \PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = baseManager::$smtpHost;
        $mail->SMTPAuth = true;
        $mail->Username = authenticationManager::getEmailUser();
        $mail->Password = authenticationManager::getEmailApikey();
        $mail->SMTPSecure = 'tls';
        $mail->Port = baseManager::$smtpPort;
        
        $mail->addCustomHeader('X-Sarbacane-SDK-PHP', baseManager::$sdkVersion);

        $mail->setFrom($email->mailFrom, $email->mailFromName);
        foreach ($email->recipients as $address) {
            $mail->addAddress($address);
        }
        $mail->isHTML(true);
        $mail->Body = $email->htmlBody;
        $mail->AltBody = $email->textBody;
        $mail->Subject = $email->subject;
        $mail->Body = $email->message;
        if (!$mail->send()) {
            echo 'Error: Message could not be sent: ' . $mail->ErrorInfo;
        }
    }

    private static function getCurlWithApiKey($url) {
        $curl = curl_init($url);
        if (isSet(baseManager::$CURLOPT_PROXY)) {
            curl_setopt($curl, CURLOPT_PROXY, baseManager::$CURLOPT_PROXY);
        }
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, baseManager::$CURLOPT_SSL_VERIFYPEER);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'X-Primotexto-ApiKey: ' . authenticationManager::getSmsApikey(),
        ));
        return $curl;
    }

    protected static function getPutCurl($url, $post_fields) {
        $curl = self::getCurlWithApiKey($url);
        if (isSet(baseManager::$CURLOPT_PROXY)) {
            curl_setopt($curl, CURLOPT_PROXY, baseManager::$CURLOPT_PROXY);
        }
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, baseManager::$CURLOPT_SSL_VERIFYPEER);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_fields);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        return $curl;
    }

    protected static function getPostCurl($url, $post_fields) {
        $curl = self::getCurlWithApiKey($url);
        if (isSet(baseManager::$CURLOPT_PROXY)) {
            curl_setopt($curl, CURLOPT_PROXY, baseManager::$CURLOPT_PROXY);
        }
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, baseManager::$CURLOPT_SSL_VERIFYPEER);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_fields);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        return $curl;
    }

    public static function getGetCurl($url) {
        $curl = self::getCurlWithApiKey($url);
        if (isSet(baseManager::$CURLOPT_PROXY)) {
            curl_setopt($curl, CURLOPT_PROXY, baseManager::$CURLOPT_PROXY);
        }
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, baseManager::$CURLOPT_SSL_VERIFYPEER);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        return $curl;
    }

    protected static function getDeleteCurl($url) {
        $curl = self::getCurlWithApiKey($url);
        if (isSet(baseManager::$CURLOPT_PROXY)) {
            curl_setopt($curl, CURLOPT_PROXY, baseManager::$CURLOPT_PROXY);
        }
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, baseManager::$CURLOPT_SSL_VERIFYPEER);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        return $curl;
    }

}

?>
