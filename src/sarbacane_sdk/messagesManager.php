<?php

namespace sarbacane_sdk;

class messagesManager extends baseManager {

    public static function sendEmailMessage($email) {
        authenticationManager::ensureEmailTokens();
        if (!$email->mailFrom || !$email->mailFromName || !$email->recipients || !$email->subject || !$email->htmlBody || !$email->textBody) {
            die('Error: mailFrom, mailFromname, subject, recipients, htmlBody and textBody are required.');
        } else {
            baseManager::sendTransport($email);
        }
    }
    
    public static function sendSmsMessage($sms) {
        authenticationManager::ensureSmsApikey();
        if (!$sms->type || !$sms->type == 'notification' && !$sms->type == 'marketing') {
            die('Error: SMS NOT SENT - You need to specify a Type: notification OR marketing');
        } else {
            $type = $sms->type;
            unset($sms->type);
        }
        if (!$sms->date) {
            unset($sms->date);
        }
        $curl = parent::getPostCurl(BaseManager::$baseURL . "/$type/messages/send", json_encode($sms));
        $result = curl_exec($curl);
        return $result;
        curl_close($curl);
    }

    public static function messagesStatus($msg) {
        authenticationManager::ensureSmsApikey();
        if ($msg->identifier && $msg->snapshotId) {
            die('Error: Please choose between identifier OR snapshotId\n');
        } elseif (!$msg->identifier && !$msg->snapshotId) {
            die('Error: Please choose between identifier OR snapshotId\n');
        } else {
            if ($msg->identifier) {
                $msg->identifier = urlencode($msg->identifier);
                $request = "status?identifier=$msg->identifier";
            } elseif ($msg->snapshotId) {
                $request = "status?snapshotId=$msg->snapshotId";
            }
            $curl = parent::getGetCurl(BaseManager::$baseURL . "/messages/$request");
            $result = curl_exec($curl);
            echo("$result\n");
            curl_close($curl);
        }
    }

    public static function messagesCallbacks($msg) {
        authenticationManager::ensureSmsApikey();
        if (!$msg->category) {
            die('Error: Please define Category !\n');
        } else {
            $curl = parent::getGetCurl(BaseManager::$baseURL . "/messages/replies?category=$msg->category");
            $result = curl_exec($curl);
            echo("$result\n");
            curl_close($curl);
        }
    }

    public static function messagesStats($msg) {
        authenticationManager::ensureSmsApikey();
        if (!$msg->category) {
            die('Error: Please define Category !\n');
        } else {
            $curl = parent::getGetCurl(BaseManager::$baseURL . "/messages/stats?category=$msg->category");
            $result = curl_exec($curl);
            echo("$result\n");
            curl_close($curl);
        }
    }

    public static function messagesBlacklists($msg) {
        authenticationManager::ensureSmsApikey();
        if (!$msg->category) {
            die('Error: Please define Category !\n');
        } else {
            $curl = parent::getGetCurl(BaseManager::$baseURL . "/messages/blacklists?category=$msg->category");
            $result = curl_exec($curl);
            echo("$result\n");
            curl_close($curl);
        }
    }

    public static function messagesValidNumber($identifier) {
        authenticationManager::ensureSmsApikey();
        if (!$identifier) {
            die('Error: Please define identifier !\n');
        } else {
            $curl = parent::getGetCurl("https://www.primotexto.com/app/contacts/check?identifier=" . urlencode($identifier));
            $result = curl_exec($curl);
            echo("$result\n");
            curl_close($curl);
        }
    }

}

?>
