var body = document.getElementsByClassName('index')[0];
var header = document.getElementsByClassName('site-header')[0];

/*******************  Header ******************************/
if (header) {

    //Get menu button
    var menuBtn = document.getElementsByClassName('menu-btn');

    const showMenu = (event) => {
        var ul = event.target.nextElementSibling;

        if ((ul.style.display === "none") || (ul.style.display === "")) {
            ul.style.display = "block";
        } else {
            ul.style.display = "none";
        }
    };

    const hideMenu = (event) => {
        var ul = event.target.nextElementSibling;
        ul.style.display = "none";
    };

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
            var reset = setInterval(function () {
                element.scrollLeft -= step;
                if (element.scrollLeft <= 0) {
                    window.clearInterval(reset);
                }
            }, 10);
        } else {
            var sideScroll = setInterval(function () {
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
    /******************** Passenger control button *********************/
    // Get passenger input filed
    var passengerField = document.getElementsByClassName('passenger-num')[0];
    var passengerLabel = document.getElementsByClassName('passenger-info')[0];
    var confirmBtn = document.getElementsByClassName('confirm-button')[0];

    const showPassenger = (event) => {
        var menu = event.target.nextElementSibling;

        if ((menu.style.display === "none") || (menu.style.display === "")) {
            menu.style.display = "block";
        } else {
            menu.style.display = "none";
        }
    };

    const hidePassenger = (event) => {
        var menu = event.target.parentNode;

        if ((menu.style.display === "none") || (menu.style.display === "")) {
            menu.style.display = "block";
        } else {
            menu.style.display = "none";
        }
    }

    confirmBtn.addEventListener("click", hidePassenger);
    passengerField.addEventListener("click", showPassenger);

    var adultIncr = document.getElementsByClassName('increase-adult')[0];
    var adultDecr = document.getElementsByClassName('decrease-adult')[0];

    var childIncr = document.getElementsByClassName('increase-child')[0];
    var childDecr = document.getElementsByClassName('decrease-child')[0];

    var adultCount = 0;
    var childCount = 0;

    const increaseAdult = (event) => {
        adultCount++;
        var currDom = event.target.parentNode;
        var myLabel = currDom.getElementsByClassName('pass-label')[0];
        var myValue = currDom.getElementsByClassName('quantity-selector__input')[0];
        myLabel.innerText = adultCount + " Adults";
        myValue.setAttribute('value', adultCount);

        // Update passenger number
        passengerLabel.style.display = "none";
        passengerField.setAttribute("value", (childCount + adultCount + " Passengers"));
    }

    const decreaseAdult = (event) => {
        if (adultCount === 1) {
            adultCount--;
            var currDom = event.target.parentNode;
            var myLabel = currDom.getElementsByClassName('pass-label')[0];
            var myValue = currDom.getElementsByClassName('quantity-selector__input')[0];
            myLabel.innerText = adultCount + " Adults";
            myValue.setAttribute('value', adultCount);

            if (childCount === 0) {
                passengerLabel.style.display = "block";
                passengerField.setAttribute("value", "");
            } else {
                // Update passenger number
                passengerLabel.style.display = "none";
                passengerField.setAttribute("value", (childCount + adultCount + " Passengers"));
            }
        } else if (adultCount === 0) {
            event.preventDefault();
        } else {
            adultCount--;
            var currDom = event.target.parentNode;
            var myLabel = currDom.getElementsByClassName('pass-label')[0];
            var myValue = currDom.getElementsByClassName('quantity-selector__input')[0];
            myLabel.innerText = adultCount + " Adults";
            myValue.setAttribute('value', adultCount);

            // Update passenger number
            passengerLabel.style.display = "none";
            passengerField.setAttribute("value", (childCount + adultCount + " Passengers"));

        }
    }

    const increaseChild = (event) => {
        childCount++;
        var currDom = event.target.parentNode;
        var myLabel = currDom.getElementsByClassName('pass-label')[0];
        var myValue = currDom.getElementsByClassName('quantity-selector__input')[0];
        myLabel.innerText = childCount + " Children";
        myValue.setAttribute('value', childCount);

        // Update passenger number
        passengerLabel.style.display = "none";
        passengerField.setAttribute("value", (childCount + adultCount + " Passengers"));
    }

    const decreaseChild = (event) => {
        if (childCount === 1) {
            childCount--;
            var currDom = event.target.parentNode;
            var myLabel = currDom.getElementsByClassName('pass-label')[0];
            var myValue = currDom.getElementsByClassName('quantity-selector__input')[0];
            myLabel.innerText = childCount + " Children";
            myValue.setAttribute('value', childCount);

            if (adultCount === 0) {
                passengerLabel.style.display = "block";
                passengerField.setAttribute("value", "");
            } else {
                // Update passenger number
                passengerLabel.style.display = "none";
                passengerField.setAttribute("value", (childCount + adultCount + " Passengers"));
            }
        } else if (childCount === 0) {
            event.preventDefault();
        } else {
            childCount--;
            var currDom = event.target.parentNode;
            var myLabel = currDom.getElementsByClassName('pass-label')[0];
            var myValue = currDom.getElementsByClassName('quantity-selector__input')[0];
            myLabel.innerText = childCount + " Children";
            myValue.setAttribute('value', childCount);

            // Update passenger number
            passengerLabel.style.display = "none";
            passengerField.setAttribute("value", (childCount + adultCount + " Passengers"));
        }
    }

    adultIncr.addEventListener("click", increaseAdult);
    adultDecr.addEventListener("click", decreaseAdult);
    childIncr.addEventListener("click", increaseChild);
    childDecr.addEventListener("click", decreaseChild);

}


/************************************** show input instruction ****************************/
//show input instruction
// *Author:Haotian Zhang
function showInstruction(formId) {

    var regBody = document.getElementById(formId);
    if (regBody) {
        // Get all fields 
        [].forEach.call(regBody, function (element) {
            // console.log(element);
            element.addEventListener('focus', displayMsg);
            element.addEventListener('blur', blurMsg);
            if (element.type === 'submit' || element.type === 'reset') {
                element.removeEventListener('focus', displayMsg);
                element.removeEventListener('blur', blurMsg);
            }
        });
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
    var description = parentN.getElementsByClassName('descMsgs')[0];
    if (description) {
        description.style.display = "block";
    }

}

function blurMsg(e) {
    var parentN = e.target.parentNode;
    var description = parentN.getElementsByClassName('descMsgs')[0];
    if (description) {
        description.style.display = "none";
    }

}


// *************************************************
// *
// *Author:Haotian Zhang
// *Date: Feb 08 2019
// *Purpose: generic function to check the inputs of one form. Show errorMsg is no input.
// *How to use: inside the form, there should be a div named "form-box" wrap each input and its "errorMsgs" inside it. 
// *            the name of the form submit btn should be "btn"
// *
// *************************************************
function checkInputEmptyAndPasswordMatch(submitBtnId) {
    var submit = document.getElementById(submitBtnId);
    submit.addEventListener('click', function (e) {
        if (document.getElementById('password')) {
            var password = document.getElementById('password');
            var rePassword = document.getElementById('rePassword');
            if (password.value != rePassword.value) {
                e.preventDefault();
                alert("password doesn't match");
                return;
            }
        }
        var proceed = confirm("Are you sure to Submit?");
        var error = 0;
        if (!proceed) {
            e.preventDefault();
            console.log("prevent runned");

        } else {
            // Get all error messages
            var inputBoxes = document.getElementsByClassName("form-box");
            //inputBoxes is not an array, it is a nodelist
            [].forEach.call(inputBoxes, function (inputBox) {
                errorMsg = inputBox.getElementsByClassName("errorMsgs")[0];
                //if there is no errorMsg defined, no need to check input
                if (errorMsg) {
                    if (inputBox.getElementsByTagName("input")[0]) {
                        //show errorMsg if no value inputted
                        if (!inputBox.getElementsByTagName("input")[0].value) {
                            errorMsg.style.display = 'block';
                            error = 1;
                        } else {
                            //if user re-inputted value after seen the errorMsg, clear the errorMsg
                            errorMsg.style.display = 'none';
                        }
                    };
                }
            })
            if (error) {
                e.preventDefault();
            }
        }

    });

}

