const images = [
    "../HOME/ImagesHome/image1.jpg",
    "../HOME/ImagesHome/image2.jpg",
    "../HOME/ImagesHome/image3.jpg",
    "../HOME/ImagesHome/image4.jpg",
    "../HOME/ImagesHome/image5.jpg",
    "../HOME/ImagesHome/image6.jpg",
    "../HOME/ImagesHome/image7.jpg",
     "../HOME/ImagesHome/image8.jpg",
      "../HOME/ImagesHome/image9.jpg",
     "../HOME/ImagesHome/image10.jpg",
      "../HOME/ImagesHome/image11.jpg",
       "../HOME/ImagesHome/image12.jpg",
        "../HOME/ImagesHome/image13.jpg",
         "../HOME/ImagesHome/image14.jpg",
           "../HOME/ImagesHome/image16.jpg"
];

let currentIndex = 0;
const slideshowImg = document.getElementById("slideshow-img");

function changeImage() {
    currentIndex = (currentIndex + 1) % images.length;
    slideshowImg.src = images[currentIndex];
}

setInterval(changeImage, 5000);

const modal = document.getElementById("modal");
const loginBtn = document.getElementById("login-btn");
const signupBtn = document.getElementById("signup-btn");
const closeBtn = document.getElementsByClassName("close-btn")[0];
const loginForm = document.getElementById("login-form");
const signupForm = document.getElementById("signup-form");

loginBtn.onclick = function () {
    modal.style.display = "block";
    loginForm.style.display = "block";
    signupForm.style.display = "none";
}

signupBtn.onclick = function () {
    modal.style.display = "block";
    signupForm.style.display = "block";
    loginForm.style.display = "none";
}

closeBtn.onclick = function () {
    modal.style.display = "none";


}


document.getElementById('show-signup-password').addEventListener('change', function() {
    const passwordField = document.getElementById('signup-password');
    const confirmPasswordField = document.getElementById('signup-confirm-password');
    if (this.checked) {
        passwordField.type = 'text';
        confirmPasswordField.type = 'text';
    } else {
        passwordField.type = 'password';
        confirmPasswordField.type = 'password';
    }
});

document.getElementById('show-login-password').addEventListener('change', function() {
    const loginPasswordField = document.getElementById('login-password');
    if (this.checked) {
        loginPasswordField.type = 'text';
    } else {
        loginPasswordField.type = 'password';
    }
});

document.getElementById('signupForm').addEventListener('submit', function(event) {
    const password = document.getElementById('signup-password').value;
    const confirmPassword = document.getElementById('signup-confirm-password').value;
    const errorMessage = document.getElementById('error-message');

    if (password.length < 12) {
        errorMessage.textContent = 'Password must be longer than 12 characters.';
        errorMessage.style.display = 'block';
        event.preventDefault(); // Prevent the form from submitting if the password is less 
    } else if (password !== confirmPassword) {
        errorMessage.textContent = 'Passwords do not match.';
        errorMessage.style.display = 'block';
        event.preventDefault(); // Prevent the form from submitting
    } else {
        errorMessage.style.display = 'none';
    }
});


window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function toggleMenu() {
    var navLinks = document.getElementById('nav-links');
    if (navLinks.style.display === 'flex') {
        navLinks.style.display = 'none';
    } else {
        navLinks.style.display = 'flex';
    }
}

document.getElementById('signupForm').addEventListener('submit', async (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const response = await fetch('register.php', {
        method: 'POST',
        body: formData
    });
    const result = await response.text();
    alert(result);
});

document.getElementById('login-form').addEventListener('submit', async (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    const response = await fetch('login.php', {
        method: 'POST',
        body: formData
    });
    const result = await response.text();
    alert(result);
    if (result === 'Login successful') {
        window.location.href = 'HOME.html';
    }
});

