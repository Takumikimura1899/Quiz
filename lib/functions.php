<?php

function fetchById($id)
{
    // ファイルを開く
    $handler = fopen(__DIR__ . "/data.csv", "r");

    // データを取得
    $question = [];
    while ($row = fgetcsv($handler)) {
        if (isDataRow($row)) {
            if ($row[0] === $id) {
                $question = $row;
                break;
            }
        }
    }

    // ファイルを閉じる
    fclose($handler);

    // データを返す
    return $question;
}

function isDataRow(array $row)
{
    if (count($row) !== 8) {
        return false;
    }

    foreach ($row as $value) {
        if (empty($value)) {
            return false;
        }
    }

    if (!is_numeric($row[0])) {
        return false;
    }

    $correctAnswer = strtoupper($row[6]);
    $availableAnswers = ["A", "B", "C", "D"];
    if (!in_array($correctAnswer, $availableAnswers)) {
        return false;
    }

    return true;
}
