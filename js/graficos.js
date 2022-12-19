function Descargar(idGrafico) {
  const imageLink = document.createElement('a');
  const canvas = document.getElementById(idGrafico);
  imageLink.download = idGrafico+'.png';
  imageLink.href = canvas.toDataURL('image/png');
  imageLink.click();
  console.log(imageLink);
};