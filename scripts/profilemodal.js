// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("edit");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function () {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


// // When the user clicks the "Save" button
// var saveBtn = document.getElementsByName("save")[0];
// saveBtn.onclick = function(event) {
//     // Prevent the default form submission
//     event.preventDefault();

//     // Check if there are any errors
//     var hasError = false;
//     var errorMessages = modal.querySelectorAll(".error");
//     errorMessages.forEach(function(errorMessage) {
//         if (errorMessage.textContent !== "") {
//             hasError = true;
//         }
//     });

//     // If there are errors, do not close the modal
//     if (hasError) {
//         return;
//     }

//     // If there are no errors, submit the form and close the modal
//     var form = modal.querySelector("form");
//     form.submit();
//     modal.style.display = "none";
// };