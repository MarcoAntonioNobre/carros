const clienteModalInstancia = new bootstrap.Modal(document.getElementById('mdlCadCliente'));
const clienteModal = document.getElementById('mdlCadCliente');
const nomeCliente = document.getElementById('inpNome');
const btnBotao = document.getElementById('btnCadCliente');

if (clienteModal) {
    const formGenero = document.getElementById('frmCadCliente');

    clienteModal.addEventListener('shown.bs.modal', () => {
        nomeCliente.focus()
        const submitHandler = function (event) {
            event.preventDefault();
            btnBotao.disabled = true;
            clienteModalInstancia.hide();
            const form = event.target;
            const formData = new FormData(form);
            formData.append('controle', 'clienteAdd')
            // const msg = document.getElementById('msg');
            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.success) {
                        btnBotao.disabled = false;
                        alert(data['message']);
                        carregarConteudo('listarCliente');
                    } else {
                        alert(data['message']);
                    }
                })
                .catch(error => {
                    console.error('Erro na requisição:', error);
                });
        }
        formGenero.addEventListener('submit', submitHandler);
    })
}