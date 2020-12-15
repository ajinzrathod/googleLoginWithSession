<?php

require_once('head.php');
require_once('google-signin.php');
require_once 'vendor/autoload.php';
require_once('verifyGoogleUser.php');

# ----- Get Sub Functios Starts -----
function getSub($payload, $CLIENT_ID){
    $sub = $payload['sub'];
    return $sub;
}
# ----- Get Sub Function Ends -----

# Get ID Token from post
getIdToken();


// $CLIENT_ID is specified in `google-signin.php`
$client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
$payload = $client->verifyIdToken($id_token);


// Verifying ID Token
verifyIdToken($payload);


// Verifing the integrity of the ID token
verifyingIntegrityOfIdToken($payload, $CLIENT_ID);

// Getting SUB
$sub = getSub($payload, $CLIENT_ID);
// echo $sub;

// Setting Session
$_SESSION['sub']=$sub;

// If Session is set succesfully, user will be redirected.
if(isset($_SESSION['redirectTo'])){
    $redirectTo = $_SESSION['redirectTo'];
    echo "<script>location.href='".$redirectTo."'</script>";
}
echo "<script>location.href='main.php'</script>";
?>
