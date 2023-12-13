function togglePasswordVisibility() {
    var passwordInput = document.getElementById('passwordInput');
    var eyeToggle = document.getElementById('eyeToggle');

    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      eyeToggle.src = 'img/eye-icon.png';
    } else {
      passwordInput.type = 'password';
      eyeToggle.src ="img/close-eye.png";
    }
}