<?php

require __DIR__ . "/../lib/functions.php";

$id = "1";

$data = fetchById($id);
var_dump($data);

$question = "HTMLはなんの略称？";

// <li data-answer="A">HyperTextMakingLanguage</li>
// <li data-answer="B">HyperTextMarkupLanguage</li>
// <li data-answer="C">HonmaniTensaitekinaMajidesugoiLanguage</li>
// <li data-answer="D">そもそも略称ではない</li>
$answers = [
    "A" => "HyperTextMakingLanguage",
    "B" => "HyperTextMarkupLanguage",
    "C" => "HonmaniTensaitekinaMajidesugoiLanguage",
    "D" => "そもそも略称ではない",
];

//  <p>
//           <span id="correct-answer">B. HyperTextMarkupLanguage</span><br />
//           これが間違えてたら「HTMLとは？」の動画を復習お願いします！
//         </p>

$correctAnswer = "B";
$correctAnswerValue = $answers[$correctAnswer];
$explanation = "これが間違えてたら「HTMLとは？」の動画を復習お願いします！";

include __DIR__ . "/../template/question.tpl.php";
