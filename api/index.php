<?php

// import output.php
require_once('output.php');

// prepara response
$data['status'] = 'ERROR';
$data['data'] = [];

// request
if(isset($_GET['option'])){

    switch($_GET['option']){
        case 'status':
            define_response($data, 'API OK');
            break;
        
        case 'random':
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
            break;
            
    }

} 

// emitir a resposta da API
response($data);
