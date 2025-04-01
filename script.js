document.getElementById("contact-form").addEventListener("submit", function(event) {
    event.preventDefault();
    
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const message = document.getElementById("message").value;

    if (name && email && message) {
        document.getElementById("responseMessage").innerText = "Thanks for reaching out!";
        document.getElementById("contact-form").reset();
    } else {
        document.getElementById("responseMessage").innerText = "Please fill out all fields.";
    }
});
