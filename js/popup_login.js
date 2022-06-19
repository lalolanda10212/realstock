var abrirpopup = document.getElementById('olvido'),
    overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    acept = document.getElementById('acept');

abrirpopup.addEventListener('click', function(){
    overlay.classList.add('active');
    popup.classList.add('active');
});

acept.addEventListener('click', function(){
    overlay.classList.remove('active')
    popup.classList.remove('active')
});
