<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
    $response = array();
    $response[0] = array(
        'slackUsername' => 'Tj',
        'backend' => true,
        'age' => 25, 
        'bio' => 'I am graduate of Information Technology and a fullstack software engineer.'
    );


echo json_encode($response); 