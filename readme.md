# PHP HTTP Client
http-client is the php package. It provides the ability to manage and parse request object. It also provides support for HTTP client transactions via cURL.


## Requirement

- PHP
- Composer

## install
run this command
``` composer require lablnet/http-client ```

## BASIC USAGE

### The request object, GET example
Let's use a GET request with the URL '/index.php?var=value'


```php
<?php 
require '../vendor/autoload.php';

$request = new Lablnet\Request();

// Get the value of _GET['var']
$var = $request->getQuery('var');
//it print the get request	
var_dump($var);
```
### The request object, POST example
Let's use a POST request.
```php
// Get the value of $_POST['id']
if ($request->isPost()) {
	$id = $request->getPost('id');
}
```
### Creating a response object
```php 
//Response
$config = [
	'code'    => 200,
	'headers' => [
		'Content-Type' => 'text/html'
	]
];

$response = new Lablnet\Response($config);
$response->setBody('This is a plain text file.');

$response->send();
```	
### Simple response redirect
```php
//Redirect to other page/site.
(new Lablnet\Redirect('https://zestframework.xyz/'));
```

### Using the cURL client
```php
//Using the cURL client	
//Send request to https://zestframework.xyz login page with post method
 $request = $request->curl("https://zestframework.xyz/account/login/action","POST");
 //Set transfer and return header
$request->setReturnHeader(true)->setReturnTransfer(true);
//Set the fields
$request->setFields([
	'username'  => 'your-username',
	'password' => 'your-password'
]);
//Send the request
$request->send();
// return => 200
$statusCode = $request->getCode();
// Display the body of the returned response
echo "<br\>".$request->getBody();
```











