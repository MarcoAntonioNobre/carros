
const carroModalInstancia = new bootstrap.Modal(document.getElementById('mdlCadCarro'));
const carroModal = document.getElementById('mdlCadCarro');
const inpCarro = document.getElementById('inpNomeCarro');
const btnCarro = document.getElementById('btnCadCarro');

if (carroModal) {
    const formCarro = document.getElementById('frmCadCarro');

    carroModal.addEventListener('shown.bs.modal', () => {
        inpCarro.focus();
        const submitHandler = function (event) {
            event.preventDefault();
            btnCarro.disabled = true;
            carroModalInstancia.hide();
            const form = event.target;
            const formData = new FormData(form);
            formData.append('controle', 'carroAdd');
            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if(data.success){
                        form.removeEventListener('submit',submitHandler)
                        btnCarro.disabled = false;
                        alert(data['message']);
                        carregarConteudo('listarCarros');
                    }else{
                        btnCarro.disabled = false;
                        alert(data['message']);
                    }
                })
        }
        formCarro.addEventListener('submit', submitHandler);
    })
}




function redireciona() {
        window.location.href = 'dashboard.php';

}

const fotoModalInstancia = new bootstrap.Modal(document.getElementById('mdlCadFoto'));
const fotoModal = document.getElementById('mdlCadFoto');
const btnFoto = document.getElementById('btnCadFoto');

if (fotoModal) {
    const formFoto = document.getElementById('frmCadFoto');

    fotoModal.addEventListener('shown.bs.modal', () => {
        const submitHandler = function (event) {
            event.preventDefault();
            btnFoto.disabled = true;
            fotoModalInstancia.hide();
            const form = event.target;
            const formData = new FormData(form);
            formData.append('controle', 'addFoto');
            const fileInput = document.getElementById('inpFoto')
            formData.append('foto', fileInput.files[0]);
            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if(data.success){
                        form.removeEventListener('submit',submitHandler)
                        btnFoto.disabled = false;
                        alert(data['message']);
                        carregarConteudo('listarFoto');
                    }else{
                        form.removeEventListener('submit',submitHandler)
                        btnFoto.disabled = false;
                        alert(data['message']);
                        carregarConteudo('listarFoto');
                    }
                })
        }
        formFoto.addEventListener('submit', submitHandler);
    })
}



function deletar(controle, id){
    //alert(controle + id)
    fetch('controle.php', {
        method: 'POST',
        body: 'controle=' + encodeURIComponent(controle) + '&idApagar=' + encodeURIComponent(id),
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
    })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                alert(data.message)
                carregarConteudo('listarFoto')
            }else{
                alert(data.message)
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}
