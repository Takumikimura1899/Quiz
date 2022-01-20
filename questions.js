const answersList = document.querySelectorAll('ol.answers li');

answersList.forEach((li) => li.addEventListener('click', checkClickedAnswer));

function checkClickedAnswer() {
  //  メッセージを入れる変数を用意
  let message;
  // カラーコードを入れる変数を用意
  let answerColorCode;

  // 答えが正しいか判定
  if (false) {
    // 正しい答えだった時
    message = '正解です!おめでとう!';
    answerColorCode = '';
  } else {
    // 間違った答えだった時
    message = '残念!不正解です!';
    answerColorCode = '#f05959';
  }

  alert('clicked!');

  // 色を変更
  document.querySelector('span#correct-answer').style.color = '#f05959';
  //   答え全体を表示
  document.querySelector('div#section-correct-answer').style.display = 'block';
}
