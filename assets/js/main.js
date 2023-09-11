
document.addEventListener('DOMContentLoaded', function() {
  "use strict";

  // for show/hide password
  const pwd = document.querySelector("#password"),
    eye = document.querySelector("#eye");

  eye.onclick = () => {
    if (pwd.type == "password") {
      eye.classList.replace("fa-eye-slash", "fa-eye");
      pwd.type = "text";
    } else {
      eye.classList.replace("fa-eye", "fa-eye-slash");
      pwd.type = "password";
    }
  };

  //  add more js codes here if needed:
  //  Your code here....

  


})
