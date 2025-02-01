// Selecionar TODOS os botões de edição
const editBtns = document.querySelectorAll('.edit-btn'); // Usar querySelectorAll
const closeBtn = document.querySelector('.close-btn'); // Botão de fechar (único)
const minhaDiv = document.getElementById('editar-animal');

// Função para ativar a div
function ativarDiv() {
    minhaDiv.classList.add('active');
    minhaDiv.classList.remove('hidden');
}

// Função para desativar a div
function desativarDiv() {
    minhaDiv.classList.remove('active');
    minhaDiv.classList.add('hidden');
}

// Adicionar event listeners a TODOS os botões de edição
editBtns.forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        ativarDiv();
    });
});

// Event listener para o botão de fechar
closeBtn.addEventListener('click', function(e) {
    e.preventDefault();
    desativarDiv();
});