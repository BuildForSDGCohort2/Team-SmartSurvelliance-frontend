<?php
namespace AWSCognitoApp;
require '../vendor/autoload.php';
use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;

if(isset($_GET["logout"]) && $_GET["logout"] == 'true'){
    //This will invalidate the access token
    $result = $client->globalSignOut([
        'AccessToken' => $access_token,
    ]);
    
    header("Location: https://kingso101-smart-home-demo.auth.us-east-1.amazoncognito.com/login?client_id=73nkbeiki4s2q5c2v9v8ek4aue&response_type=token&scope=aws.cognito.signin.user.admin+email+openid+phone+profile&redirect_uri=https://smart-surveillance-web-app.herokuapp.com/process.php");
     
}
