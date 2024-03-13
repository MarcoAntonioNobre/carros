function carregarConteudo(controle){
    fetch('controle.php', {
        method: 'POST', headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }, body: 'controle=' + encodeURIComponent(controle),
    })
        .then(response => response.text())
        .then(data => {

            document.getElementById('show').innerHTML= data;
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
}
