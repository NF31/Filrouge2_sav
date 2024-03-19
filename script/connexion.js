const logLink = document.querySelector(".form .login-form .register a");
const regLink = document.querySelector(".form .register-form .register a");
const form = document.querySelector(".form .form-box");
const logForm = document.querySelector(".form .login-form");
const regForm = document.querySelector(".form .register-form");
logLink.addEventListener("click", function(event) {
form.classList.toggle('turned')
logForm.classList.toggle('hidden');
regForm.classList.toggle('hidden');

 
  event.preventDefault();
});

regLink.addEventListener("click", function(event) {

  form.classList.toggle('turned')
  regForm.classList.toggle('hidden');
  logForm.classList.toggle('hidden');  

  
  event.preventDefault();
});