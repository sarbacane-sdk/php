<?php

namespace sarbacane_sdk;

class fieldsManager extends baseManager {

    public static function addField($newField) {
        authenticationManager::ensureSmsApikey();
        if ($newField->type != "STRING" && $newField->type != "DATE" && $newField->type != "NUMBER") {
            die("Error: Please choose a type between: STRING, DATE OR NUMBER.\n");
        } else if (!$newField->format) {
            unset($newField->format);
        }
        $listId = $newField->listId;
        unset($newField->id);
        unset($newField->listId);
        unset($newField->value);
        $curl = parent::getPostCurl(BaseManager::$baseURL . "/lists/$listId/fields", json_encode($newField));
        $result = curl_exec($curl);
        return $result;
        curl_close($curl);
    }

    public static function delField($listId, $fieldId) {
        authenticationManager::ensureSmsApikey();
        $curl = parent::getDeleteCurl(BaseManager::$baseURL . "/lists/$listId/fields/$fieldId");
        $result = curl_exec($curl);
        echo "$result\n";
        return $result;
        curl_close($curl);
    }

    public static function getFields($listId) {
        authenticationManager::ensureSmsApikey();
        $curl = parent::getGetCurl(BaseManager::$baseURL . "/lists/$listId/fields");
        $result = curl_exec($curl);
        echo "$result\n";
        return $result;
        curl_close($curl);
    }

}
