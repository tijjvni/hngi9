<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');


if(isset($_POST)){

    // print_r($_POST);

    if(isset($_POST['operation_type']) && !empty($_POST['operation_type']) &&isset($_POST['x']) && !empty($_POST['x']) && isset($_POST['y']) && !empty($_POST['y']) ){

        $operation = $_POST['operation_type'];
        $x = $_POST['x'];
        $y = $_POST['y'];


        try {
            switch ($operation) {
                case 'addition':
                    $operation_type = 'addition';
                    $result = $x+$y;
                    break;
                case 'subtraction':
                    $operation_type = 'subtraction';
                    $result = $x-$y;
                    break;
                case 'multiplication':
                    $operation_type = 'multiplication';
                    $result = $x*$y;
                    break;
                
                default:
                    echo errorResponse(); exit();
                    break;
            }     

            $response = array(
                'slackUsername' => 'Tj',
                'result' => $result,
                'operation_type' => $operation_type
            );

            http_response_code(200);

            echo json_encode($response);             


        } catch (Exception $e) {
            echo errorResponse();        
        }

    }else {
        echo errorResponse();
    }

}


function errorResponse()
{
    $response = array(
        'status' => 'error',
        'message' => 'An error occured'
    );

    http_response_code(500);

    return json_encode($response);
}


