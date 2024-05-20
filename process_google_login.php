<?php
include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_token = $_POST['idtoken'];

   
    $client = new Google_Client(['client_id' => "YOUR_GOOGLE_CLIENT_ID"]);
    $payload = $client->verifyIdToken($id_token);

    if ($payload) {
        $userid = $payload['sub'];
        $email = $payload['email'];
       
    } else {
        echo "Invalid ID token.";
    }
}
?>
