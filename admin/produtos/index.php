<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <title>Admin</title>
</head>
<body>
    <nav>
        <div id="voltar"><a href="../">Voltar</a></div>

        <div id="area_atual"><p>Produtos</p></div>

        <div id="perfil">
            <img src="../img/perfil.png" alt="">
            <p>Usuário</p>
        </div>
    </nav>

    <main>
        <p id="caminho">administrar recursos > produtos > </p>

        <section>
            <div class="menu"><a href="produtos/">Cadastrar</a></div>
            <div class="menu"><a href="usuarios/">Editar</a></div>
            <div class="menu"><a href="kits/">Excluir</a></div>
            <div class="menu"><a href="cupons/">Exibir todos</a></div>
        </section>
    </main>
    
    <script>
        document.getElementById('voltar').addEventListener('click', function(e) {
    e.preventDefault();
    history.back();
});
    </script>
</body>
</html>