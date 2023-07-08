<?php

\error_reporting(E_ALL);

include_once \dirname(__DIR__).'/vendor/autoload.php';
include_once __DIR__.'/../Kernel/bootstrap.php';

/**
 * Example to perform Notion Datababse listing of the Webmardi database future events.
 */

/********************************
Init cURL.
 ********************************/
$ch = curl_init();
$envs = getEnvVariables();

// $since = (new DateTime('now'))->format('Y-m-d');
$since = '2023-07-01';

/********************************
Notion Parameters.
 ********************************/
$notion_params =  [
  "page_size" => 20,
  "sorts" => [
    [
      "property" => "date",
      "direction" => "ascending"
    ]
  ],
  "filter" => [
    "and" => [
      [
        "property" => "published",
        "checkbox" => [
          "equals" => true
        ]
      ],
      [
        "property" => "date",
        "date" => [
          "on_or_after" => $since,
        ]
      ]
    ]
  ]
];

/********************************
Setup cURL & Authentication for following calls.
 ********************************/
curl_setopt_array($ch, [
  CURLOPT_URL            => 'https://api.notion.com/v1/databases/'.$envs['NOTION_WEBMARDI_DATABASE_ID'].'/query',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING       => '',
  CURLOPT_MAXREDIRS      => 10,
  CURLOPT_TIMEOUT        => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST  => 'POST',
  CURLOPT_POSTFIELDS     => json_encode($notion_params),
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

<?php echo renderResponse('Webmardi Future Events from Notion Database', $response); ?>
