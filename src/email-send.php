<?php

require __DIR__ . '/../vendor/autoload.php';
include './Email/ConfigMail.php';

use App\email\ConfigMail;

$isValid = false;
$senderMail = new ConfigMail();

if(isset($_POST['sender']) && isset($_POST['recipient'])  && isset($_POST['message']) && isset
    ($_POST['subject'])) {
    $sender = trim($_POST['sender']);
    $recipient = trim($_POST['recipient']);
    $message = trim($_POST['message']);
    $subject = trim($_POST['subject']);
    if(
            filter_var($sender, FILTER_SANITIZE_EMAIL) == false ||
            filter_var($recipient, FILTER_SANITIZE_EMAIL) == false ||
            filter_var($message, FILTER_SANITIZE_STRING) == false ||
            filter_var($subject, FILTER_SANITIZE_STRING) == false
    ) {
        $isValid = false;
    } else {
        // Create a message
        $message = (new Swift_Message($subject))
            ->setFrom([$sender])
            ->setTo([$recipient])
            ->setBody($message);

        // Send the message
        $result = $senderMail->mailer()->send($message);
        $isValid = true;
    }
} else {
    $isValid = false;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>Send Email</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><i class="fas fa-envelope-open-text mx-2"></i>Send
            Email</a>
    </div>
</nav>

<!--
#### Script
-->
<!--bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous">

</script>
<!--sweetalert2-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    if(<?= json_encode($isValid); ?>) {
        Swal.fire({
            icon: 'success',
            title: 'Your mail has been send',
            confirmButtonText: "ok"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.html";
            }
        })
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            confirmButtonText: "ok"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.html";
            }
        })
    }
</script>
</body>
</html>


