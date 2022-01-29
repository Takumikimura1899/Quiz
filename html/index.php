<?php

require __DIR__ . '/../lib/functions.php';

$datalist = fetchAll();

if (!$datalist) {
    error404();
}

$questions = [];
foreach ($datalist as $data) {
    $questions[] = generateFormattedData($data);
}

$assignData = [
    'questions' => $questions,
];

loadTemplate('index', $assignData);
