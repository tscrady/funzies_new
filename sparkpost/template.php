<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

require 'vendor/autoload.php';

use SparkPost\SparkPost;
use GuzzleHttp\Client;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

$apiKey = '0020d408e948d3820b4c35f9bc0eff0676874552';
$httpClient = new GuzzleAdapter(new Client());
$SparkPost = new SparkPost($httpClient, ['key' => $apiKey]);

$code = 'DKLC39809C0';
$name = 'John Smith';


$emailConfig = [
    'content' => [
        'template_id' => 'tyler-first-email'
    ],
    'recipients' => [
      ['address' => ['email'=>'tcrady@marketingresources.com']]
    ],
    'substitution_data' => 
        [
          'code' => $code,
          'name' => $name
        ]
];

$SparkPost->setOptions(['async' => false]);
try {
  // send the email
  $response = $SparkPost->transmissions->post($emailConfig);
  echo "Email success \n";
}
catch (\Exception $e) {
  // Email failed to send, need to indicate this somewhere
  echo 'Failed to send ['.$e->getMessage().']'."\n";
}
