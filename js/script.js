$('.cpf').mask('000.000.000-00');
$('.dinheiro').mask('000.000.000.000.000,00', {reverse: true});

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

function abrirModalJsCliente(id, inID, nome, inNome, dataTime, contato, inContato, uni, inUNI, cartao, inCartao, nomeModal, abrirModal = 'A', botao, addEditDel, inFocus, inFocusValue, formulario) {
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
        const ID = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            ID.value = id;
        }
        const Nome = document.getElementById(`${inNome}`);
        if (inNome !== 'nao') {
            Nome.value = nome;
        }
        const Contato = document.getElementById(`${inContato}`);
        if (inContato !== 'nao') {
            Contato.value = contato;
        }
        const Unidade = document.getElementById(`${inUNI}`);
        if (inUNI !== 'nao') {
            Unidade.value = uni;
        }
        const Cartao = document.getElementById(`${inCartao}`);
        if (inCartao !== 'nao') {
            Cartao.value = cartao;
        }


        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);

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
                        carregarConteudo("listarCliente");

                        switch (addEditDel) {
                            case 'addCliente':
                                addOuEditSucesso('Você', 'success', 'adicionou')
                                break;
                            case 'editCliente':
                                addOuEditSucesso('Você', 'info', 'editou')
                                botoes.disabled = false;
                                break;
                            case 'deleteCliente':
                                addOuEditSucesso('Você', 'success', 'deletou')
                                botoes.disabled = false;
                                break;
                        }
                        ModalInstacia.hide();
                    } else {
                        addErro()
                        ModalInstacia.hide();
                        carregarConteudo("listarCliente");
                    }
                })
                .catch(error => {
                    botoes.disabled = false;
                    ModalInstacia.hide();
                    addErro()
                    carregarConteudo("listarCliente");
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        botoes.disabled = false;
        ModalInstacia.hide();
    }

}


function abrirModalJsVenda(id, inID, nomeModal, dataTime, abrirModal = 'A', botao, addEditDel, inFocus, inFocusValue, formulario) {
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
        const ID = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            ID.value = id;
        }


        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);

            if (dataTime !== 'nao') {
                formData.append('dataTime', `${dataTime}`)
            }
            formData.append('controle', `${addEditDel}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    // console.log(data)
                    if (data.success) {
                        carregarConteudo("listarVenda");
                        console.log(data)
                        switch (addEditDel) {
                            case 'addVenda':
                                addOuEditSucesso('Você', 'success', 'adicionou')
                                break;
                            case 'editVenda':
                                addOuEditSucesso('Você', 'info', 'editou')
                                botoes.disabled = false;
                                break;
                            case 'deleteVenda':
                                addOuEditSucesso('Você', 'success', 'deletou')
                                botoes.disabled = false;
                                break;
                        }
                        ModalInstacia.hide();
                    } else {
                        addErro()
                        ModalInstacia.hide();
                        carregarConteudo("listarVenda");
                    }
                })
                .catch(error => {
                    botoes.disabled = false;
                    ModalInstacia.hide();
                    addErro()
                    carregarConteudo("listarVenda");
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        botoes.disabled = false;
        ModalInstacia.hide();
    }

}


function abrirModalJsADM(id, inID, nome, inNome, dataTime, cpf, inCpf, senha, inSenha, nomeModal, abrirModal = 'A', botao, addEditDel, inFocus, inFocusValue, formulario) {
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
        const ID = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            ID.value = id;
        }
        const Nome = document.getElementById(`${inNome}`);
        if (inNome !== 'nao') {
            Nome.value = nome;
        }
        const CPF = document.getElementById(`${inCpf}`);
        if (inCpf !== 'nao') {
            CPF.value = cpf;
        }


        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);

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
                        carregarConteudo("listarAdm");
                        form.removeEventListener('submit',submitHandler)
                        switch (addEditDel) {
                            case 'addAdm':
                                addOuEditSucesso('Você', 'success', 'adicionou')
                                break;
                            case 'editAdm':
                                addOuEditSucesso('Você', 'info', 'editou')
                                botoes.disabled = false;
                                break;
                            case 'deleteAdm':
                                addOuEditSucesso('Você', 'success', 'deletou')
                                botoes.disabled = false;
                                break;
                        }
                        ModalInstacia.hide();
                    } else {
                        addErro()
                        ModalInstacia.hide();
                        carregarConteudo("listarAdm");
                    }
                })
                .catch(error => {

                    botoes.disabled = false;
                    ModalInstacia.hide();
                    addErro()
                    carregarConteudo("listarAdm");
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        ModalInstacia.hide();
    }

}

function abrirModalJsFoto(id, inID, idCarroFoto, inCarroFoto, idPropFoto, inPropFoto,inpfoto, dataTime, nomeModal, abrirModal = 'A', botao, addEditDel, inFocus, inFocusValue, formulario) {
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
        const ID = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            ID.value = id;
        }
        const idCarro = document.getElementById(`${inCarroFoto}`);
        if (inCarroFoto !== 'nao') {
            idCarro.value = idCarroFoto;
        }
        const idProp = document.getElementById(`${inPropFoto}`);
        if (inPropFoto !== 'nao') {
            idProp.value = idPropFoto;
        }


        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);

            if (dataTime !== 'nao') {
                formData.append('dataTime', `${dataTime}`)
            }
            const fileInput = document.getElementById(`${inpfoto}`)
            formData.append('foto', fileInput.files[0]);

            formData.append('controle', `${addEditDel}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {

                    if (data.success) {
                        carregarConteudo("listarFoto");

                        switch (addEditDel) {
                            case 'addFoto':
                                addOuEditSucesso('Você', 'success', 'adicionou')
                                form.removeEventListener('submit', submitHandler)
                                break;
                            case 'editFoto':
                                addOuEditSucesso('Você', 'info', 'editou')
                                botoes.disabled = false;
                                break;
                            case 'deleteFoto':
                                addOuEditSucesso('Você', 'success', 'deletou')
                                botoes.disabled = false;
                                break;
                        }
                        ModalInstacia.hide();
                    } else {
                        addErro()
                        ModalInstacia.hide();
                        carregarConteudo("listarFoto");
                    }
                })
                .catch(error => {

                    botoes.disabled = false;
                    ModalInstacia.hide();
                    addErro()
                    carregarConteudo("listarFoto");
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        ModalInstacia.hide();
    }

}


function abrirModalJsCarro(id, inID, Carro, inCarro, Prop, inProp, diferenciais, inDiferenciais, dataTime, nomeModal, abrirModal = 'A', botao, addEditDel, inFocus, inFocusValue, formulario) {
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
        const ID = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            ID.value = id;
        }
        const idCarro = document.getElementById(`${inCarroFoto}`);
        if (inCarroFoto !== 'nao') {
            idCarro.value = idCarroFoto;
        }
        const idProp = document.getElementById(`${inPropFoto}`);
        if (inPropFoto !== 'nao') {
            idProp.value = idPropFoto;
        }


        const submitHandler = function (event) {
            event.preventDefault();

            botoes.disabled = true;

            const form = event.target;
            const formData = new FormData(form);

            if (dataTime !== 'nao') {
                formData.append('dataTime', `${dataTime}`)
            }
            const fileInput = document.getElementById('inpFoto')
            formData.append('foto', fileInput.files[0]);
            formData.append('controle', `${addEditDel}`)

            fetch('controle.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {

                    if (data.success) {
                        carregarConteudo("listarCarro");

                        switch (addEditDel) {
                            case 'addFoto':
                                addOuEditSucesso('Você', 'success', 'adicionou')
                                break;
                            case 'editFoto':
                                addOuEditSucesso('Você', 'info', 'editou')
                                botoes.disabled = false;
                                break;
                            case 'deleteFoto':
                                addOuEditSucesso('Você', 'success', 'deletou')
                                botoes.disabled = false;
                                break;
                        }
                        ModalInstacia.hide();
                    } else {
                        addErro()
                        ModalInstacia.hide();
                        carregarConteudo("listarFoto");
                    }
                })
                .catch(error => {

                    botoes.disabled = false;
                    ModalInstacia.hide();
                    addErro()
                    carregarConteudo("listarFoto");
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
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
                const mostrar = document.getElementById('mostrar');
                if (data.success) {

                    const divMaeDeTodos = document.createElement('div');
                    const divMain = document.createElement('div');
                    const divCol = document.createElement('div');
                    const divCol2 = document.createElement('div');
                    const divCol3 = document.createElement('div');
                    const divCard = document.createElement('div');
                    const divBody = document.createElement('div');
                    const Imagem = document.createElement('img');
                    const divTexto = document.createElement('div');
                    const h1 = document.createElement('h1');
                    const hr = document.createElement('hr');
                    const divContainerHR = document.createElement('div');
                    const divPreco = document.createElement('div');
                    const h5 = document.createElement('h5');
                    const divBotao = document.createElement('div');


                    const buttonCard = document.createElement('button');
                    mostrar.innerHTML = '';
                    mostrar.appendChild(divMain)
                    divMain.classList.add("mt-5");
                    divMain.classList.add("row");
                    divMain.classList.add("d-flex");
                    divMain.classList.add("justify-content-center");
                    divMain.classList.add("align-items-center");
                    divMain.appendChild(divCol)
                    divCol.classList.add("col-lg-6");
                    divCol.classList.add("col-md-8");
                    divCol.classList.add("col-12");
                    divCol.classList.add("bordaColPesquisar");
                    divCol.classList.add("m-0");
                    divCol.classList.add("p-0");
                    divCol.appendChild(divCard)
                    divCard.classList.add("row");
                    divCard.appendChild(divCol2)
                    divCol2.classList.add("col-6");
                    divCol2.classList.add("d-flex");
                    divCol2.classList.add("align-items-center");
                    divCol2.appendChild(Imagem)
                    Imagem.src = "./img/" + data.fotoPerfil;
                    Imagem.classList.add("card-img-top");
                    Imagem.classList.add("img-fluid");
                    Imagem.classList.add("bordafotoPesquisar");
                    Imagem.classList.add("w-100");
                    Imagem.classList.add("h-100");

                    divCard.appendChild(divCol3);

                    divCol3.classList.add("col-6");
                    divCol3.appendChild(divTexto)
                    divTexto.classList.add("d-flex");
                    divTexto.classList.add("align-items-center");
                    divTexto.classList.add("justify-content-end");
                    divTexto.classList.add("mt-5");
                    divTexto.classList.add("ms-5");
                    divTexto.classList.add("me-3");
                    divTexto.appendChild(h1)
                    h1.innerHTML = "<b>" + data.nomeCarro + "</b>";
                    divCol3.appendChild(divContainerHR)
                    divContainerHR.classList.add("container");
                    divContainerHR.appendChild(hr)
                    divCol3.appendChild(divPreco)
                    divPreco.classList.add("d-flex");
                    divPreco.classList.add("justify-content-end");
                    divPreco.classList.add("mt-4");
                    divPreco.classList.add("mb-1");
                    divPreco.classList.add("ms-5");
                    divPreco.classList.add("me-3");
                    divPreco.appendChild(h5)
                    h5.innerHTML = "R$" +data.preco ;

                    divCol3.appendChild(divBotao)
                    divBotao.classList.add("d-flex");
                    divBotao.classList.add("align-items-center");
                    divBotao.classList.add("justify-content-center");
                    divBotao.appendChild(buttonCard)

                    //  dasdas
                    buttonCard.setAttribute('onclick', 'abrirModalCompra(\'' + data.idcarro + '\',\'' + data.preco + '\',\'' + data.nomeCarro + '\',\'' + data.diferenciais + '\')')

                    buttonCard.type = 'submit';
                    buttonCard.innerText = 'Ver Mais';

                    buttonCard.classList.add("btn");
                    buttonCard.classList.add("btn-outline-dark");

                } else {

                }
            })
            .catch(error => {


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
