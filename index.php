<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');


if(isset($_POST)){

    if(isset($_POST['operation_type']) && !empty($_POST['operation_type']) &&isset($_POST['x']) && !empty($_POST['x']) && isset($_POST['y']) && !empty($_POST['y']) ){

        $operation = trim($_POST['operation_type']);
        $x = $_POST['x'];
        $y = $_POST['y'];

        calculate($operation,$x,$y);

    }else {

        $data = json_decode(file_get_contents('php://input'), true);

        if(count($data)){

            $operation = trim($data['operation_type']);
            $x = $data['x'];
            $y = $data['y'];

            calculate($operation,$x,$y);            
        }else {
            echo errorResponse();
        }

    }

}


function calculate($operation,$x,$y)
{
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
                print_r($operation);
                    // echo errorResponse(); exit();
                    break;
            }     

            $response = array(
                'slackUsername' => 'Tj',
                'result' => $result,
                'operation_type' => $operation_type
            );

            http_response_code(200);
            echo json_encode($response);             

            exit();

        } catch (Exception $e) {
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


