<?php
include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $access_token = $_POST['accesstoken'];

    
    $fb = new \Facebook\Facebook([
        'app_id' => 'YOUR_FACEBOOK_APP_ID',
        'app_secret' => 'YOUR_FACEBOOK_APP_SECRET',
        'default_graph_version' => 'v9.0',
    ]);

    try {
        $response = $fb->get('/me?fields=id,name,email', $access_token);
        $user = $response->getGraphUser();
        $userid = $user['id'];
        $email = $user['email'];
       
    } catch(\Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(\Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
}
?>
