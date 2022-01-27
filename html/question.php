<?php

require __DIR__ . "/../lib/functions.php";

$id = "1";

$data = fetchById($id);

$question = nl2br(htmlspecialchars($data[1]));

// <li data-answer="A">HyperTextMakingLanguage</li>
// <li data-answer="B">HyperTextMarkupLanguage</li>
// <li data-answer="C">HonmaniTensaitekinaMajidesugoiLanguage</li>
// <li data-answer="D">そもそも略称ではない</li>
$answers = [
    "A" => htmlspecialchars($data[2]),
    "B" => htmlspecialchars($data[3]),
    "C" => htmlspecialchars($data[4]),
    "D" => htmlspecialchars($data[5]),
];

//  <p>
//           <span id="correct-answer">B. HyperTextMarkupLanguage</span><br />
//           これが間違えてたら「HTMLとは？」の動画を復習お願いします！
//         </p>

$correctAnswer = htmlspecialchars(strtoupper($data[6]));
$correctAnswerValue = $answers[$correctAnswer];
$explanation = nl2br(htmlspecialchars($data[7]));

include __DIR__ . "/../template/question.tpl.php";
