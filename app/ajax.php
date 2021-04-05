<?php

if (!isset($_POST['search'])) {
    exit('No results.');
}

if (strlen($_POST['search']) < 3) {
    exit('<table class="resultTable"></table>');
}
$resultsFound = '<div class="resultFound"><strong>0</strong> results found</div>';
$searchString  = trim($_POST['search']);

require_once __DIR__."/vendor/autoload.php";
$clientBuilder = Elasticsearch\ClientBuilder::create();
$clientBuilder->setHosts(array('elasticsearch:9200'));
$client = $clientBuilder->build();


$params = [
    'index' => 'fb_data',
    'body'  => [
        'size' => 100,
        'from' => 0,
        'query' => [
                    'multi_match' => [
                    'query' => $searchString,
                    'type' => 'cross_fields',
                    'fields' => ["column1", "column3^5", "column4^2"],
                    'operator' => 'and'
                ]
            ]
    ]
];

$results = $client->search($params);

$nbResults = $results['hits']['total']['value'];
$outData = array();
foreach ($results['hits']['hits'] as $tmp) {
    $tmp = $tmp['_source'];
    $i = 1;
    $currentRecord = array();
    while (isset($tmp['column'.$i])) {
        $currentRecord['column'.$i] = $tmp['column'.$i];
        $i++;
    }
    $outData[] = $currentRecord;
}

$resultsFound = '<div class="resultFound"><strong>'.$nbResults.'</strong> results found</div>';

$outTable = '<table class="resultTable">';
    foreach ($outData as $rows) {
    $outTable.='<tr>';
        foreach ($rows as $cell) {
            $outTable.='<td>'.$cell.'</td>';
        }
    $outTable.='</tr>';
    }
$outTable .='</table>';


exit($resultsFound.$outTable);
