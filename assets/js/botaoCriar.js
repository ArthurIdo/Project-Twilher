function abrirNovaAba() {
    window.location.href = 'formulario.php';
}

// anexar imagem
const fileInput = document.getElementById('enviarArquivo');
const preview = document.getElementById('visualizacao');

fileInput.addEventListener('change', function(e) {
    const files = e.target.files;
    
    for(const file of files) {
        if(file.type.startsWith('image/')) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('visualizacao-imagem');
                preview.appendChild(img);
            }
            
            reader.readAsDataURL(file);
        } else {
            alert('Por favor, selecione apenas arquivos de imagem!');
        }
    }
});

