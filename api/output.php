<?php

// =====================================================
function define_response(&$data, $value){
    $data['status'] = 'SUCCESS';
    $data['data'] = $value;
}


// =====================================================
// construção da response
function response($data_response){
    header("Content-Type:application/json");
    echo json_encode($data_response);
}