<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace sarbacane_sdk;

/**
 * Description of contactsManager
 *
 * @author guru
 */
class contactsManager extends baseManager{
    public static function addContact($newContact) {
            authenticationManager::ensureLogin();
            if (!$newContact->attributes) {
                unset($newContact->attributes);
            }
            $listId = $newContact->listId;unset($newContact->listId);
            $curl = parent::getPostCurl(BaseManager::$baseURL."/lists/$listId/contacts", json_encode($newContact));
            $result = curl_exec($curl);
            echo "$result\n";
            return $result;
            curl_close($curl);
        }
        
        public static function delContact ($newContact) {
            authenticationManager::ensureLogin();
            if (! $newContact->listId) {
                die('Error: Please define a listId to act.');
            } 
            if ($newContact->id) {
                $request = '/lists/'.$newContact->listId.'/contacts/'.$newContact->id;
            } elseif ($newContact->identifier) {
                $request = '/lists/'.$newContact->listId.'/contacts?identifier='.urlencode($newContact->identifier);
            } else {
                die('Error: Please choose between id OR identifier to delete contact.');
            }
            $curl = parent::getDeleteCurl(BaseManager::$baseURL.$request);
            $result = curl_exec($curl);
            echo "$result\n";
            return $result;
            curl_close($curl);
        }
        
        public static function getContacts($listId) {
            authenticationManager::ensureLogin();
            $curl = parent::getGetCurl(BaseManager::$baseURL.'/lists/'.$listId.'/contacts');
            $result = curl_exec($curl);
            echo "$result\n";
            return $result;
            curl_close($curl);
        }
        public static function checkIdentifier($identifier) {
	    authenticationManager::ensureLogin();
	    $curl = parent:: getGetCurl(BaseManager::$baseURL.'/check?identifier='.urlencode($identifier));
	    $result = curl_exec($curl);
	    return $result;
	    curl_close($curl);
	}
}
