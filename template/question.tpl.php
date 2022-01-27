<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script src="questions.js" defer></script>

    <title>問題<?php echo $id; ?> | Quiz!</title>
</head>

<body>
    <div id="main">
        <h1>Quiz!</h1>

        <div class="section">
            <h2>問題<?php echo $id; ?></h2>
            <p><?php echo $question; ?></p>

            <h3>選択肢</h3>
            <ol class="answers" data-id="<?php echo $id; ?>">
                <?php foreach ($answers as $key => $value): ?>
                <li data-answer="<?php echo $key; ?>"> <?php echo $value; ?> </li>
                <?php endforeach; ?>
        </div>

        <div id="section-correct-answer" class="section">
            <h2>答え</h2>
            <p>
                <span id="correct-answer"> <?php echo $correctAnswer; ?>. <?php echo $correctAnswerValue; ?>
                </span><br />
                <?php echo $explanation; ?>
            </p>
            <form method="POST" action="answer.php">
                <p>ID: <br><input name='id' type="text" value="1"></p>
                <p>選んだ答え: <br><input name="selectAnswer" type="text"></p>
                <p><input type="submit" value="送信"></p>
            </form>
        </div>

        <div class="section">
            <a href="./index.html">戻る</a>
        </div>
    </div>
</body>

</html>