 var sidenav = document.getElementById("mySidenav");
var openBtn = document.getElementById("openBtn");
var closeBtn = document.getElementById("closeBtn");
openBtn.addEventListener("click", openNav);
closeBtn.addEventListener("click", closeNav);
/* 
openBtn.onclick = openNav;
closeBtn.onclick = closeNav;
*/

/* Set the width of the side navigation to 250px */
function openNav() {
  sidenav.classList.add("active");
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  sidenav.classList.remove("active");
}
/* Set for the slide */
const sliderr = document.querySelector(".slider");
const l = document.querySelector(".left");
const r = document.querySelector(".right");
r.addEventListener("click", right);
l.addEventListener("click", left);
let index =0;
function right(){
  index = (  index < 3) ? index + 1 : 3 ;
  document.querySelector(".right").style.color = "red";
  sliderr.style.transform = 'translate('+(index)*-25  +'%)';
}
function left(){
   index = (  index > 0 ) ? index-1: 0;
  document.querySelector(".left").style.color = "";
    sliderr.style.transform = 'translate('+(index)*-25  +'%)';
}

/*   F&Q  */
const items = document.querySelectorAll('.accordion button');

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');

  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }

  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach((item) => item.addEventListener('click', toggleAccordion));
   