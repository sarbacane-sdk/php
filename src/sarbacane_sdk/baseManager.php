<?php

namespace sarbacane_sdk;

require_once __DIR__ . '/authenticationManager.php';
require_once __DIR__ . '/accountManager.php';
require_once __DIR__ . '/messagesManager.php';
require_once __DIR__ . '/campaignsManager.php';
require_once __DIR__ . '/listsManager.php';
require_once __DIR__ . '/contactsManager.php';
require_once __DIR__ . '/fieldsManager.php';

class baseManager {

    protected static $baseURL = 'https://api.primotexto.com/v2/';
    protected static $CURLOPT_SSL_VERIFYPEER = 'false';
    protected static $CURLOPT_PROXY = '';

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
