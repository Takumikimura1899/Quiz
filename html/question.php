<?php

require __DIR__ . "/../lib/functions.php";

$id = escape($_GET["id"]);

$data = fetchById($id);

if (!$data) {
    exit(0);
}

$formattedData = generateFormattedData($data);

$question = $formattedData["question"];
$answers = $formattedData["answers"];
$correctAnswer = $formattedData["correctAnswer"];
$correctAnswerValue = $answers[$correctAnswer];
$explanation = $formattedData["explanation"];

include __DIR__ . "/../template/question.tpl.php";
