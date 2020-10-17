<?php 
namespace AWSCognitoApp;
require_once('vendor/autoload.php');
$config = require './config/config.php';
use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;
putenv('CLIENT_ID='.$config['cognito']['CLIENT_ID']);
putenv('USERPOOL_ID='.$config['cognito']['POOL_ID']);
putenv('AWS_ACCESS_KEY_ID='.$config['s3']['KEY']);
putenv('AWS_SECRET_ACCESS_KEY='.$config['s3']['SECRET']);
putenv('REGION='.$config['cognito']['REGION']);
putenv('VERSION='.$config['cognito']['VERSION']);
?>


<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
	<style>
		body{
			font-family: 'Roboto', sans-serif;
		}
	</style>
</head>
<body>

<?php if(!isset($_GET["id_token"]) && !isset($_GET['access_token'])){ ?>
<script>
	var url_str = window.location.href;
	//On successful authentication, AWS Cognito will redirect to Call-back URL and pass the access_token as a request parameter. 
	//If you notice the URL, a “#” symbol is used to separate the query parameters instead of the “?” symbol. 
	//So we need to replace the “#” with “?” in the URL and call the page again.
	
	if(url_str.includes("#")){
		var url_str_hash_replaced = url_str.replace("#", "?");
		window.location.href = url_str_hash_replaced;
	}
	
</script>

<?php
}
else{
?>

<?php
session_start();

$id_token = htmlspecialchars(strip_tags($_GET['id_token']));
$access_token = htmlspecialchars(strip_tags($_GET['access_token']));

$_SESSION['access_token'] = $access_token;

$region = getenv('REGION');
$version = getenv('VERSION');

//Authenticate with AWS Acess Key and Secret
$client = new CognitoIdentityProviderClient([
    'version' => $version,
    'region' => $region,
	'credentials' => [
        'key'    => getenv('AWS_ACCESS_KEY_ID'),
        'secret' => getenv('AWS_SECRET_ACCESS_KEY'),
    ],
]);

try {
	//Get the User data by passing the access token received from Cognito
    $result = $client->getUser([
        'AccessToken' => $access_token,
    ]);
	
	//print_r($result);
	
	$user_email = "";
	$user_phone_number = "";
		
	//Iterate all the user attributes and get email and phone number
	$userAttributesArray = $result["UserAttributes"];
	print_r($userAttributesArray);

	foreach ($userAttributesArray as $key => $val) {
		if($val["Name"] == "email"){
			$user_email = $val["Value"];
			$user = strstr($user_email, '@', true);

			$_SESSION['user_email'] = $user_email;
			$_SESSION['user'] = $user;
		}
		if($val["Name"] == "phone_number"){
			$user_phone_number = $val["Value"];
			$_SESSION['user_phone_number'] = $user_phone_number;
		}
	}	
	header('Location: dashboard.php');

	if(isset($_GET["logout"]) && $_GET["logout"] == 'true'){
        //This will invalidate the access token
        $result = $client->globalSignOut([
            'AccessToken' => $access_token,
        ]);
        
        header("Location: auth/logout.php");
        
    }
	
	
} catch (\Aws\CognitoIdentityProvider\Exception\CognitoIdentityProviderException $e) {
    echo 'FAILED TO VALIDATE THE ACCESS TOKEN. ERROR = ' . $e->getMessage();
	}
catch (\Aws\Exception\CredentialsException $e) {
    echo 'FAILED TO AUTHENTICATE AWS KEY AND SECRET. ERROR = ' . $e->getMessage();
	}

}
?>

</body>
</html>