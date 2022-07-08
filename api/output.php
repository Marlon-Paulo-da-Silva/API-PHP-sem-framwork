<?php


// =====================================================
function api_status(&$data){
    define_response($data, 'API OK');
}

// =====================================================
function api_hash(&$data){
    define_response($data, md5(sha1(uniqid())));
}

// =====================================================
function api_random(&$data){
    $min = 0;
    $max = 1000;

    /*
        Verifica se vem min e / ou max no GET
    */
    if(isset($_GET['min'])){
        $min = intval($_GET['min']);
    }
    
    if(isset($_GET['max'])){
        $max = intval($_GET['max']);
    }

    if($min >= $max){
        response($data);
    }

    define_response($data, rand($min, $max));
}

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