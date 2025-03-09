document.addEventListener("DOMContentLoaded",
    async () => {
        const response = await axios.post("http://localhost/all-bout-SDLC-article/article-server/api/getQuestion.php", ' ');
        const faqContainer = document.getElementById("FQContainer");
        faqContainer.innerHTML = "";

        if (response.data && response.data.length > 0) {
            response.data.forEach(fq => {
                faqContainer.innerHTML += `
                    <div class="QA">
                        <p class="question">Q: ${fq.question}</p>
                        <p class="answer">A: ${fq.answer}</p>
                    </div>
                `;
            });
        }
    }
);

const searchBarInput = document.getElementById("searchBarInput");
const addFAQBtn = document.getElementById("addFAQ-btn");

addFAQBtn.addEventListener('click', async () => {
    window.location.href = "addQA.html";
});

searchBarInput.addEventListener("input", async () => {
    const form = new FormData();
    form.append("searchInput", searchBarInput.value);

    try {
        const response = await axios.post("http://localhost/all-bout-SDLC-article/article-server/api/getQuestion.php", form);

        const faqContainer = document.getElementById("FQContainer");
        faqContainer.innerHTML = "";

        if (response.data && response.data.length > 0) {
            response.data.forEach(fq => {
                faqContainer.innerHTML += `
                    <div class="QA">
                        <p class="question">Q: ${fq.question}</p>
                        <p class="answer">A: ${fq.answer}</p>
                    </div>
                `;
            });
        } else {
            faqContainer.innerHTML = "<p>No results found.</p>";
        }
    } catch (error) {
        alert("An error occurred");
    }
});

