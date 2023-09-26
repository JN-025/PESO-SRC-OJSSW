document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  const steps = document.querySelectorAll(".form-step");
  const stepButtons = document.querySelectorAll(".btn-nav");

  let currentStep = 0;

  function showStep(stepIndex) {
    steps.forEach((step, index) => {
      if (index === stepIndex) {
        step.classList.remove("d-none");
      } else {
        step.classList.add("d-none");
      }
    });
  }

  function handleStepNavigation(e) {
    e.preventDefault();

    const targetStep = parseInt(e.target.getAttribute("step_number"));

    const currentStepFields = steps[currentStep].querySelectorAll("[required]");
    let hasInvalidField = false;

    for (const field of currentStepFields) {
      if (!field.checkValidity()) {
        field.reportValidity();
        if (!hasInvalidField) {
          field.focus();
          hasInvalidField = true;
        }
        break;
      }
    }

    if (!hasInvalidField) {
      currentStep = targetStep;
      showStep(currentStep);
      console.log(currentStep);
    }
  }

  stepButtons.forEach((button) => {
    button.addEventListener("click", handleStepNavigation);
  });
});
