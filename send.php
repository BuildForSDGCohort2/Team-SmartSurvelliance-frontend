<?php 

function sendPushNotification($fields = array())
{
    $API_ACCESS_KEY = 'AAAAjfN0wn4:APA91bEKcCeOfFpeNLaIgU032GFbfVVuhES_zZVuTuOxTRIajwJsHnhvccESa3WSkkhzYLg0w65D2po6iIlhwJsIQ3fBcjyz_j5CgNSJrGAR8kxd2fhxCsUcOPjp5gyDhla4oFvj_k_g';
    $headers = array
    (
        'Authorization: key=' . $API_ACCESS_KEY,
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch );
    curl_close( $ch );
    return $result;
}

$title = 'ALERT! YOU HAVE AN INTRUDER';
$message = 'You have someone at the front door.';
$fields = array
(
    'registration_ids'  => ['cZLSkPkml3gjya_qLA1EvT:APA91bF3vRvEQ1EbpSjkoUbQ8bTfwAE5dSYXpBBKiLXvhg1avym514593GGzK46yx_kiL7I9b15Ir4iaCJmx0UqNbEiiCes8YLPerOnLwU-gZJ7dSS7k8i7HaRk7rxyRBd2tjd4ciCdo'],
    'data'          => '',
    'priority' => 'high',
    'notification' => array(
        'body' => $message,
        'title' => $title,
        'sound' => 'default',
        'icon' => 'https://smart-surveillance-web-app.herokuapp.com/assets/images/logo.jpg'
    )
);