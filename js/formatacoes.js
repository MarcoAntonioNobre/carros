// // FUNCAO DE FORMATACAOD DE HORA
function atualizarDataHora() {
    const dataHoraElement = document.getElementById("dataHoraTexto");
    const horaElement = document.getElementById("HoraTexto");
    const agora = new Date();
    const meses = [
      "Janeiro",
      "Fevereiro",
      "Março",
      "Abril",
      " Junho",
      "Julho",
      "Agosto",
      "Setembro",
      "Outubro",
      "Novembro",
      "Dezembro",
    ];
    const dia = agora.getDate();
    const mes = meses[agora.getMonth()];
    const ano = agora.getFullYear();
    const hora = agora.getHours();
    const minutos = agora.getMinutes();
    const segundos = agora.getSeconds();
    const dataFormatada = `${dia} de ${mes} ${ano} | `;
    const horaFormatada = `${hora}:${minutos}:${segundos}`;
    dataHoraElement.textContent = dataFormatada;
    horaElement.textContent = horaFormatada;
  }
  setInterval(atualizarDataHora, 1000);

//  /FUNCAO SENHA MASCARADA

function mostrarsenha() {
    var inputPass = document.getElementById('senha');
    var btnShowPass = document.getElementById('btn-senha');

    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text');
        btnShowPass.classList.replace('bi-eye-slash', 'bi-eye');
    }
    else {
        inputPass.setAttribute('type', 'password');
        btnShowPass.classList.replace('bi-eye', 'bi-eye-slash');
    }
}

