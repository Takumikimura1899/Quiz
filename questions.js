const answersList = document.querySelectorAll('ol.answers li');

answersList.forEach((li) => li.addEventListener('click', checkClickedAnswer));

const correctAnswers = {
  question1: 'B',
  question2: 'A',
  question3: 'B',
  question4: 'C',
  question5: 'D',
  question6: 'B',
};

function checkClickedAnswer(event) {
  const clickedAnswerElement = event.currentTarget;
  console.log(clickedAnswerElement.dataset.answer);
  const selectedAnswer = clickedAnswerElement.dataset.answer;

  const questionId = clickedAnswerElement.closest('ol.answers').dataset.id;

  const correctAnswer = correctAnswers[questionId];
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
  document.querySelector('span#correct-answer').style.color = answerColorCode;
  //   答え全体を表示
  document.querySelector('div#section-correct-answer').style.display = 'block';
}
