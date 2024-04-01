<h1>
  Bem vindo a StreetCar
</h1>


<p>Esse trabalho foi realizado em conjunto com a turma da Vale, ficamos resposáveis pela parte de criação do sistema que fará a venda dos carros criados por eles.</p>

<h3>Como testar nosso sistema</h3>

<p>Antes de começar o teste certifique-se que tenha instalado o XAMPP e o Query Browser MySQL.</p>

<p>Caso não tenha instalado temos um pequeno passo a passo de como instalar, se tiver pode pular essa parte.</p>

<h2>Instalando o XAMPP</h2>

<p>Para baixar o XAMPP acesse o link abaixo e baixe o XAMPP para a versão mais atual do PHP.</p>

https://www.apachefriends.org/pt_br/download.html

<p>Após baixar inicie a instalação, aceite os termos e de NEXT nas próximas telas. Abra ele e dê Start no apache e no MySQL.</p>

<h2>Instalando o Query Browser</h2>

<p>Com o XAMPP instalado e inicializado, baixe o Query Browser pelo link abaixo e faça a instalação, como a do XAMPP.</p>

https://downloads.mysql.com/archives/query/
<hr>
<p>Abra-o e clique nos três pontos ao lado de "Storage Connection".</p>
<p>Clique em "Add New Connection". E configure da seguinte forma.</p>
<br>
<p>Connection: Nome de sua preferência</p>
<p>Username: root.</p>
<p>Password: deixe vazio.</p>
<p>Hostname: localhost.</p>
<p>Schema: Nome de sua preferência.</p>

<p>Clique em <b>"Apply"</b> e feche essa tela. Na primeira tela, vá no <b>STORAGE CONNECTION</b> e selecione a conexão que acabou de criar e clique em <b>"Ok"</b> e confirme a criação do banco.</p>

<br>


<h2>Baixando nosso sistema</h2>

<p>Para baixar nosso sistema é simples. Na página inicial do repositório, clique em <b>"Code > Download ZIP"</b>, o download será iniciado.</p>

<p>Após a conclusão do download extraia a o arquivo ZIP, agora recorte o arquivo e percorra o seguinte caminho pelas suas pastas.</p>

<p> <b> C: xampp > htdocs> cole o arquivo que recortou aqui </b>.</p>

<p>Agora um passo importante, a restauração do banco.</p>



<h3>Restaurando o banco</h3>

<p>Com o Query Browser aberto siga esse passo a passo:</p>

<p>No canto superior esquerdo clique em "Tools > MySQL Administrator > Restore". </p>

<p>Nessa tela procure por "Open Backup File", no canto inferior direito.</p>

<p>Siga esse caminho:</p>

<p> <b> C: xampp > htdocs> carros </b>.</p>

<p>Ao abrir a pasta "carros", terá um arquivo <b>.sql</b>, selecione-o e depois clique em "Start Restore" que fica ao lado de "Open Backup File".</p>

<h3>Abrindo o sistema no navegador</h3>

<p>Com tudo isso feito, vá para seu browser preferido e cole o seguinte caminho:</p>

<b>localhost/carros/</b>

<br>

<h2>Acessando o sistema</h2>

<p>Para conseguir acessar o sistema você precisa digitar as credenciais, cpf e senha do ADM.</p>

<p>Os ADMs possuem um CPF com um único número repetido 11 vezes, por exemplo "111.111.111-11" até o número 5. A senha é sequencial de 1 a 8.</p>

<br>

<p>Pronto, você já pode testar nosso sistema em seu computador.</p>


<h2>Processo de desenvolvimento</h2>

<p>Nós dividimos o nosso grupo em duas equipes, metade do grupo ficou responsável pela parte do Front-end e a outra metade pelo Back-end.</p>

<p>Tentamos solucionar ao máximo os possíveis bugs no sistema, caso encontre um, por favor reporte-nos para que possamos continuar a evoluir o sistema.</p>

<p>O tempo de desenvolvimento do site foi de aproximadamente duas semanas, e descobrimos e solucionamos vários bugs nessa última semana. Adicionamos mensagens de erro, como por exemplo, uma mensagem caso o valor da compra ultrapasse o limite do cartão, se o cartão não existir, caso você pesquise um código de veículo que não existe, etc.</p>

<p>Implementamos um sistema de impressão, caso queira o total de vendas ou a lista de vendas impressa no papel. Também temos a opção de ver o histórico de compras de cada usuário.</p>

<br>

<h2>Quem somos</h2>

<p>A StreetCar surgiu com a proposta de trazer um sistema simples e agradável para o melhor gerenciamento das vendas dos veículos produzidos, contamos com um sistema gráfico que se atualiza assim que um novo valor é computado, facilidade no uso e o melhor suporte para melhor lhe atender. </p>

<br>

<h2>Nosso time</h2>

- Arthur Prates (Desenvolvimento Back-end) : https://github.com/Arthur-Prates;
- Clarisse (Desenvolvimento Back-End) :
- Franciele Nobre (Desenvolvimento Front-end) : https://github.com/FrancieleNobre
- Isadora (Design do Front-end) :
- Marco Antônio (Desenvolvimento Back-end) : https://github.com/MarcoAntonioNobre
- Rebeka (Design do Front-end) :
