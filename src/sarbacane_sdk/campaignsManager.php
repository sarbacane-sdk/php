<?php

namespace sarbacane_sdk;

class campaignsManager extends baseManager {

    public static function campaignsCreate($newCampaign) {
        authenticationManager::ensureSmsApikey();
        if (!$newCampaign->type || !$newCampaign->type == 'notification' && !$newCampaign->type == 'marketing') {
            die('Error: Campaign not created - You need to specify a type: notification OR marketing.');
        } elseif (!$newCampaign->name || !$newCampaign->message || !$newCampaign->sendList) {
            die('Error: Campaign MUST have at least name, message and sendList properties.');
        } else {
            $type = $newCampaign->type;
            unset($newCampaign->type);
            foreach ($newCampaign as $key => $value) {
                if (!$value) {
                    unset($newCampaign->$key);
                }
            }
        }
        $curl = parent::getPostCurl(BaseManager::$baseURL . "/$type/campaigns", json_encode($newCampaign));
        $result = curl_exec($curl);
        echo("$result\n");
        return $result;
        curl_close($curl);
    }

    public static function campaignsTest($newCampaign) {
        authenticationManager::ensureSmsApikey();
        if (!$newCampaign->id) {
            die('Error: You need to specify the campaignId of the campaign.');
        } elseif (!$newCampaign->type) {
            die('Error: You need to specify the type of the campaign (marketing/notification).');
        } elseif (!$newCampaign->identifier) {
            die('Error: You need to specify the test identifier of the campaign.');
        } else {
            $type = $newCampaign->type;
            $id = $newCampaign->id;
            foreach ($newCampaign as $key => $value) {
                if ($key != "identifier") {
                    unset($newCampaign->$key);
                }
            }
            $curl = parent::getPostCurl(BaseManager::$baseURL . "/$type/campaigns/$id/test", json_encode($newCampaign));
            $result = curl_exec($curl);
            echo("$result\n");
            return $result;
            curl_close($curl);
        }
    }

    public static function campaignsSend($newCampaign) {
        authenticationManager::ensureSmsApikey();
        if (!$newCampaign->id) {
            die('Error: You need to specify the campaignId of the campaign.');
        } elseif (!$newCampaign->type) {
            die('Error: You need to specify the type of the campaign (marketing/notification).');
        } else {
            $curl = parent::getPostCurl(BaseManager::$baseURL . "/$newCampaign->type/campaigns/$newCampaign->id/send", "");
            $result = curl_exec($curl);
            echo("$result\n");
            return $result;
            curl_close($curl);
        }
    }

    public static function campaignsStats($newCampaign) {
        authenticationManager::ensureSmsApikey();
        if (!$newCampaign->id) {
            die('Error: You need to specify the campaignId of the campaign.');
        } else {
            $curl = parent::getGetCurl(BaseManager::$baseURL . "/campaigns/$newCampaign->id/status");
            $result = curl_exec($curl);
            echo("$result\n");
            return $result;
            curl_close($curl);
        }
    }

    public static function campaignsBlacklists($newCampaign) {
        authenticationManager::ensureSmsApikey();
        if (!$newCampaign->id) {
            die('Error: You need to specify the campaignId of the campaign.');
        } else {
            $curl = parent::getGetCurl(BaseManager::$baseURL . "/campaigns/$newCampaign->id/blacklists");
            $result = curl_exec($curl);
            echo("$result\n");
            return $result;
            curl_close($curl);
        }
    }

    public static function campaignsCallbacks($newCampaign) {
        authenticationManager::ensureSmsApikey();
        if (!$newCampaign->id) {
            die('Error: You need to specify the campaignId of the campaign.');
        } else {
            $curl = parent::getGetCurl(BaseManager::$baseURL . "/campaigns/$newCampaign->id/replies");
            $result = curl_exec($curl);
            echo("$result\n");
            return $result;
            curl_close($curl);
        }
    }

}

?>