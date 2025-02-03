const editBtns = document.getElementById('create-btn');
const minhaDiv = document.getElementById('editar-animal');

function ativarDiv() {
    minhaDiv.classList.add('active');
    minhaDiv.classList.remove('hidden');
}

function desativarDiv() {
    minhaDiv.classList.remove('active');
    minhaDiv.classList.add('hidden');
}

editBtns.addEventListener('click', function(e) {
    e.preventDefault();
    ativarDiv();
});