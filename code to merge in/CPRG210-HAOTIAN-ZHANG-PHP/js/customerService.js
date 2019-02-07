var cs = document.getElementById("customerService");
if(!localStorage.csPositionBottom){
    localStorage.csPositionBottom=0;
    localStorage.csPositionRight=0;
}
cs.style.bottom = localStorage.csPositionBottom+"px";
cs.style.right = localStorage.csPositionRight+"px";
var goUp;
var goLeft;
// parse string to boolean
if(!localStorage.csGoUp||localStorage.csGoUp=="true"){
    goUp=true;
}
else{
    goUp=false;
}

if(!localStorage.csGoLeft||localStorage.csGoLeft=="true"){
    goLeft=true;
}
else{
    goLeft=false;
}

//Customer need to click the contact button so stop moving when mouseover
cs.addEventListener("mouseover", function () {
    clearInterval(csTimer);
});
cs.addEventListener("mouseout", function () {
    csTimer = setInterval(moveCS, 10);
})


var csTimer = setInterval(moveCS, 10);


//save current position before window close as String
window.onbeforeunload = function () {
    localStorage.setItem("csPositionBottom", parseInt(cs.style.bottom));
    localStorage.setItem("csPositionRight", parseInt(cs.style.right));
    localStorage.setItem("csGoUp", goUp);
    localStorage.setItem("csGoLeft", goLeft);
}


function moveCS() {
    if (parseInt(cs.style.right) <= 0) {
        goLeft = true;
    }
    if (parseInt(cs.style.right) >= document.body.offsetWidth - cs.offsetWidth) {
        goLeft = false;
    }
    // console.log("trigged"+cs.style.top+" "+cs.offsetHeight);
    if (parseInt(cs.style.bottom) >= document.body.offsetHeight - cs.offsetHeight) {
        // console.log("trigged"+cs.style.top+" "+cs.offsetHeight);
        goUp = false;
    }
    if (parseInt(cs.style.bottom) <= 0) {
        goUp = true;
    }

    if (goUp) {
        cs.style.bottom = parseInt(cs.style.bottom) + 1 + "px";
    }
    else {
        cs.style.bottom = parseInt(cs.style.bottom) - 1 + "px";
    }
    if (goLeft) {
        // console.log(goLeft);
        cs.style.right = parseInt(cs.style.right) + 1 + "px";
    } else {
        cs.style.right = parseInt(cs.style.right) - 1 + "px";
    }
}