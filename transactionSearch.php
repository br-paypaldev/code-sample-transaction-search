<?php
//Incluindo o arquivo que contém a função sendNvpRequest
require 'sendNvpRequest.php';

//Vai usar o Sandbox, ou produção?
$sandbox = true;

//Baseado no ambiente, sandbox ou produção, definimos as credenciais
//e URLs da API.
if ($sandbox) {
    //credenciais da API para o Sandbox
    $user = 'conta-business_api1.test.com';
    $pswd = '1365001380';
    $signature = 'AiPC9BjkCyDFQXbSkoZcgqH3hpacA-p.YLGfQjc0EobtODs.fMJNajCx';
} else {
    //credenciais da API para produção
    $user = 'usuario';
    $pswd = 'senha';
    $signature = 'assinatura';
}

//Campos da requisição da operação TransactionSearch, como ilustrado acima.
$requestNvp = array(
    'USER' => $user,
    'PWD' => $pswd,
    'SIGNATURE' => $signature,

    'VERSION' => '108.0',
    'METHOD'=> 'TransactionSearch',

    'STARTDATE' => '2014-02-03T00:00:00Z'
);

//Envia a requisição e obtém a resposta da PayPal
$responseNvp = sendNvpRequest($requestNvp, $sandbox);

//Se a operação tiver sido bem sucedida, podemos listar as transações encontradas
if (isset($responseNvp['ACK']) && $responseNvp['ACK'] == 'Success') {
    print_r($responseNvp);
} else {
    //Opz, alguma coisa deu errada.
    //Verifique os logs de erro para depuração.
}
