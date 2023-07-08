<?php

\error_reporting(E_ALL);

include_once \dirname(__DIR__).'/vendor/autoload.php';
include_once __DIR__.'/../Kernel/bootstrap.php';

/**
 * Example to perform Notion Datababse fetching of one Webmardi event.
 */

/********************************
Init cURL.
 ********************************/
$ch = curl_init();
$envs = getEnvVariables();

$page_id = '5c2fc251-4ad2-439c-90ba-c909807543e8';

/********************************
Setup cURL & Authentication for following calls.
 ********************************/
curl_setopt_array($ch, [
  CURLOPT_URL            => 'https://api.notion.com/v1/pages/'.$page_id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING       => '',
  CURLOPT_MAXREDIRS      => 10,
  CURLOPT_TIMEOUT        => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST  => 'GET',
  CURLOPT_HTTPHEADER     => [
    'Content-Type: application/json',
    "Authorization: Bearer {$envs['NOTION_TOKEN']}",
    "Notion-Version: {$envs['NOTION_VERSION']}",
  ],
]);

/********************************
Make the API call to fetch Webmardi Events.
 ********************************/
$response = curl_exec($ch);

/********************************
Close the cURL connection.
 ********************************/
curl_close($ch);
?>

<?php echo renderResponse('Webmardi Event from Notion Database', $response); ?>
