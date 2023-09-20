// Define a function to navigate between form steps.
const navigateToFormStep = (stepNumber) => {
    // Hide all form steps.
    document.querySelectorAll(".form-step").forEach((formStepElement) => {
        formStepElement.classList.add("d-none");
    });

    // Mark all form steps as unfinished.
    document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
        formStepHeader.classList.add("form-stepper-unfinished");
        formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
    });

    // Show the current form step (as passed to the function).
    document.querySelector("#step-" + stepNumber).classList.remove("d-none");

    // Select the form step circle (progress bar).
    const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');

    // Mark the current form step as active.
    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
    formStepCircle.classList.add("form-stepper-active");

    // Loop through each form step circles.
    // This loop will continue up to the current step number.
    // Example: If the current step is 3,
    // then the loop will perform operations for step 1 and 2.
    for (let index = 0; index < stepNumber; index++) {
        // Select the form step circle (progress bar).
        const formStepCircle = document.querySelector('li[step="' + index + '"]');

        // Check if the element exists. If yes, then proceed.
        if (formStepCircle) {
            // Mark the form step as completed.
            formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
            formStepCircle.classList.add("form-stepper-completed");
        }
    }
};

// Select all form navigation buttons and add a click event listener to each button.
document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
    formNavigationBtn.addEventListener("click", () => {
        // Get the value of the step.
        const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));

        // Call the function to navigate to the target form step.
        navigateToFormStep(stepNumber);

        console.log(stepNumber);
    });
});

// Get all the buttons with the class "scrollButton".
const scrollButtons = document.querySelectorAll(".btn-navigate-form-step");

// Add a click event listener to each button to scroll to the top of the page.
scrollButtons.forEach((button) => {
    button.addEventListener("click", function () {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
    });
});

// Function to remove numbers and non-letter characters from input
function noNumber(event) {
    const inputElement = event.target;
    const inputValue = inputElement.value;

    // Use a regular expression to remove numbers and other non-letter characters
    const lettersOnlyValue = inputValue.replace(/[^A-Za-z]+/g, '');

    // Update the input field value with the cleaned value
    inputElement.value = lettersOnlyValue;
}

// Function to validate the form and enable/disable the "Next" button
function validateForm() {
    const requiredInputs = document.querySelectorAll('[required]');
    let allFieldsFilled = true;
    const missingFields = [];

    requiredInputs.forEach((input) => {
        if (input.value.trim() === '') {
            allFieldsFilled = false;
            missingFields.push(input.placeholder);
            input.classList.add('is-invalid'); // Add a CSS class to highlight missing fields
        } else {
            input.classList.remove('is-invalid'); // Remove the CSS class if the field is filled
        }
    });

    const errorMessage = document.getElementById('error-message');

    if (!allFieldsFilled) {
        errorMessage.textContent = `Please fill in the following fields: ${missingFields.join(', ')}`;
        errorMessage.style.display = 'block';
    } else {
        errorMessage.textContent = '';
        errorMessage.style.display = 'none';
    }

    // Enable or disable the "Next" button based on whether all required fields are filled
    const nextButton = document.getElementById('nextButton');
    if (allFieldsFilled) {
        nextButton.removeAttribute('disabled');
    } else {
        nextButton.setAttribute('disabled', 'true');
    }

    return allFieldsFilled; // Return true if all fields are filled, false otherwise
}

// Select the "Next" button
const nextButton = document.getElementById('nextButton');

// Add a click event listener to the "Next" button
nextButton.addEventListener("click", () => {
    // Validate the form fields
    const isValid = validateForm();

    if (isValid) {
        // Get the value of the current step
        const currentStep = parseInt(nextButton.getAttribute("step_number"));

        // Get the value of the next step
        const nextStep = currentStep + 1;

        // Call the function to navigate to the next form step
        navigateToFormStep(nextStep);

        console.log(nextStep);
    }
});
