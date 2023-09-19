// Define a variable to keep track of the current step
let currentStep = 1;

/**
 * Define a function to navigate between form steps.
 * It accepts one parameter: the step number.
 */
const navigateToFormStep = (stepNumber) => {
    if (stepNumber < currentStep) {
        // If navigating to the previous step, simply perform the navigation without validation
        performNavigation(stepNumber);
    } else {
        // Get all the input fields in the current step
        const currentStepInputs = document.querySelectorAll(`#step-${currentStep} input, #step-${currentStep} select`);
        let isValid = true;

        // Check if any input field is empty
        currentStepInputs.forEach((input) => {
            if (!input.value.trim()) {
                isValid = false;
            }
        });

        // If there are empty fields, prevent navigation to the next step
        if (!isValid) {
            alert("Please complete all the fields before proceeding to the next step.");
            return;
        }

        // Perform the navigation
        performNavigation(stepNumber);
    }
};

/**
 * Function to perform the actual navigation.
 */
const performNavigation = (stepNumber) => {
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

    // Update the current step
    currentStep = stepNumber;
};

/**
 * Select all form navigation buttons, and loop through them.
 */
document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
    /**
     * Add a click event listener to the button.
     */
    formNavigationBtn.addEventListener("click", () => {
        /**
         * Get the value of the step.
         */
        const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
        /**
         * Call the function to navigate to the target form step.
         */
        navigateToFormStep(stepNumber);
    });
});

// Get all the buttons with the class "scrollButton"
const scrollButtons = document.querySelectorAll(".btn-navigate-form-step");

// Add a click event listener to each button
scrollButtons.forEach((button) => {
    button.addEventListener("click", function () {
        // Scroll to the top of the page (body element)
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
    });
});

