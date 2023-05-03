// PUT INTO A MODULE
const openModalBtn = document.querySelector("#todo-submit");
const modalContainer = document.querySelector(".todo-form-container");
const closeModal = () => {
  modalContainer.style.display = "none";
  document.body.classList.remove("modal-open");
};
const showModal = () => {
  modalContainer.style.display = "block";
  document.body.classList.add("modal-open");
};

openModalBtn.addEventListener("click", showModal);

modalContainer.addEventListener("click", (e) => {
  if (e.target === modalContainer) {
    closeModal();
  }
});

const myForm = document.getElementById("todo-form");

myForm.addEventListener("submit", (e) => {
  e.preventDefault();
  // handle form submission here
  closeModal();
});
