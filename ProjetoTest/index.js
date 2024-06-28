var elementosDuvida = document.querySelectorAll('.duvida')

function toggleEdit() {
    var textoDiv = document.getElementById('texto');
    var isEditable = textoDiv.contentEditable === 'true';
    
    // Inverte o estado da propriedade contenteditable
    textoDiv.contentEditable = !isEditable;
    
    // Atualiza o texto do botão
    var buttonText = isEditable ? 'Editar Texto' : 'Salvar Alterações';
    document.querySelector('button').textContent = buttonText;
    
    // Altera a aparência da div editável
    textoDiv.classList.toggle('editable');
}

elementosDuvida.forEach(function (duvida) {
    duvida.addEventListener('click', function() {
        duvida.classList.toggle('ativa')
    })
})
