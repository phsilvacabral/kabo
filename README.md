![logo_neon](https://github.com/user-attachments/assets/f6b2b61b-2ac6-4ceb-bbc9-41b16dc51deb)

# Sobre
Kabo foi um projeto de finalização do 3º período da matéria de experiência criativa. Foi usado HTML e CSS puro para o front, além do jQuery. Para o back, usamos PHP e MySQL para o banco de dados. Para o planejamento, fizemos histórias de usuário com critérios de aceite para cada cenário do sistema. Para a definição das histórias, fizemos um quadro PBB (Product Backlog Building), onde identificamos as personas, as features para cada persona, os problemas que essas personas teriam e as espectativas que elas teriam em usar o nosso sistema. Para o planejamento do design, foi feito uma prototipação no Figma: https://www.figma.com/design/nzBZwgl8vvj3ltIDNeNrou/Kab%C3%B4?m=auto&t=kuxl0m1cQbY4U3hW-1

# Instalação e execução
### 1. Aplicativos necessários
- Xampp: usamos o xampp para simular um sevidor, mas de forma local. Descompacte o projeto dentro da pasta "htdocs" do xampp. 
- MySql Workbench: recomendamos usar o workbench para a instalação do banco de dados. O arquivo de backup do banco de dados se chama "Database.sql". Abra o aplicativo, vá na aba Server, clique em Data import e importe o arquivo. Talvez seja necessário a criação de uma nova instância do banco de dados para se adequar às configurações de conecção do projeto, que são: localhost:3306 (server name), root (user), PUC@1234 (password), kabo (bd name). Ou se preferir, altere essas configurações (connection.php) para se adequar à sua instancia.
- Navegador (projeto desenvolvido usando o Chrome).
### 2. Ative o servidor apache do Xampp
### 3. Abra o navegador e acesse http://localhost/kabo/

# Funcionalidades
- ### Gerenciamento de produtos do site
Cadastre produtos adicionando uma imagem e especificações dele. Essa funcionalidade só está disonível para usuários que são adiministradores.
![image](https://github.com/user-attachments/assets/98c72bb7-344e-4872-ba74-96ab86be83c0)

- ### Adição de produtos ao carrinho
Abra a página de qualquer produto e adione-o ao carrinho, contando que esteja logado.
![image](https://github.com/user-attachments/assets/93e4f579-3d0d-4a83-9625-8c9727d93d80)

- ### Finalização de compra
Depois de ter adicionado produtos ao carrinho, finalize a compra.
![image](https://github.com/user-attachments/assets/3f28e1ce-0fa8-40d8-9cc7-8264dfdede72)

- ### Gerenciamento de cartões de pagamento
Gerencie seus cartões, eles são necessários para a finalização de compras.
![image](https://github.com/user-attachments/assets/2a823ff6-08c0-4d18-9f0c-27f992f7ff43)

- ### Outras
Além dessas funcionalidades principais, temos as basicas, que são o gerenciamento de usuário, login, cadastro, edição e exclusão de usuário. Também incluimos pesquisa por marcas e modelos de produtos, e pesquisa por pedidos na página de histórico de pedidos.
