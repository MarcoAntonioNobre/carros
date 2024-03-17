
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