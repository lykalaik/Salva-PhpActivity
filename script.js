function validateForm(event) {
    event.preventDefault();
    try {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (email.trim() === "") {
            throw { name: "Empty Error", message: "Please enter an email" };
        }

        if (password.trim() === "") {
            throw { name: "Empty Error", message: "Please enter a password" };
        }

        if (password.length < 5 || password.length > 8) {
            throw { name: "Length Error", message: "Password must be between 5 and 8 characters long" };
        }

        // If everything is correct, you can proceed with form submission or other actions
        // Here, let's send the data to a PHP script for database interaction
        sendDataToServer(email, password);
    } catch (error) {
        console.log(error);
        alert(error.message);
    }
}

function sendDataToServer(email, password) {
    // Create a new XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    // Configure it: POST-request for the URL save_data.php
    xhr.open('POST', 'save_data.php', true);

    // Set up the headers for the request
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Send the request and pass data
    xhr.send('email=' + email + '&password=' + password);

    // Setup what to do when the response is ready
    xhr.onload = function () {
        if (xhr.status === 200) {
            // If everything went fine, you can handle the response here
            alert(xhr.responseText);
        } else {
            // In case of error, handle it accordingly
            alert('Error occurred: ' + xhr.statusText);
        }
    };
}

document.getElementById('loginForm').addEventListener('submit', validateForm);
