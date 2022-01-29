<?php

function loadTemplate($filename, array $assignData = [])
{
    extract($assignData);
    include __DIR__ . '/../template/' . $filename . '.tpl.php';
}

function error404()
{
    // HTTPレスポンスのヘッダを404にする
    header('HTTP/1.1 404 Not Found');

    // レスポンスの種類を指定する
    header('Content-Type: text/html; charset=UTF-8');

    loadTemplate('404');
    exit(0);
}

function fetchById($id)
{
    // ファイルを開く
    $handler = fopen(__DIR__ . '/data.csv', 'r');

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
    $availableAnswers = ['A', 'B', 'C', 'D'];
    if (!in_array($correctAnswer, $availableAnswers)) {
        return false;
    }

    return true;
}

function generateFormattedData($data)
{
    $formattedData = [
        'id' => escape($data[0]),
        'question' => escape($data[1], true),
        'answers' => [
            'A' => escape($data[2]),
            'B' => escape($data[3]),
            'C' => escape($data[4]),
            'D' => escape($data[5]),
        ],
        'correctAnswer' => escape(strtoupper($data[6])),
        'explanation' => escape($data[7], true),
    ];
    return $formattedData;
}

function escape($data, $nl2br = false)
{
    $convertedData = htmlspecialchars($data, ENT_HTML5);

    if ($nl2br) {
        return nl2br($convertedData);
    }
    return $convertedData;
}
