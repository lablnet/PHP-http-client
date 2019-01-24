<?php 

require '../vendor/autoload.php';

$request = new Lablnet\Request();

// Get the value of _GET['var']
$var = $request->getQuery('var');
//it print the get request	
var_dump($var);

// Get the value of $_POST['id']
if ($request->isPost()) {
	$id = $request->getPost('id');
}

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

//Redirect to other page/site.
//(new Lablnet\Redirect('https://zestframework.xyz/'));
	
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
	