<?php session_start() ?>

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

                    <?php
                    if ( isset( $_SERVER['REQUEST_METHOD']) AND $_SERVER['REQUEST_METHOD'] == 'POST') {

                        extract($_POST);

                        if ($nome == '' OR strlen($nome) < 4) {
                            echo 'Escreva seu nome corretamente';
                        } elseif ($sobrenome == '' OR strlen($sobrenome) < 6) {
                            echo 'Escreva seu sobrenome corretamente';
                        } elseif ( $email == '' ){
                            echo 'Escreva seu e-mail';
                        } elseif ( ! preg_match("/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\-]+\.[a-z]{2,4}$/i",$email)){
                            echo 'Este e-mail é inválido';
                        } else {

                            include ('classes/DB.class.php');

                            $verificar = DB::getConn()->prepare('SELECT `id` FROM `usuarios` WHERE `email`=?');
                            if ($verificar->execute(array($email))) {
                                if ($verificar->rowCount()  >= 1) {
                                    echo 'Este e-mail já esta cadastro em nosso sistema';
                                } elseif ( $senha == '' OR strlen($senha) < 4 ) {
                                    echo 'Digite sua senha, ela tem que ter mais de 4 caracteres';
                                } elseif ( strtolower($captcha) <> strtolower($_SESSION['captchaCadastro']) ) {
                                    echo 'O código digitado no captcha não corresponde com a imagem.';
                                } else {

                                    $senhaInsert = sha1($senha);
                                    $nascimento = "$ano-$mes-$dia";

                                    $inserir = DB::getConn()->prepare('INSERT INTO `usuarios` SET `email`=?, `senha`=?, `nome`=?, `sobrenome`=?, `sexo`=?, `nascimento`=?, `cadastro`=NOW() ');

                                    if ( $inserir->execute(array($email, $senhaInsert, $nome, $sobrenome, $sexo, $nascimento)) ) {
                                        header('Location: ./');
                                    }
                                }
                            }
                        }
                    }
                    ?>

                    <form action="" name="cadastro" method="post">
                        <div>
                            <div class="inputFloat">
                                <span>nome</span>
                                <input type="text" name="nome" class="inputTxt" value="<?php echo $nome ?>">
                            </div>
                            <div class="inputFloat">
                                <span>sobrenome</span>
                                <input type="text" name="sobrenome" class="inputTxt" value="<?php echo $sobrenome ?>">
                            </div>
                        </div>

                        <span class="spanHide">eu sou</span>
                        <select name="sexo" id="">
                            <option <?php echo $sexo == 'masculino' ? 'selected="selected"' ?> value="masculino">Masculino</option>
                            <option <?php echo $sexo == 'feminino' ? 'selected="selected"' ?> value="feminino">Feminino</option>
                        </select>

                        <span class="spanHide">data de nascimento</span>
                        <select name="dia">
                            <?php for ($d=1; $d <= 31 ; $d++) {
                                $zero = $d<10 ? 0 : '';
                                echo '<option '.($d==$dia ? 'selected="selected"').' value="'.$zero.$d.'">'.$zero.$d.'</option>';
                            } ?>
                        </select>

                        <select name="mes">
                            <?php
                            $meses = array('', 'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro');

                            for ($m=1; $m <= 12 ; $m++) {
                                $zero = $m < 10 ? 0 : '';
                                echo '<option '.($zero.$m==$mes ? 'selected="selected"').' value="'.$zero.$m.'">'.$meses[$m].'</option>';
                            } ?>
                        </select>

                        <select name="ano">
                            <?php for ($a=date('Y'); $a >= (date('Y')-100) ; $a--) {
                                echo '<option '.($a==$ano ? 'selected="selected"').' value="'.$a.'">'.$a.'</option>';
                            } ?>
                        </select>

                        <span class="spanHide">seu e-mail</span>
                        <input type="text" name="email" class="inputTxt" value="<?php echo $email ?>">

                        <span class="spanHide">nova senha</span>
                        <input type="text" name="senha" class="inputTxt" value="<?php echo $senha ?>">

                        <span class="spanHide">verificação contra fraudes</span>
                        <div>
                            <div class="cartchaFloat">
                                <img src="captcha/captcha.php" alt="captcha" width="200" height="60" />
                            </div>
                            <div class="inputFloat">
                                <span>digite os caracteres ao lado</span>
                                <input type="text" name="captcha" class="inputTxt">
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