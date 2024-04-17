<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Kabo</title>
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

            <div class="titulocaixa">
                <p>Pcs pré-montados</p>
                <a href="">Ver todos ></a>
            </div>
            <div class="joinboxelements">
                <button class="setaesquerda">&#10094;</button>

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

                <button class="setadireita">&#10095;</button>
            </div>

            <div class="titulocaixa">
                <p>CPU</p>
                <a href="">Ver todos ></a>
            </div>
            <div class="joinboxelements">
                <button class="setaesquerda">&#10094;</button>

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

                <button class="setadireita">&#10095;</button>
            </div>
            <div class="titulocaixa">
                <p>Placa de vídeo</p>
                <a href="">Ver todos ></a>
            </div>
            <div class="joinboxelements">
                <button class="setaesquerda">&#10094;</button>

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

                <button class="setadireita">&#10095;</button>
            </div>
            <div class="titulocaixa">
                <p>Memória</p>
                <a href="">Ver todos ></a>
            </div>
            <div class="joinboxelements">
                <button class="setaesquerda">&#10094;</button>

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

                <button class="setadireita">&#10095;</button>
            </div>
            <div class="titulocaixa">
                <p>Placa Mãe</p>
                <a href="">Ver todos ></a>
            </div>
            <div class="joinboxelements">
                <button class="setaesquerda">&#10094;</button>

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

                <button class="setadireita">&#10095;</button>
            </div>
            <div class="titulocaixa">
                <p>Gabinete</p>
                <a href="">Ver todos ></a>
            </div>
            <div class="joinboxelements">
                <button class="setaesquerda">&#10094;</button>

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

                <button class="setadireita">&#10095;</button>
            </div>
            
            
            <div class="titulocaixa">
                <p>Marcas</p>
            </div>

            <div class="linkmovecaixasrecomendadas">
                <div class="movecaixasrecomendadas">
                    <a href="" class="bordacaixasrecomendadas">
                        <img src="img/i581338.jpeg" class="caixasrecomendadas">
                        <p class="marca">Samsung</p>
                        <p class="verprodutos">ver produtos ></p>
                    </a>
                    <a href="" class="bordacaixasrecomendadas">
                        <img src="img/i581338.jpeg" class="caixasrecomendadas">
                        <p class="marca">Samsung</p>
                        <p class="verprodutos">ver produtos ></p>
                    </a>
                    <a href="" class="bordacaixasrecomendadas">
                        <img src="img/i581338.jpeg" class="caixasrecomendadas">
                        <p class="marca">Samsung</p>
                        <p class="verprodutos">ver produtos ></p>
                    </a>
                    <a href="" class="bordacaixasrecomendadas">
                        <img src="img/i581338.jpeg" class="caixasrecomendadas">
                        <p class="marca">Samsung</p>
                        <p class="verprodutos">ver produtos ></p>
                    </a>

                </div>
                <div class="movecaixasrecomendadas">
                <a href="" class="bordacaixasrecomendadas">
                        <img src="img/i581338.jpeg" class="caixasrecomendadas">
                        <p class="marca">Samsung</p>
                        <p class="verprodutos">ver produtos ></p>
                    </a>
                    <a href="" class="bordacaixasrecomendadas">
                        <img src="img/i581338.jpeg" class="caixasrecomendadas">
                        <p class="marca">Samsung</p>
                        <p class="verprodutos">ver produtos ></p>
                    </a>
                    <a href="" class="bordacaixasrecomendadas">
                        <img src="img/i581338.jpeg" class="caixasrecomendadas">
                        <p class="marca">Samsung</p>
                        <p class="verprodutos">ver produtos ></p>
                    </a>
                    <a href="" class="bordacaixasrecomendadas">
                        <img src="img/i581338.jpeg" class="caixasrecomendadas">
                        <p class="marca">Samsung</p>
                        <p class="verprodutos">ver produtos ></p>
                    </a>

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
