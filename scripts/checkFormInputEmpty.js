
// *************************************************
// *
// *Author:Haotian Zhang
// *Date: Feb 08 2019
// *Purpose: the view of order form
// *
// *************************************************

var button = document.getElementById("btn");
button.addEventListener('click', validate);


function validate(e) {
    var proceed = confirm("Are you sure?");

    if (!proceed) {
        console.log("User cancelled");
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
                        e.preventDefault();
                        errorMsg.style.display = 'block';
                    } else {
                        //if user re-inputted value after seen the errorMsg, clear the errorMsg
                        errorMsg.style.display = 'none';
                    }
                };
            }
        })
    }
}