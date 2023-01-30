<html>
    <head>
        <title>GIS Redirect Demo</title>        
                
        <!-- Load the Google Identity Services JS library -->        
        <script src="https://accounts.google.com/gsi/client" async defer></script>
        
        <!-- Add jQuery to make life easier -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    </head>
    
    <body>
        <h1>JavaScript Demo</h1>
        <a href="index.php">Back to home</a>        

        <!-- Configure the Google Identity Services client -->
        <!-- Note that this is configured to redirect to ga.php (to authenticate) -->
        <!-- If data-auto_prompt="true", one-tap will be enabled -->
        <div id="g_id_onload"
             data-client_id="<?php require_once("include/ga-credentials.php"); echo $ga_client_id; ?>"
             data-context="signin"
             data-ux_mode="popup"                                                    
             data-callback="onGoogleSignIn"                            
             data-auto_prompt="true">
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
        
        <div id="response" style="width: 90%; border: 1px solid blue; margin: 1em; padding: 1em;">
            Nothing done yet...
        </div>
        
    </body>
    
    <script type="text/javascript">
             
        //Handle Sign In
        function onGoogleSignIn(response){        
            //Handle the sign-in in the browser by parsing the JWT                                
            var user = parseJwt(response.credential);
            $("#response").html("Signed in: " + user.name + " / " + user.email + "<br />");
            
            //...OR...pass to the server to validate the JWT (best practice)
            $.post("ga.php?credential=" + response.credential,function(data){
                $("#response").append("Info from server-side verification:<br />" + data);
            });
        }
        
        //Helper function to parse JWT
        //Copied from https://stackoverflow.com/questions/38552003/how-to-decode-jwt-token-in-javascript-without-using-a-library
        function parseJwt (token) {
            var base64Url = token.split('.')[1];
            var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
            var jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function(c) {
                return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
            }).join(''));
        
            return JSON.parse(jsonPayload);
        }
    
    </script>
    
</html>