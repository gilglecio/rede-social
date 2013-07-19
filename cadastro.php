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
                            <option value="">selecione seu genero</option>
                        </select>

                        <span class="spanHide">data de nascimento</span>
                        <select name="dia">
                            <option value="">Dia:</option>
                        </select>

                        <select name="mes">
                            <option value="">Mês:</option>
                        </select>

                        <select name="ano">
                            <option value="">Ano:</option>
                        </select>

                        <span>seu e-mail</span>
                        <input type="text" name="email" class="inputTxt">

                        <span>nova senha</span>
                        <input type="text" name="senha" class="inputTxt">

                        <div>
                            <div class="cartchaFloat">
                                <img src="#" alt="captcha" width="200" height="60" />
                            </div>
                            <div class="cartchaFloat">
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
    </body>
</html>