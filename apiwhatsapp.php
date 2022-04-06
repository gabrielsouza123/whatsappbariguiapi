<?php
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

$url = 'https://2283-170-82-200-6.ngrok.io'

$numero = $input['number']; 
$caption = $input['caption'];
$file = "https:" . $input['file'];

$data = array('number' => $numero, 'caption' => $caption, 'file' => $file);
$options = array (
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE)  {  /*Handle error */  }
echo 'Mensagem enviada :)';
//var_dump($result);

?>
