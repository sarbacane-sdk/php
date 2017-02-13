<?php
    
    
    namespace sarbacane_sdk;
    
    use sarbacane_sdk\baseManager;
    
    class authenticationManager extends \sarbacane_sdk {
        
        

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
