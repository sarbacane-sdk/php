<?php

namespace sarbacane_sdk;

class authenticationManager extends baseManager {

    private static $smsApikey;
    private static $emailUser;
    private static $emailApikey;

    public static function setSmsApikey($smsApikey) {
        if ($smsApikey != "") {
            self::$smsApikey = $smsApikey;
        } else {
            die('smsApikey is required.');
        }
    }
    
    public static function setEmailTokens($emailUser, $emailApikey) {
        if (($emailUser != "") && ($emailApikey != "")) {
            self::$emailUser = $emailUser;
            self::$emailApikey = $emailApikey;
        } else {
            die('emailUser AND emailApikey are required.');
        }
    }

    public static function ensureSmsApikey() {
        if (!self::$smsApikey) {
            Die('SMS apiKey is NOT set.');
        }
    }
    
    public static function ensureEmailTokens() {
        if ((!self::$emailUser) && (!self::$emailApikey)) {
            Die('E-mail tokens are NOT set.');
        }
    }

    public static function getSmsApikey() {
        return self::$smsApikey;
    }
    
    public static function getEmailUser() {
        return self::$emailUser;
    }

    public static function getEmailApikey() {
        return self::$emailApikey;
    }
}

?>
