<?php

if (isset($_POST['email'], $_POST['name'], $_POST['adults'], $_POST['children'])) {

    $mailto = 'jbvillegas@gmail.com';
    $subject = 'G4P Reservation request';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $children = $_POST['children'];
    $adults = $_POST['adults'];
    $msg = isset($_POST['message']) == TRUE ? $msg = $_POST['message'] : $msg = '';
    $ip = $_SERVER['REMOTE_ADDR'];

    $headers = 'From: jvillegas@aws.vsritual.com' . "\r\n" .
    "Reply-To: $email" . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $message = "Reservation from $ip\r\nName: $name\r\nEmail: $email\r\nAdults: $adults\r\nChildren: $children\r\n\r\nMessage:\r\n$msg\r\n";
    $message = wordwrap($message, 70, "\r\n");
    mail ( $mailto, $subject, $message, $headers );

    file_put_contents("reservation.csv", "\r\n$ip,$name,$email$,adults,$children,$msg", FILE_APPEND);


}
