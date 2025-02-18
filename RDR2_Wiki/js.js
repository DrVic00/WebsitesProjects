function openPopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "block";
}

function closePopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "none";
}

function ShowDet() {
    var second = document.getElementById("second");
    second.style.display = "block";
}

var images = ['1.png', '2.png', '3.png', '4.png', '5.png']

var i = 0;
setInterval (function(){
  if (i === images.length) {
    i = 0;
  }
  document.getElementById("images").src = images[i];
  i++;
}, 2000);

var obrazek = document.getElementById("images");
obrazek.addEventListener("mouseover", Ramka);
obrazek.addEventListener("mouseout", Bez_Ramki);

function Ramka(){
    var ramka = document.getElementById("images");
    ramka.style.border = "5px solid black";
    ramka.style.width = "90%";
    ramka.style.height = "80%";
    ramka.style.borderRadius = "20px";
}


function Bez_Ramki(){
    var bezRamki = document.getElementById("images");
    bezRamki.style.border = "none";
    bezRamki.style.width = "auto";
    bezRamki.style.height = "auto";
    bezRamki.style.borderRadius = 0;
}

window.onkeyup = (e) => {
    if(e.key === "Escape"){
      alert('Uciekasz? Hmmmm... wracaj szybko!!!');
    }
  }