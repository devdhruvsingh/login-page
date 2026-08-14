document.addEventListener('DOMContentLoaded', () => {
    const passwordInput = document.getElementById('passwordInput');
    const togglePassword = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');
    const eyeOffIcon = document.getElementById('eyeOffIcon');

    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', () => {
            const isPassword = passwordInput.getAttribute('type') === 'password';
            
            // Toggle input type
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');

            // Swap icon display
            eyeIcon.style.display = isPassword ? 'none' : 'inline';
            eyeOffIcon.style.display = isPassword ? 'inline' : 'none';
        });
    }
});