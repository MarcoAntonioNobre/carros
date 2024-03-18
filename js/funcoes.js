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
                    console.log(data)
                    if (data.success) {
                        addOuEditSucesso('Você', 'success', 'adicionou')
                        form.removeEventListener('submit', submitHandler)
                        btnCarro.disabled = false;
                        // alert(data['message']);
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


function redireciona() {
    window.location.href = 'dashboard.php';

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
            carroEditModalInstancia.hide();
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
                    console.log(data)
                    if (data.success) {
                        addOuEditSucesso('Você', 'info', 'editou')
                        form.removeEventListener('submit', submitHandler)
                        btnEditCarro.disabled = false;
                        // alert(data['message']);
                        carregarConteudo('listarCarros');
                    } else {
                        btnEditCarro.disabled = false;
                        //alert(data['message'])
                        addErro()
                    }
                })
        }
        formCarro.addEventListener('submit', submitHandler);
    })
}

function deletarCarro(controle, id) {

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
                //alert(data.message)
                carregarConteudo('listarCarro')
            } else {
                addErro()
                //alert(data.message)
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
}


// function abrirModalDelFoto(idfoto) {
//
//     // if (nomeEdit) {
//     //     nomeEdit.focus();
//     // }
//     // nomeEdit.value = nome;
//     // diferenciaisEdit.value = diferenciais;
//     // // fotoEdit.value = foto;
//     // valorEdit.value = valor;
//     // propEdit.value = prop;
//     document.getElementById('idDeleteFoto').value = idfoto
//     abrirFecharModalCarro('mdlDeleteFoto', 'A');
// }
//
// function abrirFecharModalDelFoto(idModal, abrirOuFechar) {
//     const modalInstancia = new bootstrap.Modal(document.getElementById(idModal));
//     if (abrirOuFechar === 'A') {
//         modalInstancia.show();
//     } else {
//         modalInstancia.hide();
//     }
// }


// const fotoDeleteModalInstancia = new bootstrap.Modal(document.getElementById('mdlDeleteFoto'));
// const fotoDeleteModal = document.getElementById('mdlDeleteFoto');
//
// if (fotoDeleteModal) {
//     const formFoto = document.getElementById('frmDeleteFoto');
//
//     fotoDeleteModal.addEventListener('shown.bs.modal', () => {
//         const submitHandler = function (event) {
//             event.preventDefault();
//             alert('OI')
//             fotoDeleteModalInstancia.hide();
//             const form = event.target;
//             const formData = new FormData(form);
//             formData.append('controle', 'deleteFoto');
//             fetch('controle.php', {
//                 method: 'POST',
//                 body: formData,
//             })
//                 .then(response => response.json())
//                 .then(data => {
//                     console.log(data)
//                     if (data.success) {
//                         addOuEditSucesso('Você', 'success', 'deletou')
//                         form.removeEventListener('submit', submitHandler)
//                         btnEditCarro.disabled = false;
//                         // alert(data['message']);
//                         carregarConteudo('listarFoto');
//                     } else {
//                         btnEditCarro.disabled = false;
//                         //alert(data['message'])
//                         addErro()
//                     }
//                 })
//         }
//         formFoto.addEventListener('submit', submitHandler);
//     })
// }


function abrirModalEditFoto(idfoto) {
    document.getElementById('idEditFoto').value = idfoto
    abrirFecharModalEditFoto('mdlEditFoto', 'A');
    alert('OI')
}

function abrirFecharModalEditFoto(idModal, abrirOuFechar) {
    const modalInstancia = new bootstrap.Modal(document.getElementById(idModal));
    if (abrirOuFechar === 'A') {
        modalInstancia.show();
        alert('Show')
    } else {
        modalInstancia.hide();
    }
}


const fotoEditModal = document.getElementById('mdlEditFoto');

if (fotoEditModal) {
    const formEditFoto = document.getElementById('frmEditFoto');
    fotoEditModal.addEventListener('shown.bs.modal', () => {
        const submitHandler = function (event) {
            event.preventDefault();

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
                    console.log(data);
                    if (data.success) {
                        addOuEditSucesso('Você', 'info', 'editou');
                        form.removeEventListener('submit', submitHandler);
                        carregarConteudo('listarFoto');
                    } else {
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
                //alert(data.message)
                carregarConteudo('listarFoto')
            } else {
                addErro()
                //alert(data.message)
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
