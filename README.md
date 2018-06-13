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
 $c->setSecret('abc123');
 $c->setReceiverId(1234);
 $c->setDebug(true);

 $cl =  new KhipuChaski\ApiClient($c);
 $notificationsApi = new KhipuChaski\Client\PushNotificationsApi($cl);
 try{ 
    $response = $notificationsApi->msgPost("recipientId", "subject","Hello!!");
    print_r($response);
 } catch(Exception $e){
    echo $e->getMessage();
 }

?>

```
