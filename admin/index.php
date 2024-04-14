<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Admin</title>
</head>
<body>
    <nav>
        <div id="voltar"><a href="../perfil/">Voltar</a></div>

        <div id="area_atual"><p>Administrar recursos</p></div>

        <div id="perfil">
            <img src="../img/perfil.png" alt="">
            <p>Usuário</p>
        </div>
    </nav>

    <main>
        <p id="caminho">administrar recursos &nbsp;> </p>

        <section id="menu">
            <div class="opcoes_menu"><a href="produtos/">Produtos</a></div>
            <div class="opcoes_menu"><a href="usuarios/">Usuários</a></div>
            <div class="opcoes_menu"><a href="kits/">Kits personalizados</a></div>
            <div class="opcoes_menu"><a href="cupons/">Cupons</a></div>
            <div class="opcoes_menu"><a href="estatisticas/">Estatísticas</a></div>
            <div class="opcoes_menu"><a href="">Query livre</a></div>
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