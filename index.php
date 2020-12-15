<?php
require_once('head.php');
require_once('google-signin.php');
?>

<form name="google-signin" id="google-signin" action="login.php" method="post">
    <!-- Google Signin Button -->
    <div class="g-signin2" data-onsuccess="onSignIn" data-width="240" data-height="50" data-theme="dark" data-longtitle="true"></div>

    <!-- To send id_token, using a hidden element -->
    <input type="hidden" name="id_token" id="id_token">
</form>


<script>
function onSignIn(googleUser) {
    var id_token = googleUser.getAuthResponse().id_token;

    // Storing id_token in hidden element and sending via post method
    document.getElementById("id_token").value=id_token;

    // Submiting Form
    document.getElementById("google-signin").submit();
}
</script>
