const questionInput = document.getElementById("Question");
const answerInput = document.getElementById("Answer");
const submitQABtn = document.getElementById("SubmitQABnt");
const cancelBtn = document.getElementById("CancelBtn");

cancelBtn.addEventListener('click', async () => {
    window.location.href = "http://localhost/all-bout-SDLC-article/article-client/home.html";
})

submitQABtn.addEventListener('click', async () => {
    const form = new FormData();
    form.append("question", questionInput.value);
    form.append("answer", answerInput.value);

    const response = await axios.post(
        "http://localhost/all-bout-SDLC-article/article-server/api/createQuestion.php",
        form
    );

    if (response) {
        answerInput.value = "";
        questionInput.value = "";
        alert(response.data.message);
    }

});
