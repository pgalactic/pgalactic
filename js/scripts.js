document
  .getElementById("contact-form")
  .addEventListener("submit", function (e) {
    let valid = true;

    const name = document.getElementById("contact_name");
    const nameError = document.getElementById("name-error");
    if (!name.value.trim()) {
      nameError.textContent = "Please enter your name.";
      valid = false;
    } else {
      nameError.textContent = "";
    }

    const email = document.getElementById("contact_email");
    const emailError = document.getElementById("email-error");
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.value.trim()) {
      emailError.textContent = "Please enter your email address.";
      valid = false;
    } else if (!emailPattern.test(email.value.trim())) {
      emailError.textContent = "Please enter a valid email address.";
      valid = false;
    } else {
      emailError.textContent = "";
    }

    const message = document.getElementById("contact_message");
    const messageError = document.getElementById("message-error");
    if (!message.value.trim()) {
      messageError.textContent = "Please enter a message.";
      valid = false;
    } else {
      messageError.textContent = "";
    }

    if (!valid) e.preventDefault();
  });
