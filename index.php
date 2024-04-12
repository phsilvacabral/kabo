<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>index</title>
</head>

<body>
    <?php
    include ('connection.php');
    session_start();
    ?>
    <iframe src="barrasNav.php" class="iframenav"></iframe>

    <section>
        <div class="slideshow-container">

            <a href="" class="mySlides">
                <img src="img/i581338.jpeg" class="propaganda">
            </a>

            <a href="" class="mySlides">
                <img src="img/mouseTeclado.jpg" class="propaganda">
            </a>

            <a href="" class="mySlides">
                <img src="img_principais/Component 2.png" class="propaganda">
            </a>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>

        <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                if (n > slides.length) { slideIndex = 1 }
                if (n < 1) { slideIndex = slides.length }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slides[slideIndex - 1].style.display = "block";
            }
        </script>
    </section>

    <section class="moveboxfundo">
        <div class="boxfundo">

            <div class="joinboxelements">
                <button class="setaesquerda"></button>

                <div class="caixas">
                    <div class="bordacaixas">
                        <a href="" class="linkcaixa">
                            <img src="img/produto-2615-cadeira-gamer-75495.jpg" alt="" class="fotodentro">
                            <div class="linha0">
                                <div class="moverdescricaocaixa">
                                    <div class="escritacaixa"></div>
                                </div>
                                <p class="precocaixa">R$ </p>
                                <p class="parcelamentopreco">10 x 190,00 sem juros no cartão de crédito</p>
                            </div>
                        </a>
                    </div>
                    <div class="bordacaixas">
                        <a href="" class="linkcaixa">
                            <img src="img/produto-2615-cadeira-gamer-75495.jpg" alt="" class="fotodentro">
                            <div class="linha0">
                                <div class="moverdescricaocaixa">
                                    <div class="escritacaixa">Lorem ipsum, dolor sit amet consectetur</div>
                                </div>
                                <p class="precocaixa">R$ </p>
                                <p class="parcelamentopreco">10 x 190,00 sem juros no cartão de crédito</p>

                            </div>
                        </a>
                    </div>
                </div>

                <button class="setadireita"></button>
            </div>

            <div class="linkmovecaixasrecomendadas">
                <div class="movecaixasrecomendadas">
                    <a href=""><img src="img/i581338.jpeg" class="caixasrecomendadas"></a>
                    <a href=""><img src="img/i581338.jpeg" class="caixasrecomendadas"></a>
                    <a href=""><img src="img/i581338.jpeg" class="caixasrecomendadas"></a>
                    <a href=""><img src="img/i581338.jpeg" class="caixasrecomendadas"></a>

                </div>
                <div class="movecaixasrecomendadas">
                    <a href=""><img src="img/i581338.jpeg" class="caixasrecomendadas"></a>
                    <a href=""><img src="img/i581338.jpeg" class="caixasrecomendadas"></a>
                    <a href=""><img src="img/i581338.jpeg" class="caixasrecomendadas"></a>
                    <a href=""><img src="img/i581338.jpeg" class="caixasrecomendadas"></a>

                </div>
            </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const joinBoxElements = document.querySelectorAll('.joinboxelements');

            joinBoxElements.forEach(function (joinBox) {
                const setaEsquerda = joinBox.querySelector('.setaesquerda');
                const setaDireita = joinBox.querySelector('.setadireita');
                const caixas = joinBox.querySelector('.caixas');

                setaDireita.addEventListener('click', function () {
                    caixas.scrollBy({
                        left: 700,
                        behavior: 'smooth'
                    });
                });

                setaEsquerda.addEventListener('click', function () {
                    caixas.scrollBy({
                        left: -700,
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>

    <iframe src="Rodape.php" class="iframefooter"></iframe>
</body>

</html>