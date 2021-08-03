esse projete tem a finalidade de criar uma loja virtual em que existe um administrador geral que pode gerenciar outros administrador sendo que os administrador tem permição para adicionar e romover produtos essas funcionalidades ainda não estão totalmente desenvolvida mas as imagens usadas nesse projeto são somenta para fins de ilustração

link: http://projectloja.ga/

<b>!! este projeto esta hospedado em um servidor local porisso pode não está disponivel o tempo todo !!</b>

<img src="./screen-shots/Captura de tela de 2021-07-24 15-54-23.png">
<img src="./screen-shots/Captura de tela de 2021-07-24 15-54-28.png">
<img src="./screen-shots/Captura de tela de 2021-07-24 15-54-39.png">
<img src="./screen-shots/Captura de tela de 2021-07-24 15-55-30.png">
<img src="./screen-shots/Captura de tela de 2021-07-24 15-55-41.png">
<img src="./screen-shots/Captura de tela de 2021-07-24 15-55-49.png">


<h1>como instalar</h1>

<ol>
<li>primeiramente vc precisa ter o php e o composer instalado na sua maquina</li>
<li>faça o pull request</li>
<li>rode o comando  composer install</li>
<li>depois execute php artisan migrate para criar as tabelas no banco (antes disso voçê deve configurar o arquivo .env com a conexão com o banco de dados </li>
<li>apos isso voçê deve rodar php artisan storage:link para poder exbir as imagens dos produtos que fez upload</li>
<li>por fim rode  php artisan serve va em http://localhost:8000 clique no icone do perfil despois em cadastrar preecha os formulário em seguida va ao banco de dados e altere seu ranking para 1 pois usuários com ranking 3 não tem permissão  com ranking 2 tem permissão para cadastrar e remover produtos, categorias  ja quem tem o ranking 1 tem permisão para remover e alterar a permissão de usuários(apesar dessa funcionalidade ainda não estar disponivel</li>
<ol>