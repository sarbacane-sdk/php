![alt tag](https://cloud.githubusercontent.com/assets/18444530/22825087/81a050e8-ef8b-11e6-8b33-2508b9be27a8.png)
### Sarbacane SDK PHP - Send e-mail and text messages (sms)


* Installation
* Download sources
* Authentication
* Buy credits
* Send E-mail
* Send SMS
* Webhooks

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
    $email->subject = "Message sent by Sarbacane SDK";
    $email->message = "Here is the content of the message";
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

