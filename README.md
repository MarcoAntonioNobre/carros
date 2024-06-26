
<h1 align="center" style="display: inline_block">
  
  Bem vindo a StreetCar

</h1>

<p align="center" style="display: inline_block">Esse trabalho foi realizado em conjunto com a turma da Vale, <br> ficamos resposáveis pela parte de criação do sistema que fará a venda dos carros criados por eles.</p>

<br>

<a name="ancora"></a>
# Sumário
- [Tecnologias usadas](#ancora10)
- [Como testar o sistema](#ancora1)
- [Instalando o XAMPP](#ancora2)
- [Instalando o Query Browser](#ancora3)
- [Baixando nosso sistema](#ancora4)
- [Restaurando o banco](#ancora5)
- [Acessando o sistema](#ancora6)
- [Processo de desenvolvimento](#ancora7)
- [Quem somos?](#ancora8)
- [Nosso time](#ancora9)

<br>

<a id="ancora10"></a>
<h2>Tecnologias usadas</h2>
<p align="center">
  <a>
    <img src="https://skillicons.dev/icons?i=php,js,html,css,bootstrap" />
  </a>
</p>


<br>

<a id="ancora1"></a>
<h2>Como testar nosso sistema</h2>

<p>Antes de começar o teste, certifique-se que tenha instalado o <b>XAMPP</b> e o <b>Query Browser MySQL</b>.</p>

<p>Caso não tenha instalado temos um pequeno passo a passo de como instalar, se tiver pode pular essa parte.</p>

<br>

<a id="ancora2"></a>
<h2>Instalando o XAMPP</h2>

<p>Para baixar o <b>XAMPP</b> acesse o link abaixo e baixe o <b>XAMPP</b> para a versão mais atual do PHP.</p>

https://www.apachefriends.org/pt_br/download.html

<p>Após baixar inicie a instalação, aceite os termos e de <b>Next</b> nas próximas telas. Abra ele e dê <b>Start</b> no <b>Apache</b> e no <b>MySQL</b>.</p>

<br>

<a id="ancora3"></a>
<h2>Instalando o Query Browser</h2>

<p>Com o <b>XAMPP</b> instalado e inicializado, baixe o Query Browser pelo link abaixo e faça a instalação, como a do <b>XAMPP</b>.</p>

https://downloads.mysql.com/archives/query/

<hr>

<p>Abra-o e clique nos três pontos ao lado de <b>"Storage Connection"</b>.</p>

<p>Clique em <b>"Add New Connection"</b>. E configure da seguinte forma.</p>

<br>

<p>Connection: Nome de sua preferência</p>

<p>Username: root.</p>

<p>Password: deixe vazio.</p>

<p>Hostname: localhost.</p>

<p>Schema: Nome de sua preferência.</p>

<p>Clique em <b>"Apply"</b> e feche essa tela. Na primeira tela, vá no <b>Storage Connection</b> e selecione a conexão que acabou de criar e clique em <b>"Ok"</b> e confirme a criação do banco.</p>

<br>

<a id="ancora4"></a>
<h2>Baixando nosso sistema</h2>

<p>Para baixar nosso sistema é simples. Na página inicial do repositório, clique em <b>"Code > Download ZIP"</b>, o download será iniciado.</p>

<p>Após a conclusão do download extraia a o arquivo ZIP, agora recorte o arquivo e percorra o seguinte caminho pelas suas pastas.</p>

<p> <b> C: xampp > htdocs> cole o arquivo que recortou aqui </b>.</p>

<p>Agora um passo importante, a restauração do banco.</p>

<br>

<a id="ancora5"></a>
<h2>Restaurando o banco</h2>

<p>Com o Query Browser aberto siga esse passo a passo:</p>

<p>No canto superior esquerdo clique em "Tools > MySQL Administrator > Restore". </p>

<p>Nessa tela procure por "Open Backup File", no canto inferior direito.</p>

<p>Siga esse caminho:</p>

<p> <b> C: xampp > htdocs> carros </b>.</p>

<p>Ao abrir a pasta <b>"carros"</b>, terá um arquivo <b>.sql</b>, selecione-o e depois clique em <b>"Start Restore"</b> que fica ao lado de <b>"Open Backup File"</b>.</p>

<br>

<h2>Abrindo o sistema no navegador</h2>

<p>Com tudo isso feito, vá para seu browser preferido e cole o seguinte caminho:</p>

<b>localhost/carros/</b>

<br>

<a id="ancora6"></a>
<h2>Acessando o sistema</h2>

<p>Para conseguir acessar o sistema você precisa digitar as credenciais, cpf e senha do administrador.</p>

<p>Os ADMs possuem um CPF com um único número repetido 11 vezes, por exemplo "111.111.111-11" até o número 5. A senha é sequencial de 1 a 8.</p>

<br>

<p>Pronto, você já pode testar nosso sistema em seu computador.</p>

<a id="ancora7"></a>
<h2>Processo de desenvolvimento</h2>

<p>Nós dividimos o nosso time em duas equipes, a primeira equipe ficou responsável pela parte do Front-end e a outra equipe pelo Back-end.</p>

<p>Tentamos solucionar ao máximo os possíveis bugs no sistema, caso encontre um, por favor reporte-nos para que possamos continuar a evoluir o sistema.</p>

<p>O tempo de desenvolvimento do site foi de aproximadamente duas semanas, e descobrimos e solucionamos vários bugs nessa última semana. Adicionamos mensagens de erro, como por exemplo, uma mensagem caso o valor da compra ultrapasse o limite do cartão, se o cartão não existir, caso você pesquise um código de veículo que não existe, etc.</p>

<p>Implementamos um sistema de impressão, caso queira o total de vendas ou a lista de vendas impressa no papel. Também temos a opção de ver o histórico de compras de cada usuário.</p>

<br>

<a id="ancora8"></a>
<h2>Quem somos?</h2>

<p>A StreetCar surgiu com a proposta de trazer um sistema simples e agradável para o melhor gerenciamento das vendas dos veículos produzidos, contamos com um sistema gráfico que se atualiza assim que um novo valor é computado, facilidade no uso e o melhor suporte para melhor lhe atender. </p>

<br>

<a id="ancora9"></a>
<h2>Nosso time</h2>

- [Arthur Prates](https://github.com/Arthur-Prates) - Desenvolvedor(a) Back-end ;
- [Clarisse](https://github.com/cclar13) - Desenvolvedor(a) Back-end ;
- [Franciele Nobre](https://github.com/FrancieleNobre) - Desenvolvedor(a) Front-end ;
- [Isadora](https://github.com/) - UX Design ;
- [Marco Antônio](https://github.com/MarcoAntonioNobre) - Desenvolvedor(a) Back-end ;
- [Rebeka](https://github.com/Rebekabraga) - UI Design.
