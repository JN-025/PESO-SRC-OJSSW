const navigateToFormStep = (stepNumber) => {

  document.querySelectorAll(".form-step").forEach((formStepElement) => {
    formStepElement.classList.add("d-none");
  });

  document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
    formStepHeader.classList.add("form-stepper-unfinished");
    formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
  });

  document.querySelector("#step-" + stepNumber).classList.remove("d-none");
  const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');

  formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
  formStepCircle.classList.add("form-stepper-active");

  for (let index = 0; index < stepNumber; index++) {
    const formStepCircle = document.querySelector('li[step="' + index + '"]');
    
    if (formStepCircle) {
      formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
      formStepCircle.classList.add("form-stepper-completed");
    }
  }
};


const checkValidity = () => {
  const currentStepFields = document.querySelectorAll(".form-step:not(.d-none) [required]");
  for (const field of currentStepFields) {
    if (!field.checkValidity()) {
      field.reportValidity();
      field.focus();
      return false;
    }
  }
  return true;
};
document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
  formNavigationBtn.addEventListener("click", () => {
    const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));

    if (checkValidity()) {
      navigateToFormStep(stepNumber);
    }
  });
});

const scrollButtons = document.querySelectorAll(".btn-navigate-form-step");

scrollButtons.forEach((button) => {
  button.addEventListener("click", function () {
    const invalidField = document.querySelector(".form-step:not(.d-none) [required]:invalid");

    if (invalidField) {
      invalidField.scrollIntoView({ behavior: "smooth", block: "center", inline: "nearest" });
    } else {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  });
});
