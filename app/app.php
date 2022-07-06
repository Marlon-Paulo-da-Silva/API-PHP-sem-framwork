<?php

define('API_BASE', 'http://localhost/api-php-sem-framwork/api/?option=');

echo '<p>APLICAÇÃO</p>';


for($i = 0; $i < 10; $i++){

    $resultado = api_request('random');
    
    
    // verificar se a response está ok (success)
    if($resultado['status'] == 'ERROR'){
        die('Aconteceu um erro na minha chamada à API');
    }

    echo "O valor ramdomico é: ".$resultado['data']. "<br />";
}

echo "Terminado!!";




function api_request($option)
{
    $client = curl_init(API_BASE . $option);
    
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);

    return json_decode($response, true);

}