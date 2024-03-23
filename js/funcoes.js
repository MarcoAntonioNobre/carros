function refresh(){
    window.location.reload()
}

function abrirModalCompra(idcarro, precoV, nome, descricao) {
    const idQtd = document.getElementById('inQuantidade');
    const preco = document.getElementById('precoVeiculo');
    const nomeModalCarro = document.getElementById('tituloCarro');
    const precoModalCarro = document.getElementById('precoCarro');
    const diferenciaisModalCarro = document.getElementById('diferenciaisCarro');
    nomeModalCarro.innerHTML = 'Comprar ' + `${nome}`
    precoModalCarro.innerHTML = `${precoV}`
    diferenciaisModalCarro.innerHTML = `${descricao}`
    if (idQtd) {
        idQtd.focus();
    }
    preco.value = precoV
    document.getElementById('idcompra').value = idcarro
    abrirFecharModalCompra('vermais', 'A');
}

function abrirFecharModalCompra(idModal, abrirOuFechar) {
    const modalInstancia = new bootstrap.Modal(document.getElementById(idModal));
    if (abrirOuFechar == 'A') {
        modalInstancia.show();
    } else {
        modalInstancia.hide();
    }
}

//const modalCompraInstancia = document.getElementById('vermais')
const modalCompra = document.getElementById('vermais');
const inpCompra = document.getElementById('inQuantidade');
const btnCompra = document.getElementById('btnCompra')

if (modalCompra) {
    const formCompra = document.getElementById('frmCompra')

    modalCompra.addEventListener('shown.bs.modal', () => {
        inpCompra.focus()
        const valorTotal = document.getElementById('valorTotal');
        const calcular = document.getElementById('calcular');
        const preco = document.getElementById('precoVeiculo').value;
        calcular.addEventListener('click', function () {
            const inputQtd = document.getElementById('inQuantidade').value;
            const resultado = preco * inputQtd
            valorTotal.innerHTML = 'R$ ' + resultado;
        })
        const cartao = document.getElementById('cartao');
        const codCartao = document.getElementById('cartaoCod');
        cartao.addEventListener('click', function () {
            codCartao.style.display = 'block';
        });
        const dinheiro = document.getElementById('dinheiro');
        dinheiro.addEventListener('click', function () {
            codCartao.style.display = 'none';
        })

        const submitHandler = function (event) {
            event.preventDefault();
            btnCompra.disabled = true;
            //modalCompraInstancia.hide();
            const form = event.target;
            const formData = new FormData(form);
            formData.append('controle', 'compra');
            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {

                    if (data.success) {
                        console.log(data)
                        btnCompra.disabled = false;
                        addOuEditSucesso('Compra', 'success', ' efetuada')
                        setTimeout(() => {
                            window.location.href = 'dashboard.php';
                        }, "1500");
                        abrirFecharModalCompra('vermais', 'F');
                    } else {
                        btnCompra.disabled = false;
                        addErroCompra(data.message)
                        // alert(data.message)
                        abrirFecharModalCompra('vermais', 'F');
                        setTimeout(() => {
                            window.location.href = 'dashboard.php';
                        }, "2000");
                    }
                })
        }
        formCompra.addEventListener('submit', submitHandler)

    })
}


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
            const fileInput = document.getElementById('inpFotoCarro')
            formData.append('foto', fileInput.files[0]);
            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {

                    if (data.success) {
                        addOuEditSucesso('Você', 'success', 'adicionou')
                        form.removeEventListener('submit', submitHandler)
                        btnCarro.disabled = false;
                        carregarConteudo('listarCarros');
                    } else {
                        btnCarro.disabled = false;
                        //alert(data['message'])
                        addErro()
                    }
                })
        }
        formCarro.addEventListener('submit', submitHandler);
    })
}


function redireciona(link) {
    window.location.href = link + '.php';

}


function abrirModalCarro(idcarro, nome, diferenciais, valor, prop) {
    const nomeEdit = document.getElementById('inpNomeEditCarro');
    const diferenciaisEdit = document.getElementById('inpEditDiferenciais');
    // const fotoEdit = document.getElementById('inpEditFotoCarro');
    const valorEdit = document.getElementById('inpEditValor');
    const propEdit = document.getElementById('selectEditProprietario');

    if (nomeEdit) {
        nomeEdit.focus();
    }
    nomeEdit.value = nome;
    diferenciaisEdit.value = diferenciais;
    // fotoEdit.value = foto;
    valorEdit.value = valor;
    propEdit.value = prop;
    document.getElementById('idEditCarro').value = idcarro
    abrirFecharModalCarro('mdlEditCarro', 'A');
}

function abrirFecharModalCarro(idModal, abrirOuFechar) {
    const modalInstancia = new bootstrap.Modal(document.getElementById(idModal));
    if (abrirOuFechar == 'A') {
        modalInstancia.show();
    } else {
        modalInstancia.hide();
    }
}

const carroEditModalInstancia = new bootstrap.Modal(document.getElementById('mdlEditCarro'));
const carroEditModal = document.getElementById('mdlEditCarro');
const inpEditCarro = document.getElementById('inpNomeEditCarro');
const btnEditCarro = document.getElementById('btnEditCarro');

if (carroEditModal) {
    const formCarro = document.getElementById('frmEditCarro');

    carroEditModal.addEventListener('shown.bs.modal', () => {
        inpEditCarro.focus();
        const submitHandler = function (event) {
            event.preventDefault();
            btnEditCarro.disabled = true;
            const form = event.target;
            const formData = new FormData(form);
            formData.append('controle', 'carroEdit');
            const fileInput = document.getElementById('inpEditFotoCarro')
            formData.append('foto', fileInput.files[0]);
            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    carroEditModalInstancia.hide();
                    if (data.success) {
                        addOuEditSucesso('Você', 'info', 'editou')
                        form.removeEventListener('submit', submitHandler)
                        btnEditCarro.disabled = false;

                        carroEditModalInstancia.hide();
                        carregarConteudo('listarCarros');
                    } else {
                        carroEditModalInstancia.hide();
                        btnEditCarro.disabled = false;
                        addErro()
                    }
                })
        }

        formCarro.addEventListener('submit', submitHandler);
    })
}

function abrirModalDeleteCarro(idDelCarro) {
    document.getElementById('idDeleteCarro').value = idDelCarro
    abrirFecharModalDeleteCarro('mdlDeleteCarro', 'A');

}

function abrirFecharModalDeleteCarro(idModal, abrirOuFechar) {
    const modalInstancia = new bootstrap.Modal(document.getElementById(idModal));
    if (abrirOuFechar === 'A') {
        modalInstancia.show();
    } else {
        modalInstancia.hide();
    }
}


const modalDeleteCarroInstancia = new bootstrap.Modal(document.getElementById('mdlDeleteCarro'))
const modalDeleteCarro = document.getElementById('mdlDeleteCarro')
const btnDeleteCarro = document.getElementById('btnDeleteCarro')

if (modalDeleteCarro) {
    const formDelCarro = document.getElementById('frmDeleteCarro')

    modalDeleteCarro.addEventListener('show.bs.modal', () => {
        const submitHandler = function (event) {
            event.preventDefault();
            btnDeleteCarro.disabled = true;
            modalDeleteCarroInstancia.hide()
            const form = event.target;
            const formData = new FormData(form);
            formData.append('controle', 'deleteCarro');
            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        addOuEditSucesso('Você', 'success', 'deletou')
                        carregarConteudo('listarCarros')
                    } else {
                        addErro()
                    }
                })
        }
        formDelCarro.addEventListener('submit', submitHandler)
    })
}
// function deletarCarro(controle, id) {
//
//     fetch('controle.php', {
//         method: 'POST',
//         body: 'controle=' + encodeURIComponent(controle) + '&idApagar=' + encodeURIComponent(id),
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded',
//         },
//     })
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 addOuEditSucesso('Você', 'success', 'deletou')
//
//                 carregarConteudo('listarCarros')
//             } else {
//                 addErro()
//
//             }
//         })
//         .catch(error => console.error('Erro na requisição:', error));
// }


function abrirModalDelFoto(idDelfoto) {
    console.log('Capturou o id deletar')
    document.getElementById('idDeleteFoto').value = idDelfoto
    abrirFecharModalDelFoto('mdlDeleteFoto', 'A');
}

function abrirFecharModalDelFoto(idModal, abrirOuFechar) {
    const modalInstancia = new bootstrap.Modal(document.getElementById(idModal));
    if (abrirOuFechar === 'A') {
        console.log('Mostrou a modal deletar')
        modalInstancia.show();
    } else {
        modalInstancia.hide();
    }
}


const fotoDeleteModalInstancia = new bootstrap.Modal(document.getElementById('mdlDeleteFoto'));
const fotoDeleteModal = document.getElementById('mdlDeleteFoto');
const btnDelFoto = document.getElementById('btnDeleteFoto');

if (fotoDeleteModal) {
    const formFoto = document.getElementById('frmDeleteFoto');

    fotoDeleteModal.addEventListener('shown.bs.modal', () => {

        const submitHandler = function (event) {
            event.preventDefault();
            btnDelFoto.disabled = true;
            fotoDeleteModalInstancia.hide();
            const form = event.target;
            const formData = new FormData(form);
            formData.append('controle', 'deleteFoto');
            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        addOuEditSucesso('Você', 'success', 'deletou')
                        btnDelFoto.disabled = false;
                        carregarConteudo('listarFoto');
                    } else {
                        btnDelFoto.disabled = false;
                        addErro()
                    }
                })
        }
        formFoto.addEventListener('submit', submitHandler);
    })
}


function abrirModalEditFoto(idEditfoto) {
    const enderecoFoto = document.getElementById('inpEditFoto')

    // enderecoFoto.value = endFoto

    document.getElementById('idEditFoto').value = idEditfoto
    abrirFecharModalEditFoto('mdlEditFoto', 'A');
}

function abrirFecharModalEditFoto(idModal, abrirOuFechar) {
    const modalInstancia = new bootstrap.Modal(document.getElementById(idModal));

    if (abrirOuFechar === 'A') {
        modalInstancia.show();
        //console.log('Mostrou a modal editar')
    } else {
        modalInstancia.hide();
    }
}


const fotoEditModalinstancia = new bootstrap.Modal(document.getElementById('mdlEditFoto'));
const fotoEditModal = document.getElementById('mdlEditFoto');
const btnEditFoto = document.getElementById('btnEditFoto');


if (fotoEditModal) {
    const formEditFoto = document.getElementById('frmEditFoto');

    fotoEditModal.addEventListener('shown.bs.modal', () => {
        const submitHandler = function (event) {
            event.preventDefault();
            btnEditFoto.disabled = true;
            fotoEditModalinstancia.hide();
            const form = event.target;
            const formData = new FormData(form);
            formData.append('controle', 'editFoto');
            const fileInput = document.getElementById('inpEditFoto');
            formData.append('foto', fileInput.files[0]);
            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        btnEditFoto.disabled = false
                        addOuEditSucesso('Você', 'info', 'editou');
                        form.removeEventListener('submit', submitHandler);
                        carregarConteudo('listarFoto');
                    } else {
                        btnEditFoto.disabled = false
                        addErro();
                    }
                });
        };
        formEditFoto.addEventListener('submit', submitHandler);
    });

}


function deletar(controle, id) {

    fetch('controle.php', {
        method: 'POST',
        body: 'controle=' + encodeURIComponent(controle) + '&idApagar=' + encodeURIComponent(id),
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                addOuEditSucesso('Você', 'success', 'deletou')
                carregarConteudo('listarFoto')
            } else {
                addErro()

            }
        })
        .catch(error => console.error('Erro na requisição:', error));
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

function addErroCompra(msg) {
    let timerInterval;
    Swal.fire({
        title: `${msg}` + "<br> Tente Novamente.",
        html: "Fechando em <b></b> ms.",
        timer: 2000,
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

