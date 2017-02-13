<?php
    
    
    namespace sarbacane_sdk;
    //require_once __DIR__ . '/../Base/baseManager.php';
    
    
    class authenticationManager extends baseManager {
        
        

        private static $apiKey;

        public static function setApiKey($apiKey) {
            if ($apiKey != "") {
            self::$apiKey = $apiKey;
            } else {
                die ('Veuillez renseigner votre apiKey');
            }
        }

        public static function ensureLogin() {
            if (!self::$apiKey) {
                Die ('ApiKey ERROR !');
            }
        }

        
        public static function getApiKey() {
            return self::$apiKey;
        }
    }
?>
