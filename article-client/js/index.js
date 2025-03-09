const emailInput = document.getElementById("Email");
const passwordInput = document.getElementById("Password");
const loginBtn = document.getElementById("Login-Button");

loginBtn.addEventListener("click",
    async () => {
        const form = new FormData();
        form.append("email", emailInput.value);
        form.append('password', passwordInput.value);

        const response = await axios.post("http://localhost/all-bout-SDLC-article/article-server/api/login.php", form);

        if (response.data.status == "success") {
            window.location.href = "home.html";
        } else if (response.data.status == "error") {
            alert(response.data.message);
        }

    }
)