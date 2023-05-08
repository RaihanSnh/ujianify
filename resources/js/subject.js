let LoadedQuestions = {};
let CurrentAnswer = null;

function SaveAnswer(answer) {
    CurrentAnswer = answer;
    axios.post(_url('saveAnswer/' + QuestionID), {answer: answer});
}

document.addEventListener('DOMContentLoaded', function () {
    if(document.getElementById('ujianify_subject_container') === null) {
        return;
    }

    const answers = ['A', 'B', 'C', 'D', 'E'];

    answers.forEach(function (ans) {
        const answerButton = document.getElementById('btn_answer_' + ans);
        answerButton.addEventListener('click', function () {
            SaveAnswer(ans)
        });
    });
});
