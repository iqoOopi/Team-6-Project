var body = document.getElementsByClassName('index')[0];
var header = document.getElementsByClassName('site-header')[0];

/*******************  Header ******************************/
if(header) {

    //Get menu button
    var menuBtn = document.getElementsByClassName('menu-btn');

    const showMenu = (event) => {
            var ul = event.target.nextElementSibling;

            if ((ul.style.display === "none")||(ul.style.display === "")) {
                    ul.style.display = "block";
            } else { 
                    ul.style.display = "none";
            }
    };

    const hideMenu = (event) => {
            var ul = event.target.nextElementSibling;
            ul.style.display = "none";
    }
     
    for (var i = 0; i < menuBtn.length; i++) {
            menuBtn[i].addEventListener("click", showMenu);
            menuBtn[i].addEventListener("blur", hideMenu);
    }

    //Get anchor tags 
    var link = document.querySelectorAll('.drop-down-menu a');

    const gotoLink = (event) => {
            var addr = event.target.href;
            window.location = addr;

    };

    for (var i = 0; i < link.length; i++) {
            // Because blur event fires before click event, mousedown is used in here
            link[i].addEventListener("mousedown", gotoLink);
    }
}


/***********************INDEX.HTML****************************************/
/*************************  Carousel  ************************/ 
if (body) {
    var slideIndex = 0;      
    showSlide();

    function showSlide() {
        var allSlides = document.getElementsByClassName('slide');
        var thumbnails = document.getElementsByClassName('thumbnail');

        // Reset all slides
        for (var i = 0; i < allSlides.length; i++) {
            allSlides[i].style.display = "none";
            thumbnails[i].style.opacity = "0.6";
        }

        allSlides[slideIndex].style.display = "block";
        thumbnails[slideIndex].style.opacity = "1";
        slideIndex++;
        
        // Reset slide index
        if (slideIndex === allSlides.length) {
            slideIndex = 0;
        }

        setTimeout(showSlide, 8000);

    }

/********************** Image Gallery Button ***********************/
    var leftBtn = document.getElementsByClassName('scroll-left')[0];
    var rightBtn = document.getElementsByClassName('scroll-right')[0];

    var scrollRight = (event) => {
        var imgGallery = document.getElementsByClassName('img-gallery')[0]; 
        scroll('right', imgGallery, 280, 20, 30);
    }

    var scrollLeft = (event) => {
        var imgGallery = document.getElementsByClassName('img-gallery')[0];
        scroll('left', imgGallery, 280, 20, 30);
    }

    rightBtn.addEventListener("click", scrollRight);
    leftBtn.addEventListener("click", scrollLeft);

    function scroll(direction, element, distance, step, speed) {
        var scrollAmount = 0;
        if (element.offsetWidth + element.scrollLeft >= element.scrollWidth) {
            var reset = setInterval(function() {
                element.scrollLeft -= step;
                if (element.scrollLeft <= 0) {
                    window.clearInterval(reset);
                }
            }, 10);
        } else {
            var sideScroll = setInterval(function() {
                scrollAmount += step;
                if (direction === 'right') {
                    element.scrollLeft += step;
                } else {
                    element.scrollLeft -= step;
                }

                if (scrollAmount >= distance) {
                    window.clearInterval(sideScroll);
                }
            }, speed);
        }
    }
}

/************************************** Register.html ****************************/
var regBody = document.getElementsByClassName('register')[0];

if (regBody) {

    // Get all input text fields
    var fNameField = document.registerForm.firstName;
    var lNameField = document.registerForm.lastName;
    var bdayField = document.registerForm.bday;
    var addrField = document.registerForm.address;
    var cityField = document.registerForm.city;
    var postalField = document.registerForm.post;
    var telField = document.registerForm.tel_num;
    var emailField = document.registerForm.email_info;
    
    var fieldArray = [fNameField, lNameField, bdayField, addrField, cityField, postalField, telField, emailField];

    // Apply focus and blur events to field descriptions

    addrField.addEventListener('focus', displayMsg);
    addrField.addEventListener('blur', blurMsg); 

    postalField.addEventListener('focus', displayMsg);
    postalField.addEventListener('blur', blurMsg); 

    telField.addEventListener('focus', displayMsg);
    telField.addEventListener('blur', blurMsg); 

    emailField.addEventListener('focus', displayMsg);
    emailField.addEventListener('blur', blurMsg); 

}
/****************************** Agent.html ********************************/

var agtBody = document.getElementsByClassName('agent')[0];

if (agtBody) {

    // Get all input text fields
    var fNameField = document.agentForm.AgtFirstName;
    var lNameField = document.agentForm.AgtLastName;
    var posField = document.agentForm.AgtPosition;
    var telField = document.agentForm.AgtBusPhone;
    var emailField = document.agentForm.AgtEmail;
    
    var fieldArray = [fNameField, lNameField, posField, telField, emailField];

    // Apply focus and blur events to field descriptions
    //could use one function
    telField.addEventListener('focus', displayMsg);
    telField.addEventListener('blur', blurMsg); 

    emailField.addEventListener('focus', displayMsg);
    emailField.addEventListener('blur', blurMsg); 
     
    var notification = document.getElementsByClassName('insert_notification')[0];
    var notification_div = document.getElementsByClassName('notification')[0];
        
    if (notification) {
        notification_div.appendChild(notification);
    }
}

/******************** login.php *************************/
var loginBody = document.getElementsByClassName('login')[0];

if (loginBody) {
    var loginBox = document.getElementsByClassName('login-box')[0];
    var loginError = document.getElementsByClassName('login-error')[0];
    var refChild = loginBox.getElementsByTagName('input')[0];

    if (loginError) {
        loginBox.insertBefore(loginError, refChild);
    }
}

function displayMsg(e) {
    var parentN = e.target.parentNode;
    var description = parentN.getElementsByTagName('p')[0];
    description.style.display = "block";
}

function blurMsg(e) {
    var parentN = e.target.parentNode;
    var description = parentN.getElementsByTagName('p')[0];
    description.style.display = "none";
}


