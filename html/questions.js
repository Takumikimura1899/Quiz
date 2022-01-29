const answersList = document.querySelectorAll('ol.answers li');

answersList.forEach((li) => li.addEventListener('click', checkClickedAnswer));

function checkClickedAnswer(event) {
  const clickedAnswerElement = event.currentTarget;
  console.log(clickedAnswerElement.dataset.answer);
  const selectedAnswer = clickedAnswerElement.dataset.answer;

  const questionId = clickedAnswerElement.closest('ol.answers').dataset.id;

  // フォームデータの入れ物を作る
  const formData = new FormData();

  // 送信したい値を追加
  formData.append('id', questionId);
  formData.append('selectedAnswer', selectedAnswer);

  // xhrはXMLHttpRequestの頭文字
  const xhr = new XMLHttpRequest();

  // HTTPメソッドをPOSTに指定、送信するURLを指定
  xhr.open('POST', 'answer.php');

  // フォームデータを送信
  xhr.send(formData);

  // loadendはリクエストが完了したときにイベントが発生する
  xhr.addEventListener('loadend', (event) => {
    /** @type {XMLHttpRequest} */
    const xhr = event.currentTarget;

    // リクエストが成功したかステータスコードで確認
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.response);
      const result = response.result;

      // 画面表示
      displayResult(result);
    } else {
      // エラー
      alert('Error: 回答データの取得に失敗しました');
    }
  });
}

function displayResult(result) {
  //  メッセージを入れる変数を用意
  let message;
  // カラーコードを入れる変数を用意
  let answerColorCode;

  // 答えが正しいか判定
  if (result) {
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
