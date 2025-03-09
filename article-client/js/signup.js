const fullNameInput = document.getElementById("FullName");
const emailInput = document.getElementById("Email");
const passwordInput = document.getElementById("Password");
const signupBtn = document.getElementById("SignUp-Button");

signupBtn.addEventListener("click",
    async () => {
        const form = new FormData();
        form.append("fullname", fullNameInput.value);
        form.append("email", emailInput.value);
        form.append('password', passwordInput.value);

        const response = await axios.post("http://localhost/all-bout-SDLC-article/article-server/api/signup.php", form);

        if (response.data.status == "success") {
            window.location.href = "home.html";
        } else if (response.data.status == "error") {
            alert(response.data.message);
        }

    }
)