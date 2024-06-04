<?php
    header("Access-Control-Allow-Origin:*");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Method: GET");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control_Allow-Headers, Authorization, x-Request-with");

    function getData(){
        include "../classes/dbh.php";
        include "../classes/select.php";
        $invoice = $_GET['invoice'];
        $get_status = new selects();
        $rows = $get_status->fetch_details_cond('sales', 'invoice', $invoice);
        if(gettype($rows) === "array"){
            $data = [
                'status' => 200,
                'message' => 'Record fetched',
                'data' => $rows
            ];
            header("HTTP/1.0 200 Record found");
            return json_encode($data);
            
        }else{
            $data = [
                'status' => 404,
                'message' => 'No record found',
            ];
            header("HTTP/1.0 404 No record found");
            return json_encode($data);
        }
    }
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    if($requestMethod == "GET"){
        $invoice_details = getData();
        
        echo $invoice_details;

    }else{
        $data = [
            'status' => 405,
            'message' => $requestMethod . 'Method Not allowed',
        ];
        header("HTTP/1.0 405 Method Not Allowed");
        echo json_encode($data);
    }

?>