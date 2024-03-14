$('.cpf').mask('000.000.000-00');


var options = {
    onKeyPress: function (tell, e, field, options) {
        var masks = ['(00) 0 0000-0000', '(00) 0000-0000'];
        var mask = (tell.length < 15) ? masks[1] : masks[0];
        $('.telefoneBR').mask(mask, options);
    }
};

$('.telefoneBR').mask('(00) 0 0000-0000', options);

function carregarConteudo(controle) {
    fetch('controle.php', {
        method: 'POST', headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }, body: 'controle=' + encodeURIComponent(controle),
    })
        .then(response => response.text())
        .then(data => {

            document.getElementById('show').innerHTML = data;
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
}


function abrirModalJsProprietario(id, inID, nomeProp, inNomeProp, contatoProp, inContatoProp, fotoProp, inFotoProp, nomeModal, abrirModal = 'A', botao, addEditDel, inFocus, inFocusValue, formulario) {
    const formDados = document.getElementById(`${formulario}`)

    var botoes = document.getElementById(`${botao}`);
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();

        const inputFocar = document.getElementById(`${inFocus}`);
        if (inFocusValue !== 'nao') {
            inputFocar.value = inFocusValue;
            setTimeout(function () {
                inputFocar.focus();

            }, 500);
        }
        const inputid = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            inputid.value = id;
        }
        if (inFotoProp !== 'nao') {

            var foto = document.getElementById(`${inFotoProp}`).files;
        }


        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);
            if (inID !== 'nao') {
                formData.append('id', `${id}`)
            }
            if (inFotoProp !== 'nao') {
                formData.append('foto', foto)
            }
            formData.append('controle', `${addEditDel}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {

                        // switch (addEditDel) {
                        //     case 'generoAdd':
                        //         addOuEditSucesso('Você', 'success', 'adicionou')
                        //         break;
                        //     case 'generoEdit':
                        //         addOuEditSucesso('Você', 'info', 'editou')
                        //         break;
                        //     case 'generoDelete':
                        //         addOuEditSucesso('Você', 'success', 'deletou')
                        //         break;
                        // }
                        // setTimeout(function () {

                        ModalInstacia.hide();
                        carregarConteudo("listarProprietarios");
                        // }, 3000);
                    } else {
                        addErro()
                        carregarConteudo("listarProprietarios");
                    }
                    console.log(data)
                })
                .catch(error => {

                    ModalInstacia.hide();
                    addErro()
                    carregarConteudo("listarProprietarios");
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        ModalInstacia.hide();
    }

}


function addOuEditSucesso(UserAlter, icon, addOuEditOuDelete) {
    let timerInterval;
    Swal.fire({
        title: `${UserAlter}, você ${addOuEditOuDelete} com sucesso! <br> Atualizando Dados.`,
        html: "Fechando em <b></b> ms.",
        timer: 3000,
        icon: `${icon}`,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {

                timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log("fechando..");
        }
    });
}


function addErro() {
    let timerInterval;
    Swal.fire({
        title: "Erro ao Adicionar <br> Tente Novamente.",
        html: "Fechando em <b></b> ms.",
        timer: 3000,
        icon: "error",
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {

                timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
    }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log("fechando..");
        }
    });
};
