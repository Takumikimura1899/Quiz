const answersList = document.querySelectorAll('ol.answers li');

answersList.forEach((li) => li.addEventListener('click', checkClickedAnswer));

function checkClickedAnswer(event) {
  const clickedAnswerElement = event.currentTarget;
  console.log(clickedAnswerElement.dataset.answer);
  const selectedAnswer = clickedAnswerElement.dataset.answer;

  const correctAnswer = 'B';
  //  メッセージを入れる変数を用意
  let message;
  // カラーコードを入れる変数を用意
  let answerColorCode;

  // 答えが正しいか判定
  if (selectedAnswer === correctAnswer) {
    // 正しい答えだった時
    message = '正解です!おめでとう!';
    answerColorCode = '';
  } else {
    // 間違った答えだった時
    message = '残念!不正解です!';
    answerColorCode = '#f05959';
  }

  alert(message);

  // 色を変更
  document.querySelector('span#correct-answer').style.color = '#f05959';
  //   答え全体を表示
  document.querySelector('div#section-correct-answer').style.display = 'block';
}
