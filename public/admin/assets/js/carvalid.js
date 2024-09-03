// public/js/validate.js

document.addEventListener('DOMContentLoaded', function () {


    // /////////////////////category////////////////
    const catform = document.getElementById('catForm');
    const catnameInput = document.getElementById('idcatname');
    const descriptionInput = document.getElementById('catdescription');
    const imageInput = document.getElementById('catimage');

    const catNameError = document.getElementById('catnamerr');
    const descrError = document.getElementById('catdescrerr');
    const imgpathError = document.getElementById('imagepatherr');

    console.log(catform)

    catform.addEventListener('submit', function (event) {
        let isValidd = true;

        // Clear previous errors
        catNameError.textContent = '';
        descrError.textContent = '';
        imgpathError.textContent = '';
        // Name validation
        if (catnameInput.value.trim() === '') {
            catNameError.textContent = 'Category Name is required.';
            catnameInput.classList.add('ivalid1')
            isValidd = false;

        }
        // description validation
        if (descriptionInput.value.trim() === '') {
            descrError.textContent = 'Description  is required.';
            descriptionInput.classList.add('ivalid1')
            isValidd = false;
        }

        if (imageInput.files.length === 0) {
            imgpathError.textContent = 'Image is required.';
            imageInput.classList.add('ivalid1');
            isValidd = false;
        } else {
            const file = imageInput.files[0];
            const allowedExtensions = ['image/jpeg', 'image/png', 'image/gif'];
            const maxSize = 2 * 1024 * 1024; // 2MB

            if (!allowedExtensions.includes(file.type)) {
                imgpathError.textContent = 'Only JPEG, PNG, and GIF files are allowed.';
                imageInput.classList.add('ivalid1');
                isValidd = false;
            } else if (file.size > maxSize) {
                imgpathError.textContent = 'Image size must be less than 2MB.';
                imageInput.classList.add('ivalid1');
                isValidd = false;
            }


        }

        if (!isValidd) {
            event.preventDefault();
        }
    });


});

