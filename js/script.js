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
                    console.log(data)
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
                    console.log(data)
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

function abrirModalJsFoto(id, inID, idCarroFoto, inCarroFoto, idPropFoto, inPropFoto, dataTime, nomeModal, abrirModal = 'A', botao, addEditDel, inFocus, inFocusValue, formulario) {
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
                    console.log(data)
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
                    console.log(data)
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
    // const nomeModalCarro = document.getElementById('tituloCarro');
    // const precoModalCarro = document.getElementById('precoCarro');
    // const diferenciaisModalCarro = document.getElementById('diferenciaisCarro');
    // nomeModalCarro.innerHTML='Comprar '+`${nome}`
    // precoModalCarro.innerHTML=`${precoV}`
    // diferenciaisModalCarro.innerHTML=`${descricao}`
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

                    const divMain = document.createElement('div');
                    const divCol = document.createElement('div');
                    const divCard = document.createElement('div');
                    const divBody = document.createElement('div');
                    const Imagem = document.createElement('img');
                    const divTexto = document.createElement('div');
                    const h5 = document.createElement('h5');
                    const buttonCard = document.createElement('button');
                    mostrar.innerHTML = '';
                    mostrar.appendChild(divMain)
                    divMain.classList.add("row");
                    divMain.classList.add("d-flex");
                    divMain.classList.add("justify-content-center");
                    divMain.classList.add("align-items-center");
                    divMain.appendChild(divCol)
                    divCol.classList.add("col-lg-4");
                    divCol.classList.add("col-md-4");
                    divCol.classList.add("col-12");
                    divCol.appendChild(divCard)
                    divCard.classList.add("card");
                    divCard.classList.add("mt-4");
                    divCard.appendChild(Imagem)
                    Imagem.src = "./img/" + data.fotoPerfil;
                    Imagem.classList.add("card-img-top");
                    Imagem.classList.add("img-fluid");
                    divCard.appendChild(divBody)
                    divBody.classList.add("card-body");
                    divBody.classList.add("text-center");
                    divBody.appendChild(divTexto)
                    
                    divTexto.appendChild(h5)
                    divTexto.classList.add("card-title");
                    divTexto.innerHTML ="<b>"+ data.nomeCarro+"</b>";
                
                    divBody.appendChild(buttonCard)

                 
                    buttonCard.setAttribute('onclick','abrirModalCompra(\'' + data.idcarro + '\',\'' + data.preco + '\',\'' + data.nomeCarro + '\',\'' + data.diferenciais + '\')')

                    buttonCard.type = 'submit';
                    buttonCard.innerText = 'Ver Mais';

                    buttonCard.classList.add("btn");
                    buttonCard.classList.add("btn-outline-dark");
                    // = "card-body text-center" >
                    // mostrar.innerHTML = data.message;

                } else {

                }
                console.log(data)
            })
        // .catch(error => {
        //     alert('catch')
        //
        //     console.error('Erro na requisição:', error);
        // });


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
