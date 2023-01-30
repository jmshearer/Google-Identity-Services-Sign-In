<pre>
<?php
    /* Load the Google Cloud PHP Libraray.  This can be added with:
       composer require google/apiclient       
       Additional server-side verification information from Google:
       https://developers.google.com/identity/gsi/web/guides/verify-google-id-token */                  
    require_once '../include/google/vendor/autoload.php';
    $client = new Google_Client(['client_id' => $ga_client_id]);
    
    //Load my client ID
    require_once("include/ga-credentials.php");              
    
    //Get the credential JWT that was returned by Google
    $token = $_REQUEST['credential'];    
    
    //Verify the JWT    
    $payload = $client->verifyIdToken($token);    
    if($payload){        
        //Valid JWT--grab some basic information
        $name = $payload['name'];
        $email = $payload['email'];                    
        echo "Valid User: [$name / $email]\n";                                                        
    } else {
        //Invalid
        echo "JWT is not valid\n";
        print_r($payload);        
    }

    //Display the raw payload    
    echo "Payload:\n";        
    print_r($payload);        
?>