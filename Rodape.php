<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Rodapé</title>
</head>

<body>
    <?php
    include('connection.php');
    session_start();
    ?>
    <footer>
        <div id="dados_div">
            <div class="dados_footer">
                <p>Desenvolvedores</p>
                <ul>
                    <li>Pedro Cabral <a href="https://www.linkedin.com/in/pedro-henrique-silva-cabral-2b820420b/" target="_blank"><img src="img/linkedin.png" alt="linkedin"></a><a href="https://github.com/phsilvacabral" target="_blank"><img src="img/github.png" alt="github"></a></li>
                    <li>Daniel Musse <a href="linkedin.com" target="_blank"><img src="img/linkedin.png" alt="linkedin"></a><a href="github.com" target="_blank"><img src="img/github.png" alt="github"></a></li>
                    <li>João Hernandes <a href="linkedin.com" target="_blank"><img src="img/linkedin.png" alt="linkedin"></a><a href="github.com" target="_blank"><img src="img/github.png" alt="github"></a></li>
                </ul>
            </div>

            <div class="dados_footer">
                <p>Marcas</p>
                <ul>
                    <li>Nvidia</li>
                    <li>Kingston</li>
                    <li>Asus</li>
                    <li>Samsung</li>
                </ul>
            </div>

            <div class="dados_footer" id="links_footer">
                <p>Departamentos</p>
                <ul>
                    <li><a href="nacionais/">Memória</a></li>
                    <li><a href="internacionais/">Processador</a></li>
                    <li><a href="blog/">Placa de vídeo</a></li>
                    <li><a href="perfil/">Gabinete</a></li>
                    <li><a href="123recompensa/">Monitor</a></li>
                </ul>
            </div>

            <div class="dados_footer" id="links_footer">
                <p>Links</p>
                <ul>
                    <li><a href="nacionais/">Home</a></li>
                    <li><a href="internacionais/">Perfil</a></li>
                    <li><a href="blog/">Carrinho</a></li>
                </ul>
            </div>

            <div id="copy123folhas"><a href="../">&copy;Kabo</a></div>
        </div>
    </footer>

</body>

</html>