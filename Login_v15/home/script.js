const imgs = document.getElementById("img");
const img = document.querySelectorAll("#img img");

let idx = 0;

function carrossel(){
    idx++;

    if (idx > img.length - 1){
        idx = 0;
    }

    imgs.style.transform = `translateX(${-idx * 800}px)`;


    
}

setInterval(carrossel, 1800);


var selectField = document.getElementById("selectField");
var list = document.getElementById("list");


selectField.onclick = function (){
    list.classList.toggle("hide");
}