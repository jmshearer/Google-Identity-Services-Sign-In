<html>
    <head>
        <title>GIS Redirect Demo</title>
                
        <!-- Load the Google Identity Services JS library -->        
        <script src="https://accounts.google.com/gsi/client" async defer></script>
        
        <!-- Add jQuery to make life easier -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    </head>
    
    <body>
        <h1>JavaScript Demo w/ Legacy Support</h1>
        <a href="index.php">Back to home</a>

        <!-- Configure the Google Identity Services client -->
        <!-- Note that this is configured to redirect to ga.php (to authenticate) -->
        <div id="g_id_onload"
             data-client_id="<?php require_once("include/ga-credentials.php"); echo $ga_client_id; ?>"
             data-context="signin"
             data-ux_mode="popup"                                       
             data-callback="onGoogleSignIn"               
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
            
            //Create the legacy googleUser object.
            //Note that there are many more methods and properties but these are some basics.
            //Refer to the legacy documentation: https://developers.google.com/identity/sign-in/web/people        
            var googleUser = {
                getBasicProfile: function(){
                    return {
                        getName: function(){
                            return user.name;
                        },                    
                        getEmail: function(){
                            return user.email;
                        }                                            
                    }
                },
                getAuthResponse: function(){
                    return {id_token: response.credential };
                }
            }
            
            //Call the legacy sign-in routine            
            onLegacySignIn(googleUser)                                            
        }
        
        //Legacy sign-in routine that expects a googleUser object        
        function onLegacySignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            var name = profile.getName();
            var email = profile.getEmail();            
            var id_token = googleUser.getAuthResponse().id_token;
            $("#response").append("Legacy sign in: " + name + " / " + email + "<br />");
            
            //Note that server-side verification should be performed here.
            //This is extremely important                                    
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