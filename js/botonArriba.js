function irArriba(){
  window.addEventListener('scroll',() => {
    let scroll = document.documentElement.scrollTop;
    //console.log(scroll);
    let botonArriba = document.getElementById("botonArriba");
    //let botonArriba = document.getElementsByClassName("iconarriba");
    if (scroll > 300) {
      botonArriba.style.right = 8 + "px";
    } else {
      botonArriba.style.right = -100 + "px";
    }
  })
}
irArriba();