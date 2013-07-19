<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Bigui.com - Cadastro</title>
        <link rel="stylesheet" href="estilos/cadastro.css" type="text/css" />
    </head>

    <body>

        <div id="topo">
            <div class="cAlign">
                <a href="#"><img src="images/logo.png" alt="bigui.com"></a> <span><a href="#">Portal</a> <a href="#">Fórum</a> <a href="#">Blog</a></span>
            </div><!-- cAlign -->
        </div><!-- topo -->

        <div class="cAlign">
            <div id="content">
                <div id="left">
                    <ul>
                        <li>eu sou</li>
                        <li>data de nascimento</li>
                        <li>meu e-mail</li>
                        <li>nova senha</li>
                        <li>verificação contra fraudes</li>
                    </ul>
                </div><!-- left -->

                <h1>Cadastre-se, <span>é grátis</span></h1>

                <div id="formulario">
                    <form action="" name="cadastro" method="post">
                        <div>
                            <div class="inputFloat">
                                <span>nome</span>
                                <input type="text" name="nome" class="inputTxt">
                            </div>
                            <div class="inputFloat">
                                <span>sobrenome</span>
                                <input type="text" name="sobrenome" class="inputTxt">
                            </div>
                        </div>

                        <span class="spanHide">eu sou</span>
                        <select name="sexo" id="">
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>

                        <span class="spanHide">data de nascimento</span>
                        <select name="dia">
                            <?php for ($d=1; $d <= 31 ; $d++) {
                                $zero = $d<10 ? 0 : '';
                                echo '<option value="'.$zero.$d.'">'.$zero.$d.'</option>';
                            } ?>
                        </select>

                        <select name="mes">
                            <?php
                            $meses = array('', 'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro');

                            for ($m=1; $m <= 12 ; $m++) {
                                $zero = $m < 10 ? 0 : '';
                                echo '<option value="'.$zero.$m.'">'.$meses[$m].'</option>';
                            } ?>
                        </select>

                        <select name="ano">
                            <?php for ($a=date('Y'); $a >= (date('Y')-100) ; $a--) {
                                echo '<option value="'.$a.'">'.$a.'</option>';
                            } ?>
                        </select>

                        <span class="spanHide">seu e-mail</span>
                        <input type="text" name="email" class="inputTxt">

                        <span class="spanHide">nova senha</span>
                        <input type="text" name="senha" class="inputTxt">

                        <span class="spanHide">verificação contra fraudes</span>
                        <div>
                            <div class="cartchaFloat">
                                <img src="captcha/captcha.php" alt="captcha" width="200" height="60" />
                            </div>
                            <div class="inputFloat">
                                <span>digite os caracteres ao lado</span>
                                <input type="text" name="palavra" class="inputTxt">
                            </div>
                        </div>

                        <span>&nbsp;</span>
                        <input class="submitCadastro" type="submit" name="cadastrar" />
                    </form>
                </div><!-- formulario -->
            </div><!-- content -->
        </div><!-- cAlign -->

        <div id="footer">
            <p>&copy; Copyright Bigui.com - Todos os direitos reservados</p>
        </div>
    </body>
</html>