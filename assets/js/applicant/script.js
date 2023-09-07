// VERSION 3


// MODAL[TERMS & AGREEMENT]
// Get the modal
var modal = document.getElementById("myModal");
  
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
  
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
  
// When the user clicks the button, open the modal 
btn.onclick = function() 
{
    modal.style.display = "block";
}
  
// When the user clicks on <span> (x), close the modal
span.onclick = function() 
{
    modal.style.display = "none";
}
  
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) 
{
    if (event.target == modal) {
      modal.style.display = "none";
    }
}

//allowed input
function restrictName(event) {
    const keyCode = event.keyCode || event.which;
    const inputValue = String.fromCharCode(keyCode);
    const allowedChars = /^[A-Za-zñÑ \b\t]+$/;

  if (!allowedChars.test(inputValue)) {
    event.preventDefault();
    document.getElementById("error-message").textContent = "Only letters A-Z are allowed";
  } else {
    document.getElementById("error-message").textContent = "";
  }
}
//rectriction of type number/ limit the digit
var ageInput = document.getElementById("age");
ageInput.addEventListener("input", function() {
  if (this.value.length > 2) {
      this.value = this.value.slice(0, 2);
  }
});
document.getElementById('age').addEventListener('keydown', function (event) {
  if (event.key === "-" || event.key === "+" || event.key === "e") {
      event.preventDefault();
  }
});
function formatPhoneNumber(input) {
  // Remove any non-numeric characters
  const numericValue = input.value.replace(/\D/g, '');

  // Ensure the phone number starts with "0"
  if (numericValue.length === 0 || numericValue[0] !== '0') {
    input.setCustomValidity('Phone Number must start with "0"');
  } else {
    input.setCustomValidity('');
  }
  // Add dashes to format the phone number
  let formattedValue = '';
  for (let i = 0; i < numericValue.length; i++) {
    if (i === 4 || i === 7) {
      formattedValue += '-';
    }
    formattedValue += numericValue[i];
  }

  // Update the input value with the formatted number
  input.value = formattedValue.substring(0, 13); // Ensure a maximum length of 13 characters
}

//validate form
function validateForm() {
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

    if (password !== confirm_password) {
        alert("Passwords do not match.");
        return false;
    }
}
// Validate password
function validatePassword() {
  var passwordInput = document.getElementById('myInput1'); // Corrected ID
  var passwordError = document.getElementById('password-error'); // Assuming you have an element with id 'password-error'
  var password = passwordInput.value;

  // Define your password requirements
  var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]).{8,}$/;

  if (password.match(regex)) {
    // Password meets the requirements
    passwordInput.setCustomValidity('');
    if (passwordError) {
      passwordError.innerHTML = ''; // Clear any previous error message
    }
  } else {
    // Password does not meet the requirements
    passwordInput.setCustomValidity('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.');
    if (passwordError) {
      passwordError.innerHTML = 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.';
    }
  }
}


//Show Password
let eyeIcons = document.getElementsByClassName("eyeicon");

for (let i = 0; i < eyeIcons.length; i++) {
  let eyeIcon = eyeIcons[i];
  let targetInputId = eyeIcon.getAttribute("data-target");
  let targetInput = document.getElementById(targetInputId);

  eyeIcon.onclick = function() {
    if (targetInput.type === "password") {
      targetInput.type = "text";
      eyeIcon.src = "../IMAGES/eye-open.png";
    } else {
      targetInput.type = "password";
      eyeIcon.src = "../IMAGES/eye-close.png";
    }
  };
}

