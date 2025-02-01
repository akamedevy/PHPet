window.onload = function() {
    let elemento = document.querySelector('.form-animais');
    let blobBaixo = document.querySelector('.blob-background2');
    let blobCima = document.querySelector('.blob-background');
    elemento.style.opacity = '1';
    elemento.style.transform = 'scale(100%)';
    blobBaixo.style.opacity = '1';
    blobCima.style.opacity = '1';
    blobCima.style.transform = 'translate(-20%, -40%)';
    blobBaixo.style.transform = 'translate(20%, 40%)';
    // elemento.style.transform = 'translateY(0)';
    console.log("passou aqui");
}