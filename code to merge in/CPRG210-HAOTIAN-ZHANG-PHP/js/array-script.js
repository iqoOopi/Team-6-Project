var imgArray = new Array();
imgArray[0] = "pic/grid-img/beijing.jpg";
imgArray[1] = "pic/grid-img/bnaff.jpeg";
imgArray[2] = "pic/grid-img/leshan.jpg";
imgArray[3] = "pic/grid-img/taishan.jpg";

var imgDescri = new Array();
imgDescri[0] = "num 1 image:Beijing";
imgDescri[1] = "num 2 image: Bnaff";
imgDescri[2] = "num 3 image:LeShan";
imgDescri[3] = "num 4 image:TaiShan";


var imgLink = new Array();
imgLink[0] = "https://en.wikipedia.org/wiki/Great_Wall_of_China";
imgLink[1] = "https://www.pc.gc.ca/en/pn-np/ab/banff/index";
imgLink[2] = "http://www.leshandafo.com/";
imgLink[3] = "https://whc.unesco.org/en/list/437";


var position = document.getElementById("main-banner");
console.log(position);
tbl = document.createElement("table");
tbl.style.tableLayout = "fixed";
tbl.style.width = '80%';
tbl.style.textAlign = "center";
tbl.style.marginLeft = "auto";
tbl.style.marginRight = "auto";
tbl.style.border="1px solid black";
tbl.style.borderCollapse="collapse";
tbl.setAttribute("id","picTable");

tr = tbl.insertRow();
th = document.createElement("th");
th.appendChild(document.createTextNode("Image"));
tr.appendChild(th);
th.style.border="1px solid black";
th.style.borderCollapse="collapse";
th = document.createElement("th");
th.appendChild(document.createTextNode("Description"));
tr.appendChild(th);
for (var i = 0; i <imgArray.length; i++) {

    var tr = tbl.insertRow();
    var td = tr.insertCell();
    td.style.border="1px solid black";
    td.style.borderCollapse="collapse";


    if (i < imgArray.length) {
        img = document.createElement("img");
        img.setAttribute("src", imgArray[i]);
        img.addEventListener("mouseover", showDescript);
        img.addEventListener("click", showWebsite);
        img.style.width = "200px";
        img.style.cursor = "pointer";
        td.appendChild(img);
    }
    if (i == 0) {
        var td = tr.insertCell();
        td.style.border="1px solid black";
        td.setAttribute('rowSpan', imgArray.length);
        td.appendChild(document.createTextNode("Click One Image For Description"));
        td.style.fontSize = "2em";
    }

}
position.appendChild(tbl);
function showDescript() {
    var currentImage = event.currentTarget;

    //get rows then get rowIndex which is ID
    var rowNumber = currentImage.parentNode.parentNode.rowIndex;
    console.log(currentImage.parentNode.parentNode);
    console.log(rowNumber);

    //get content from particular table positon
    tbl.rows[1].cells[1].innerHTML = imgDescri[rowNumber - 1];

}

function showWebsite() {
    var currentImage = event.currentTarget;

    //get rows then get rowIndex which is ID
    var rowNumber = currentImage.parentNode.parentNode.rowIndex;
    var myWindow = window.open(imgLink[rowNumber - 1]);
    setTimeout(function () {
        myWindow.close();
    }, 2000);
}


