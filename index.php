<?php 

  if(file_exists('./env.php'))
    include './env.php';

  $variables = [
      'USERNAME' => 'sample_api',
      'PASSWORD' => 'GVBjPMm9s8qf8CZd',
      'URL' => 'https://dev.driveitag.com/user/',
  ];

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }

  $username = getenv('USERNAME');
  $password = getenv('PASSWORD');
  $url = getenv('URL');

  $options = array(
    'http'=>array(
      'method' => "GET",
      'header' => "Authorization: Basic " . base64_encode("$username:$password")                 
    )
  );

  $context = stream_context_create($options);
  $content = file_get_contents($url, false, $context);
  
  header("Access-Control-Allow-Origin: *");
  header('Access-Control-Allow-Headers: Content-Type');
  echo json_encode($content);
  
?>
