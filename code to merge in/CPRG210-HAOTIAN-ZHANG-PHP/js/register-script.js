var myForm = document.registerForm;

//show insturction for customerName input
focusBlur(myForm, "customerName", "namePopupText");

//show instruction for address input
focusBlur(myForm, "customerAddress", "addressPopupText");

//show instruction for city input
focusBlur(myForm, "customerCity", "cityPopupText");

//Province
focusBlur(myForm, "customerProvince", "provincePopupText");

//Postal Code
focusBlur(myForm, "customerPostalCode", "postalCodePopupText");

//show/hide insturction for different input
function focusBlur(myForm, elementName, popupId) {
    var tempElementName = myForm[elementName];
    tempElementName.addEventListener("focus", function (event) {
        var popup = document.getElementById(popupId);
        popup.classList.toggle("show");
    });
    tempElementName.addEventListener("blur", function (event) {
        var popup = document.getElementById(popupId);
        popup.classList.toggle("show");
    });
}

//popup confirmation for Reset after click.
var formRest = document.getElementById("formRest");
formRest.addEventListener("click", function (event) {
    event.preventDefault();
    var answer = confirm("Are you sure to Reset the from");
    if (answer) {
        myForm.reset();
    }
})

//Popup reminder for hover reset button befroe click.
formRest.addEventListener("mouseover", function (event) {
    var popup = document.getElementById("resetPopupText");
    popup.classList.toggle("show");
    // console.log(popup);
})
formRest.addEventListener("mouseout", function (event) {
    var popup = document.getElementById("resetPopupText");
    popup.classList.toggle("show");
    // console.log(popup);
})


//validate the postal code and then ask confirmation for submit.
var formSubmit = document.getElementById("formSubmit");
formSubmit.addEventListener("click", function (event) {
    event.preventDefault();
    var regExPostalCode = /^[a-zA-Z]\d[a-zA-Z] ?\d[a-zA-Z]\d$/;
    if (regExPostalCode.test(myForm.customerPostalCode.value)) {
        var answer = confirm("Are you sure to Submit the form");
        if (answer) {
            myForm.submit();
        }
    }
    else {
        alert("Please input a correct Potal Cde in Format:T3K1H1");
    }
})