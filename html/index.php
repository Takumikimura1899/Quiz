<?php

require __DIR__ . '/../lib/functions.php';

$datalist = fetchAll();

if (!$datalist) {
    error404();
}

$formattedData = generateFormattedData($data);

$assignData = [
    'id' => $formattedData['id'],
    'question' => $formattedData['question'],
    'answers' => $formattedData['answers'],
];
loadTemplate('index', $assignData);
