## Instalation

Add the dependency _khipu/khipu-chaski-api-client_ to _composer.json_ and run

```
composer install
```


## Usage

### Basic usage
```php

<?php 
 require __DIR__ . '/vendor/autoload.php';
 
 $c = new KhipuChaski\Configuration();
 $c->setSecret("tobechanged");
 $c->setReceiverId(123456789);
 $c->setDebug(true);

 $cl =  new KhipuChaski\ApiClient($c);
 $notificationsApi = new KhipuChaski\Client\PushNotificationsApi($cl);
 try{ 
    $message =  new KhipuChaski\Model\Message();
    $message->setSubject("subject");
    $message->setBody("Hello world!");
    $message->setRecipientIdSet(array("recipientId"));
    $response = $notificationsApi->sendMessage($message);
    print_r($response);
 } catch(Exception $e){
    echo $e->getMessage();
 }


?>



```
