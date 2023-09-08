function uploadProfilePicture() {
    const inputFile = document.getElementById('profile-image-input');
    const file = inputFile.files[0];
    const formData = new FormData();
    formData.append('profile_img', file);

    $.ajax({
        type: 'POST',
        url: 'upload_profile.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            const profilePicture = document.querySelector('.profile-picture img');
            if (response === 'success') {
                profilePicture.src = URL.createObjectURL(file);
            } else {
                alert('Failed to upload profile picture.');
            }
        },
        error: function () {
            alert('An error occurred while uploading the profile picture.');
        }
    });
}

function restrictName(event) {
    const keyCode = event.keyCode || event.which;
    const inputValue = String.fromCharCode(keyCode);
    const allowedChars = /^[A-Za-zñÑ \b\t\-]+$/;

    if (!allowedChars.test(inputValue)) {
        event.preventDefault();
        document.getElementById("error-message").textContent = "Only letters A-Z and '-' are allowed";
    } else {
        document.getElementById("error-message").textContent = "";
    }
}


  //rectriction of type number/ limit the digit
  function checkInputLength(inputElement, maxLength) {
    if (inputElement.value.length > maxLength) {
      inputElement.value = inputElement.value.slice(0, maxLength);
    }
  }