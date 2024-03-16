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


function abrirModalJsProprietario(id, inID, nomeProp, inNomeProp, dataTime, nomeModal, abrirModal = 'A', botao, addEditDel, inFocus, inFocusValue, formulario) {
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


        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);
            if (inID !== 'nao') {
                formData.append('id', `${id}`)
            }
            if (dataTime !== 'nao') {
                formData.append('dataTime', `${dataTime}`)
            }
            formData.append('controle', `${addEditDel}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        carregarConteudo("listarProprietarios");

                        switch (addEditDel) {
                            case 'addProprietario':
                                addOuEditSucesso('Você', 'success', 'adicionou')
                                break;
                            case 'editProprietario':
                                addOuEditSucesso('Você', 'info', 'editou')
                                botoes.disabled = false;
                                break;
                            case 'deleteProprietario':
                                addOuEditSucesso('Você', 'success', 'deletou')
                                botoes.disabled = false;
                                break;
                        }
                        ModalInstacia.hide();
                    } else {
                        addErro()
                        ModalInstacia.hide();
                        carregarConteudo("listarProprietarios");
                    }
                    console.log(data)
                })
                .catch(error => {
                    botoes.disabled = false;
                    ModalInstacia.hide();
                    addErro()
                    carregarConteudo("listarProprietarios");
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        botoes.disabled = false;
        ModalInstacia.hide();
    }

}

function pesquisarCarros(botao, addEditDel, inFocus, inFocusValue, formulario) {
    const formDados = document.getElementById(`${formulario}`)

    var botoes = document.getElementById(`${botao}`);


    const inputFocar = document.getElementById(`${inFocus}`);
    if (inFocusValue !== 'nao') {
        inputFocar.value = inFocusValue;
        setTimeout(function () {
            inputFocar.focus();

        }, 500);
    }
    if (inFocus !== 'nao') {
        setTimeout(function () {
            inputFocar.focus();

        }, 500);
    }
    const submitHandler = function (event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);
        formData.append('controle', `${addEditDel}`)

        fetch('controle.php', {
            method: 'POST', body: formData,
        })
            .then(response => response.json())
            .then(data => {
                var mostrar = document.getElementById('mostrar')
                if (data.success) {

                    carregarConteudo("listarCarros");

                } else {
                    carregarConteudo("listarCarros");
                }
                console.log(data)
            })
            .catch(error => {
                alert('catch')
                carregarConteudo("listarCarros");
                console.error('Erro na requisição:', error);
            });


    }
    formDados.addEventListener('submit', submitHandler);


}

function addOuEditSucesso(UserAlter, icon, addOuEditOuDelete) {
    let timerInterval;
    Swal.fire({
        title: `${UserAlter} ${addOuEditOuDelete} com sucesso! <br> Atualizando Dados.`,
        html: "Fechando em <b></b> ms.",
        timer: 1500,
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
        title: "Erro ao Manipular <br> Tente Novamente.",
        html: "Fechando em <b></b> ms.",
        timer: 1500,
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
