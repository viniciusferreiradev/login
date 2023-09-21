

// campo password para mostrar e esconder senha 
const passwordInput = document.getElementById('passwordInput');
const showPassword = document.getElementById('showPassword');

showPassword.classList.add('bi-eye-slash');

showPassword.addEventListener('click', () => {
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    showPassword.classList.remove('bi-eye-slash');
    showPassword.classList.add('bi-eye');
  } else {
    passwordInput.type = 'password';
    showPassword.classList.remove('bi-eye');
    showPassword.classList.add('bi-eye-slash');
  }
});

function checkPasswords() {
  var password = document.getElementById("passwordInput").value;
  var confirmPassword = document.getElementById("confirmPasswordInput").value;

  if (password !== confirmPassword) {
      alert("As senhas não coincidem. Por favor, verifique.");
      return false; // Impede o envio do formulário
  }

  return true; // Permite o envio do formulário
}

