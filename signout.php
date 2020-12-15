<?php
require_once('head.php');
require_once('google-signin.php');

// Destroying Sessions
session_unset();
session_destroy();

?>

<!-- This button is just for loading auth2, thats why it is hidden -->
<div class="g-signin2" data-onsuccess="onSignIn" style="display: none;"></div>


<!-- Signout on click -->
<!-- <a href="#" id="signOut" onclick="signOut();">Sign out</a> -->
<script>
/* function signOut() { */
/*     var auth2 = gapi.auth2.getAuthInstance(); */
/*     auth2.signOut().then(function () { */
/*         console.log('User signed out.'); */
/*     }); */
/*   } */
</script>


<!-- Signout on Page Load -->
<script src="https://apis.google.com/js/platform.js?onload=onLoadCallback" async defer></script>
<script>
window.onLoadCallback = function(){
    gapi.load('auth2', function() {
        gapi.auth2.init().then(function(){
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
                console.log("Signed Out");
                // location.href = 'index.php';
                    });
                });
            });
        };
</script>
