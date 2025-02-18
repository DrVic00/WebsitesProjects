var images = ['shoot1.jpg', 'shoot2.jpg', 'shoot3.jpg', 'shoot4.jpg', 'shoot5.jpg']

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
    ramka.style.border = "5px solid #3B75C2";
    ramka.style.width = "800px";
    ramka.style.height = "600px";
    ramka.style.borderRadius = "20px";
}


function Bez_Ramki(){
    var bezRamki = document.getElementById("images");
    bezRamki.style.border = "none";
    bezRamki.style.width = "700px";
    bezRamki.style.height = "500px";
    bezRamki.style.borderRadius = 0;
}
