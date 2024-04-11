function refresh() {
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
    const modalInstancia = new bootstrap.Modal(document.getElementById(`${idModal}`))
    if (abrirOuFechar === 'A') {
        modalInstancia.show();


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
                        .catch(error => {
                            // ModalInstacia.hide();
                            console.error('Erro na requisição:', error);
                        });
                }
                formCompra.addEventListener('submit', submitHandler)

            })

        }

    } else {

        // modalInstancia.hide();
    }
}

if (document.getElementById('mdlCadCarro')) {


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

if (document.getElementById('mdlEditCarro')) {


    const carroEditModalInstancia = new bootstrap.Modal(document.getElementById('mdlEditCarro'));
    const carroEditModal = document.getElementById('mdlEditCarro');
    const inpEditCarro = document.getElementById('inpNomeEditCarro');
    const btnEditCarro = document.getElementById('btnEditCarro');

    if (carroEditModal) {
        const form = document.getElementById('frmEditCarro');

        carroEditModal.addEventListener('shown.bs.modal', () => {
            inpEditCarro.focus();
            const submitHandler = function (event) {
                event.preventDefault();
                btnEditCarro.disabled = true;
                const form = event.target;
                const formData = new FormData(form);
                formData.append('controle', 'carroEdit');
                fetch('controle.php', {
                    method: 'POST',
                    body: formData,
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            addOuEditSucesso('Você', 'info', 'editou')

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

            form.addEventListener('submit', submitHandler);
        })
    }
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

if (document.getElementById('mdlDeleteCarro')) {


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
}

function abrirModalDelFoto(idDelfoto) {
    document.getElementById('idDeleteFoto').value = idDelfoto
    abrirFecharModalDelFoto('mdlDeleteFoto', 'A');
}

function abrirFecharModalDelFoto(idModal, abrirOuFechar) {
    const modalInstancia = new bootstrap.Modal(document.getElementById(idModal));
    if (abrirOuFechar === 'A') {

        modalInstancia.show();
    } else {
        modalInstancia.hide();
    }
}

if (document.getElementById('mdlDeleteFoto')) {


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

    } else {
        modalInstancia.hide();
    }
}

if (document.getElementById('mdlEditFoto')) {

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


function imprimir(nomeTabela, tabela) {
    const conteudo = document.getElementById(tabela).innerHTML;
//alert('hey')
    let estilo = "<style>";
    estilo += "table {width: 100%; font: 20px Calibri;}"
    estilo += "th{border: solid 2px #000;}"
    estilo += "table, thead,tbody, td {border: solid 2px #000; border-collapse: collapse;"
    estilo += "padding: 4px 8px; text-align: center;}"
    estilo += "</style>"


    // const nomeTable = document.getElementById(nomeTabela)
    const win = window.open('', '_self', 'height=700,width=1000');

    win.document.write('<!doctype html>')
    win.document.write('<head>')
    win.document.write('<title>Imprimir resultado</title>')
    win.document.write(estilo)
    win.document.write('</head>')
    win.document.write('<body>')
    win.document.write('<h3>')
    win.document.write(nomeTabela)
    win.document.write('</h3>')
    win.document.write(conteudo)
    win.document.write('© StreetCar  ' + new Date().getFullYear() + '  Todos os direitos reservados.')

    win.document.write('</body>')
    win.document.write('</html>')

    win.print();
}

function imprimirHistorico(nomeTabela, tabela, nome, contato, numeroCartao, valorCartao) {
    const conteudo = document.getElementById(tabela).innerHTML;

    let estilo = "<style>";
    estilo += "table {width: 100%; font: 20px Calibri;}"
    estilo += "th{border: solid 2px #000;}"
    estilo += "table, thead,tbody, td {border: solid 2px #000; border-collapse: collapse;"
    estilo += "padding: 4px 8px; text-align: center;}"
    estilo += "</style>"

    const win = window.open('', '', 'width=600');

    win.document.write('<html>')
    win.document.write('<head>')
    win.document.write('<title>Imprimir resultado</title>')
    win.document.write(estilo)
    win.document.write('</head>')
    win.document.write('<body>')
    win.document.write('<h1>')
    win.document.write(nomeTabela)
    win.document.write('</h1>')
    win.document.write('<hr>')
    win.document.write('<h3>Cliente </h3>' + nome)
    win.document.write('<hr>')
    win.document.write('<b>Nome: </b>' + nome)
    win.document.write('<hr>')
    win.document.write('<b>Contato: </b>' + contato)
    win.document.write('<hr>')
    win.document.write('<b>Número do cartão: </b>' + numeroCartao)
    win.document.write('<hr>')
    win.document.write('<b>Crédito restante: </b>' + valorCartao)
    win.document.write('<hr>')
    win.document.write(conteudo)
    win.document.write('</body>')
    win.document.write('</html>')

    win.print();
}

