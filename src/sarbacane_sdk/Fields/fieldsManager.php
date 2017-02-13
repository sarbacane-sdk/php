<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace sarbacane_sdk;
/**
 * Description of fieldsManager
 *
 * @author guru
 */
class fieldsManager extends baseManager{
    public static function addField ($newField) {
            authenticationManager::ensureLogin();
            if ( $newField->type != "STRING" && $newField->type != "DATE" && $newField->type != "NUMBER") {
                die("Error: Please choose a type between: STRING, DATE OR NUMBER.\n");
            } else if (! $newField->format) {
                unset($newField->format);
            }
            $listId = $newField->listId;
            unset($newField->id);unset($newField->listId);unset($newField->value);
            $curl = parent::getPostCurl(BaseManager::$baseURL."/lists/$listId/fields", json_encode($newField));
            $result = curl_exec($curl);
            return $result;
            curl_close($curl);
        }
        
        public static function delField ($listId, $fieldId) {
            authenticationManager::ensureLogin();
            $curl = parent::getDeleteCurl(BaseManager::$baseURL."/lists/$listId/fields/$fieldId");
            $result = curl_exec($curl);
            echo "$result\n";
            return $result;
            curl_close($curl);
        }

        public static function getFields ($listId) {
            authenticationManager::ensureLogin();
            $curl = parent::getGetCurl(BaseManager::$baseURL."/lists/$listId/fields");
            $result = curl_exec($curl);
            echo "$result\n";
            return $result;
            curl_close($curl);
        }
}
