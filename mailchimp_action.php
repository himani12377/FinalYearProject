<?php


session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email'];

    if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        $apiKey = '8b6d27861a9279d27e1404d4be688c6b-us20';
        $audienceId = 'f704696028';

        $memberID = md5(strtolower($email));
        $dataCenter = substr($apiKey,strpos($apiKey, '-')+1);
        $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $audienceId . '/members/' . $memberID;
        $json = json_encode([
            'email_address' => $email,
            'status' => 'subscribed'
        ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode == 200) {
            $_SESSION['msg'] = '<p style="color: #34A853">You have been subscribed to The Blue group.</p>';

        }else {
            switch ($httpCode) {
                case 214:
                    $msg = 'You are already subscribed.';
                    break;
                    default:
                    $msg = 'Some problem occured, please try again.';
                    break;

            }
            $_SESSION['msg'] = '<p style ="color: #EA4335">' .$msg. '</p>';
        }
    }else{
        $_SESSION['msg'] = '<p style="color: #EA4335">Please enter valid email.</p>';
    }
}
header('location:index.php');
?>