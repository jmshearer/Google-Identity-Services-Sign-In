<html>
    <head>
        <title>GIS Redirect Demo</title>
                
        <!-- Load the Google Identity Services JS library -->        
        <script src="https://accounts.google.com/gsi/client" async defer></script>
    </head>
    
    <body>
        <h1>Redirect Demo</h1>
        <a href="index.php">Back to home</a>

        <!-- Configure the Google Identity Services client -->
        <!-- Note that this is configured to redirect to ga.php (to authenticate) -->
        <!-- If data-auto_prompt="true", one-tap will be enabled -->        
        <div id="g_id_onload"
             data-client_id="<?php require_once("include/ga-credentials.php"); echo $ga_client_id; ?>"
             data-context="signin"
             data-ux_mode="popup"                                       
             data-login_uri="<?php echo $ga_redirect_url; ?>"              
             data-auto_prompt="false">
        </div>                
                
        <!-- Display the Google Sign In Button -->
        <div class="g_id_signin"
             data-type="standard"
             data-shape="rectangular"
             data-theme="outline"
             data-text="signin_with"
             data-size="large"
             data-logo_alignment="left">
        </div>
    </body>
    
</html>