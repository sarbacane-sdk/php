![alt tag](https://cloud.githubusercontent.com/assets/18444530/23370454/08b3a170-fd15-11e6-946c-ecc2db251ad7.png)
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

![email tokens](https://cloud.githubusercontent.com/assets/18444530/23396595/dd275f1c-fd94-11e6-8b92-1f3c3a707ddc.jpg)



##### SMS

[Create SMS account](https://www.primotexto.com/creer_compte.asp)


[Generate your SMS API Key (be logged in first)](https://www.primotexto.com/webapp/#/developer/keys)

![api_key_real](https://cloud.githubusercontent.com/assets/18444530/23396617/f0e0f996-fd94-11e6-9440-cb41f54c5a4b.png)



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
sarbacane_sdk\authenticationManager::setEmailTokens('MY_EMAIL_USERNAME', 'MY_EMAIL_APIKEY');
```


###### SMS

```
sarbacane_sdk\authenticationManager::setSmsApikey('MY_SMS_APIKEY');
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

