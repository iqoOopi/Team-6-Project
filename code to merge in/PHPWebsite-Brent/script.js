//Sticky Navigation bar
window.onscroll = function () { myFunction() };
var topNav = document.getElementById("topNav");
var sticky = topNav.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    topNav.classList.add("sticky")
  } else {
    topNav.classList.remove("sticky");
  }
}

//Photo Album widget -- only runs on index body
if (document.getElementById("indexBody")) {
  var photoAlbum = document.getElementsByTagName('section')[0];
  var table = document.createElement('table');

  //Album Arrays
  var descs = [
    "If you enjoy sunbathing along the coasts of the most beautiful beaches in the world, you will love our packages!",
    "Vist south America for some of the most amazing, lush forests. Side benefit of awesome ziplines!",
    "Looking for a romantic getaway? Spain will give you and your siginificant other memories to cherish forver.",
    "Italy, the home of the Roman colliseum, and the city of Venice, is a beautiful place to take the entire family!"];
  var images = [
    "Images/Travel1.jpg",
    "Images/Travel2.jpg",
    "Images/Travel3.jpg",
    "Images/Travel4.jpg"];
  var links = [
    "https://www.tripadvisor.ca/TravelersChoice-Beaches-cTop-g1",
    "https://www.visitcostarica.com/en",
    "https://www.spain.info/en/",
    "https://www.rome.net/"];


  //add links inside the for loop images[i].addEventListener



  //Adds image and matching desc to a tablerow, then adds the row to the table
  for (let i = 0; i < images.length; i++) {
    var row = document.createElement('tr');
    var col1 = document.createElement('td');
    var col2 = document.createElement('td');
    var image = document.createElement('img');

    image.src = images[i];
    col1.appendChild(image);

    //adds link to the image

    col1.addEventListener("click", function (event) {
      var newWindow = window.open(links[i]);
      function windowClose() {
        newWindow.close();
      }
      setTimeout(windowClose, 5000);
    });



    //adds data to table
    row.appendChild(col1);
    col2.innerHTML = descs[i];
    row.appendChild(col2);
    table.appendChild(row);
  }
  console.log(table);
  photoAlbum.appendChild(table);
}


//only runs if it has a form body
if (document.getElementById("registerBody") || document.getElementById("contactBody")) {


  //Submit Button Confirmation
  var submitButton = document.getElementById("submitButton");
  var myForm = document.myForm;
  submitButton.addEventListener("click", function (event) {
    var choice = confirm("Are you sure you want to submit the form?");
    if (choice != true) {
     document.myForm.submit();
    }
  });

  //Reset Button Confirmation
  var resetButton = document.getElementById("resetButton");
  resetButton.addEventListener("click", function (event) {
    event.preventDefault();
    var choice = confirm("Are you sure you want to reset the form?");
    if (choice != true) {
      document.myForm.reset();
    }
  });
}
 
//tool tip for register page
if (document.getElementById("registerBody")) {

  //tool tip variables
  var myForm = document.myForm;
  var email = document.myForm.email;
  var firstName = document.myForm.firstName;
  var lastName = document.myForm.lastName;
  var password = document.myForm.password;
  var address = document.myForm.address;
  var postalCode = document.myForm.postalCode;
  var cardNumber = document.myForm.cardNumber;

  //tooltip listeners- has a focus and blur event listener
  //email tooltip
  email.addEventListener("focus", function (event) {
    document.getElementById("emailTT").style.visibility = "visible";
  })
  email.addEventListener("blur", function (event) {
    document.getElementById("emailTT").style.visibility = "hidden";
  })
  //first name tooltip
  firstName.addEventListener("focus", function (event) {
    document.getElementById("firstNameTT").style.visibility = "visible";
  })
  firstName.addEventListener("blur", function (event) {
    document.getElementById("firstNameTT").style.visibility = "hidden";
  })
  //lastname tooltip
  lastName.addEventListener("focus", function (event) {
    document.getElementById("lastNameTT").style.visibility = "visible";
  })
  lastName.addEventListener("blur", function (event) {
    document.getElementById("lastNameTT").style.visibility = "hidden";
  })
  //password tooltip
  password.addEventListener("focus", function (event) {
    document.getElementById("passwordTT").style.visibility = "visible";
  })
  password.addEventListener("blur", function (event) {
    document.getElementById("passwordTT").style.visibility = "hidden";
  })
  //address tooltip
  address.addEventListener("focus", function (event) {
    document.getElementById("addressTT").style.visibility = "visible";
  })
  address.addEventListener("blur", function (event) {
    document.getElementById("addressTT").style.visibility = "hidden";
  })
  //postal code tooltip
  postalCode.addEventListener("focus", function (event) {
    document.getElementById("postalCodeTT").style.visibility = "visible";
  })
  postalCode.addEventListener("blur", function (event) {
    document.getElementById("postalCodeTT").style.visibility = "hidden";
  })
  //card number tooltip
  cardNumber.addEventListener("focus", function (event) {
    document.getElementById("cardNumberTT").style.visibility = "visible";
  })
  cardNumber.addEventListener("blur", function (event) {
    document.getElementById("cardNumberTT").style.visibility = "hidden";
  })
}

//check for empty fields on register page
if (document.getElementById("registerBody")) {
  var myForm = document.myForm;

  //empty field variables
  var errorEmail = document.getElementById("errorEmail");
  var errorFN = document.getElementById("errorFirstName");
  var errorLN = document.getElementById("errorLastName");
  var errorPW = document.getElementById("errorPassword");
  var errorAdd = document.getElementById("errorAddress");
  var errorCity = document.getElementById("errorCity");
  var errorPC = document.getElementById("errorPostalCode");
  var errorCN = document.getElementById("errorCardNumber");

  var submitButton = document.getElementById("submitButton");

  submitButton.addEventListener("click", function (event) {
    var regEx = /^[A-Z]\d[A-Z] ?\d[A-Z]\d$/;

    //hiding all displays
    errorEmail.style.display = "none";
    errorFN.style.display = "none";
    errorLN.style.display = "none";
    errorPW.style.display = "none";
    errorAdd.style.display = "none";
    errorCity.style.display = "none";
    errorPC.style.display = "none";
    errorCN.style.display = "none";

    //collecting values
    var email = document.myForm.email.value;
    var firstName = document.myForm.firstName.value;
    var lastName = document.myForm.lastName.value;
    var password = document.myForm.password.value;
    var address = document.myForm.address.value;
    var city = document.myForm.city.value;
    var postalCode = document.myForm.postalCode.value;
    var cardNumber = document.myForm.cardNumber.value;

    //Pops up with message
    if (!email) {
      event.preventDefault();
      errorEmail.style.display = "block";
      console.log("missing email");
    }
    if (!firstName) {
      event.preventDefault();
      errorFN.style.display = "block";
      console.log("missing firstname");
    }
    if (!lastName) {
      event.preventDefault();
      errorLN.style.display = "block";
      console.log("missing lastname");
    }
    if (!password) {
      event.preventDefault();
      errorPW.style.display = "block";
      console.log("missing password");
    }
    if (!address) {
      event.preventDefault();
      errorAdd.style.display = "block";
      console.log("missing address");
    }
    if (!city) {
      event.preventDefault();
      errorCity.style.display = "block";
      console.log("missing city");
    }
    if (!regEx.test(postalCode)) {
      event.preventDefault();
      errorPC.style.display = "block";
      console.log("missing postalcode");
    }
    if (!cardNumber) {
      event.preventDefault();
      errorCN.style.display = "block";
      console.log("missing card number");
    }
  })
}