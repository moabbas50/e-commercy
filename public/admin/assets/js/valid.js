// public/js/validate.js

document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('myForm');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const pasawordInput = document.getElementById('password');
    const pasawordInputC = document.getElementById('passwordConfirm');

    const pasawordError = document.getElementById('passwordError');
    const pasawordCError = document.getElementById('passwordCError');
    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');

    form.addEventListener('submit', function (event) {
        let isValid = true;

        const uppercasePattern = /[A-Z]/; // At least one uppercase letter
        const lowercasePattern = /[a-z]/; // At least one lowercase letter

        // Clear previous errors
        nameError.textContent = '';
        emailError.textContent = '';
        pasawordError.textContent = '';
        pasawordCError.textContent = '';

        // Name validation
        if (nameInput.value.trim() === '') {
            nameError.textContent = 'Name is required.';
            nameInput.classList.add('ivalid1')
            isValid = false;

        }

        // Email validation
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailInput.value.trim() === '') {
            emailError.textContent = 'Email is required.';
            emailInput.classList.add('ivalid1')
            isValid = false;
        } else if (!emailPattern.test(emailInput.value.trim())) {
            emailError.textContent = 'Invalid email format.';
            emailInput.classList.add('ivalid1')
            isValid = false;
        }

        // If the form is not valid, prevent submission
        if (!isValid) {
            event.preventDefault();
        }

        if (pasawordInput.value.trim() === '') {
            pasawordError.textContent = 'Password is required.';
            pasawordInput.classList.add('ivalid1')
            isValid = false;
        } else if (!uppercasePattern.test(pasawordInput.value.trim())) {
            nameError.textContent = 'Name must contain at least one uppercase letter.';
            pasawordInput.classList.add('ivalid1')
            isValid = false;
        } else if (!lowercasePattern.test(pasawordInput.value.trim())) {
            nameError.textContent = 'Name must contain at least one lowercase letter.';
            pasawordInput.classList.add('ivalid1')
            isValid = false;
        }

        if (pasawordInputC.value.trim() === '') {
            pasawordCError.textContent = 'Confirm Password is required.';
            pasawordInputC.classList.add('ivalid1')
            isValid = false;
        } else if (pasawordInputC.value.trim() != pasawordInput.value.trim()) {
            pasawordCError.textContent = 'Confirm Password does not Match Password ';
            pasawordInputC.classList.add('ivalid1')
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }

    });


});

