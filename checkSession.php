<?php
require_once('head.php');

function setRedirectUrlInSession(){
    $currentLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
        "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
        $_SERVER['REQUEST_URI'];

    $_SESSION['redirectTo'] = $currentLink;
}

function sessionStatus(){
    if(isset($_SESSION['sub'])){
        return True;
    }
    else{
        setRedirectUrlInSession();
        return False;
    }
}

if(sessionStatus() != True){
    echo "<script>location.href='index.php'</script>";
}
?>
