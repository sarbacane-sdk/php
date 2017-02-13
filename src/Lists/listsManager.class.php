<?php
    require_once 'baseManager.class.php';
    
    namespace sarbacane_sdk;
    
    
    class ListsManager extends BaseManager {
        
        public static function addList ($newList) {
            authenticationManager::ensureLogin();
            if (!$newList->name) {
                die('Please specify a list name');
            } else {
            $curl = parent::getPostCurl(BaseManager::$baseURL."/lists", json_encode($newList));
            $result = curl_exec($curl);
            return $result;
            echo "$result\n";
            curl_close($curl);
            }
        }
        
        public static function getLists () {
            authenticationManager::ensureLogin();
            $curl = parent::getGetCurl(BaseManager::$baseURL.'/lists');
            $result = curl_exec($curl);
            echo "$result\n";
            return $result;
            curl_close($curl);
        }
        
        public static function getList ($listId) {
            authenticationManager::ensureLogin();
            $curl = parent::getGetCurl(BaseManager::$baseURL."/lists/$listId/contacts");
            $result = curl_exec($curl);
            echo "$result\n";
            return $result;
            curl_close($curl);
        }
        
        public static function delList ($listId) {
            authenticationManager::ensureLogin();
            $curl = parent::getDeleteCurl(BaseManager::$baseURL."/lists/$listId");
            $result = curl_exec($curl);
            echo "$result\n";
            return $result;
            curl_close($curl);
        }
        
        
        
        

	
    }
?>
