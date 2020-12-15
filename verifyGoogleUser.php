<?php
require_once('head.php');
function getIdToken(){
    global $id_token;
    // Get $id_token via HTTPS POST.
    if(isset($_POST['id_token'])){
        $id_token = $_POST['id_token'];
    }
    else{
        echo "Did not recieved `id_token` from post";
        die();
    }
}

function verifyIdToken($payload){
    if (!$payload) {
        echo "Invalid ID Token";
        die();
    }
}

function verifyingIntegrityOfIdToken($payload, $CLIENT_ID){
    // The value of aud in the ID token must be equal to one of your app's client IDs
    $aud = $payload['aud'];
    if($aud != $CLIENT_ID){
        echo "Invalid `aud` from Google sign in";
        die();
    }

    $iss = $payload['iss'];
    if($iss == "accounts.google.com" || $iss == "https://accounts.google.com"){
    }
    else{
        echo "Invalid `iss` from Google sign in";
        die();
    }
}
?>
