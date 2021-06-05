<?php
    if(isset($_POST['send'])) {
        $to = 'lukasjuranek382@gmail.com';
        $subject = 'jurankovi-triatlon.cz - contact form';
        $message = 'From: '.$_POST['from']."\r\n\r\nMessage:\r\n\r\n".$_POST['message'];
        $headers = "From: jurankovi@triatlon.cz" . "\r\n";
        $success = mail($to, $subject, $message, $headers);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

    <?php
    
    if(isset($success) & $success) { ?>
    <h1>Thank you for sending a message</h1>
    <?php } else { ?>
    <h1>Not sent</h1>
    <?php } ?>

    <a href="../index.html">Go back</a>


</body>
</html>