// appoinment-form-validation
function validateForm() {
    const form = document.appoinment_form;
    const fn = form.name.value.trim();
    const email = form.email.value.trim();
    const phone = form.number.value.trim();
    const date = form.date.value.trim();
    const department = form.department.value.trim();
    const doctor = form.doctor.value.trim();

    // Check if all fields are filled
    if (!fn || !email || !phone || !date || !department || !doctor) {
        alert("Please fill out all fields.");
        return false;
    }

    // Validate name (alphabetical characters and spaces)
    const nameRegex = /^[a-zA-Z\s'-]+$/;
    if (!nameRegex.test(fn)) {
        alert("Please enter a valid name (letters, spaces, hyphens, and apostrophes only).");
        form.name.focus();
        return false;
    }

    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        form.email.focus();
        return false;
    }

    // Validate phone number (numbers only)
    const phoneRegex = /^[0-9]+$/;
    if (!phoneRegex.test(phone)) {
        alert("Please enter a valid phone number (digits only).");
        form.number.focus();
        return false;
    }

    // Validate date (simple check to see if not empty; consider more advanced validation if needed)
    if (!date) {
        alert("Please select an appointment date.");
        form.date.focus();
        return false;
    }

    // Validate department
    if (!department) {
        alert("Please select a department.");
        form.department.focus();
        return false;
    }

    // Validate doctor
    if (!doctor) {
        alert("Please select a doctor.");
        form.doctor.focus();
        return false;
    }

    // If all validations pass
    return true;
}


// contact-form-validation
function contact() {
    const form = document.appoinment_detail;

    // Retrieve and trim input values
    const name = form.name.value.trim();
    const email = form.email.value.trim();
    const subject = form.subject.value.trim();
    const number = form.number.value.trim();
    const message = form.message.value.trim();

    // Validate name
    const nameRegex = /^[a-zA-Z\s'-]+$/;
    if (name === "") {
        alert("Please enter your full name.");
        form.name.focus();
        return false;
    } else if (!nameRegex.test(name)) {
        alert("Please enter a valid name (letters, spaces, hyphens, and apostrophes only).");
        form.name.focus();
        return false;
    }

    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === "") {
        alert("Please enter your email address.");
        form.email.focus();
        return false;
    } else if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        form.email.focus();
        return false;
    }

    // Validate subject
    if (subject === "") {
        alert("Please enter a subject.");
        form.subject.focus();
        return false;
    } else if (!nameRegex.test(subject)) {
        alert("Please enter a valid subject (letters, spaces, hyphens, and apostrophes only).");
        form.subject.focus();
        return false;
    }

    // Validate phone number
    const phoneRegex = /^[0-9]+$/;
    if (number === "") {
        alert("Please enter your phone number.");
        form.number.focus();
        return false;
    } else if (!phoneRegex.test(number)) {
        alert("Please enter a valid phone number (digits only).");
        form.number.focus();
        return false;
    }

    // Validate message
    if (message === "") {
        alert("Please enter your message.");
        form.message.focus();
        return false;
    }

    // If all validations pass
    return true;
}


// Subscribe-form-validation
function subscribe() {
    const form = document.subscribe;

    // Retrieve and trim input values
    const email = form.Subscribe.value.trim();

    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email == "") {
        alert("Please enter your email address.");
        form.Subscribe.focus();
        return false;
    } else if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        form.Subscribe.focus();
        return false;
    }

    // If all validations pass
    return true;
}



// navbar underline-effect
var btnContainer = document.getElementById("navbar");
var btns = btnContainer.getElementsByClassName("nav-link");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener('click', function () {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace("active");
        this.className += "active";
    })
}


// navbar-2 underline-effect
var btnContainer1 = document.getElementsByClassName("nav");
var btns1 = document.querySelectorAll(".nav .nav-link");
for (var i = 0; i < btns1.length; i++) {
    btns1[i].addEventListener('click', function () {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace("active");
        this.className += "active";
    })
}




// start slidders

// doctors slidder
const initSlider = () => {
    const imageList = document.querySelector(".slider-wrapper .image-list");
    const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
    // Slide images according to the slide button clicks
    slideButtons.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id === "prev-slide" ? -300 : 300;
            const scrollAmount = imageList.clientWidth = direction;
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        })
    })
}
window.addEventListener("load", initSlider);


// pricing slider
const initSlider1 = () => {
    const imageList2 = document.querySelector(".slider-wrapper2 .image-list2");
    const slideButtons2 = document.querySelectorAll(".slider-wrapper2 .slide-button2");
    // Slide images according to the slide button clicks
    slideButtons2.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id === "prev-slide2" ? -385 : 385;
            const scrollAmount = imageList2.clientWidth = direction;
            imageList2.scrollBy({ left: scrollAmount, behavior: "smooth" });
        })
    })
}
window.addEventListener("load", initSlider1);


// blog-slidder
const initSlider3 = () => {
    const imageList3 = document.querySelector(".slider-wrapper3 .image-list3");
    const slideButtons3 = document.querySelectorAll(".slider-wrapper3 .slide-button3");
    // Slide images according to the slide button clicks
    slideButtons3.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id === "prev-slide3" ? -300 : 300;
            const scrollAmount = imageList3.clientWidth = direction;
            imageList3.scrollBy({ left: scrollAmount, behavior: "smooth" });
        })
    })
}
window.addEventListener("load", initSlider3);


// Gallery-slidder
const initSlider4 = () => {
    const imageList4 = document.querySelector(".slider-wrapper4 .image-list4");
    const slideButtons4 = document.querySelectorAll(".slider-wrapper4 .slide-button4");

    // Slide images according to the slide button clicks
    slideButtons4.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id === "prev-slide4" ? -390 : 390;
            const scrollAmount = imageList4.clientWidth = direction;
            imageList4.scrollBy({ left: scrollAmount, behavior: "smooth" });
        })
    })
}
window.addEventListener("load", initSlider4);
// end slidders



