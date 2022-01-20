const answersList = document.querySelectorAll('ol.answers li');

answersList.forEach((li) => li.addEventListener('click', checkClickedAnswer));

function checkClickedAnswer() {
  alert('clicked!');
}
