<?php
    require_once 'baseManager.class.php';
    
    namespace sarbacane_sdk;
    
    class authenticationManager {
        
        

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
