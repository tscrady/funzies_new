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

$emailConfig = [
    'content' => [
      'from' => 'noreply@marketingresources.com',
      'subject' => 'Oh hey!',
      'html' => '<html><body><p>Testing SparkPost - the world\'s most awesomest email service!</p></body></html>'
    ],
    'recipients' => [
      ['address' => ['email'=>'jjones@marketingresources.com']]
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
