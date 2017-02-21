![alt tag](https://cloud.githubusercontent.com/assets/18444530/22825087/81a050e8-ef8b-11e6-8b33-2508b9be27a8.png)
### Sarbacane SDK PHP - Send e-mail and text messages (sms)


* Account & API Key
* Installation
* Download sources
* Authentication
* Buy credits
* Send E-mail
* Send SMS
* Webhooks


#### Account & API Key

##### E-mail

[Create E-mail account](https://www.tipimail.com/register)


[Generate your E-mail Tokens (be logged in first)](https://app.tipimail.com/#/app/settings/smtp_and_apis)

![email tokens](https://cloud.githubusercontent.com/assets/18444530/23157829/fda5247c-f81c-11e6-936a-cc4905315cd9.jpg)



##### SMS

[Create SMS account](https://www.primotexto.com/creer_compte.asp)


[Generate your SMS API Key (be logged in first)](https://www.primotexto.com/webapp/#/developer/keys)

![api_key_real](https://cloud.githubusercontent.com/assets/18444530/23158387/52492cc4-f81f-11e6-8535-9438f11aa0f5.png)



#### Installation

```
composer require sarbacane-sdk/php
```



#### Sources

```
git clone https://github.com/sarbacane-sdk/php.git .
```


#### Authentication

###### E-mail

```
sarbacane_sdk\authenticationManager::setEmailTokens("31649838f306ebc8sca6b67be8cd7e20", "3413e65fbef014493537e77f811ca5ca");
```


###### SMS

```
sarbacane_sdk\authenticationManager::setSmsApikey('da3f2a93592ad9f43fb38977e8f64d76');
```


#### Credits

[Buy E-mail credits](https://fr.tipimail.com/tarifs) 

[Buy SMS credits](https://www.primotexto.com/tarif-sms-web.asp)


#### Send E-mail

```
    $email = new sarbacane_sdk\SBEmailMessage();
    $email->mailFrom = "sender@domain.com";
    $email->mailFromName = "Sender Name";
    $email->subject = "Message sent by Sarbacane SDK PHP";
    $email->htmlBody = "Here is the <b>HTML</b> content of the message.";
    $email->textBody = "Here is the TEXT content of the message.";
    $email->recipients = array(
        "address1@domain.com",
        "address2@domain.com"
    );
    sarbacane_sdk\messagesManager::sendEmailMessage($email);
```


#### Send SMS

```
    $sms = new \sarbacane_sdk\SBSmsMessage();
    $sms->type = 'notification';
    $sms->number = '+33600000000';
    $sms->message = 'Code de confirmation: 283951';
    $sms->sender = 'YourCompany';
    $sms->campaignName = 'Code de confirmation';
    $sms->category = 'codeConfirmation';
    sarbacane_sdk\messagesManager::sendSmsMessage($sms);
```

