
  const form = document.getElementById("contactForm");

  form.addEventListener("submit", function (e) {
    const name = document.getElementById("name");
    const email = document.getElementById("email");
    const phone = document.getElementById("phone");
    const subject = document.getElementById("subject");
    const message = document.getElementById("message");

    // Allow only letters and spaces in name
    if (!/^[A-Za-z\s]{2,50}$/.test(name.value)) {
      alert("Please enter a valid name (letters only, min 2 characters).");
      name.focus();
      e.preventDefault();
      return;
    }

    // Email is already validated by type="email"

    // Allow only 10-digit number
    if (!/^\d{10}$/.test(phone.value)) {
      alert("Please enter a valid 10-digit mobile number.");
      phone.focus();
      e.preventDefault();
      return;
    }

    // Ensure subject is selected
    if (subject.value === "") {
      alert("Please select a subject.");
      subject.focus();
      e.preventDefault();
      return;
    }

    // Message length check
    if (message.value.trim().length < 10) {
      alert("Message should be at least 10 characters.");
      message.focus();
      e.preventDefault();
      return;
    }
  });

  // Prevent typing non-digits in phone field
  document.getElementById("phone").addEventListener("input", function () {
    this.value = this.value.replace(/\D/g, '');
  });





document.getElementById("showFormBtn").addEventListener("click", function () {
    fetch("mainform.php") // Fetch the full form HTML
        .then(response => response.text())
        .then(html => {
            document.getElementById("formContainer").innerHTML = html;
        })
        .catch(error => {
            console.error("Error loading form:", error);
        });
});
let container = document.getElementById("formContainer");
container.style.display = "none";
container.innerHTML = html;
container.style.display = "block";
container.style.transition = "all 0.5s ease-in-out";

        