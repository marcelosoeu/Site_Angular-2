<?php
include "./BD/usuários.php";
$recebeEmail = $_POST['email'];
$filtraEmail = filter_var($recebeEmail, FILTER_SANITIZE_SPECIAL_CHARS);
$sql_pesq = mysqli_query("SELECT * FROM usuarios WHERE email = '$email'") or die(mysqli_error());
$verifica = mysqli_num_rows($sql_pesq);
?>
<!DOCTYPE HTML>
<html lang="br" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Sistema de Login e Senha Criptografados</title>
        <link href="css/style.css" rel="stylesheet" />
    </head>
    <body>
        <div id="conteudo">
            <?php if ($verifica == 0) { ?>
                <H2>E-mail inválido!</H2> 
                <p>Desculpe, mas o e-mail solicitado não &eacute; cadastrado.</p>
                <p>Entre em contato com o administrador do sistema.<br>
                    Se quiser tentar novamente, <a href="./login.php">clique aqui</a>.<p>
                <p>Obrigado.</p>
            <?php
            } else {
                $result = mysql_fetch_array($sql_pesq);
                $email = $result['email'];

                function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false) {
                    $lmin = 'abcdefghijklmnopqrstuvwxyz';
                    $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $num = '1234567890';
                    $simb = '!@#$%*-';
                    $retorno = '';
                    $caracteres = '';
                    $caracteres .= $lmin;
                    if ($maiusculas) {
                        $caracteres .= $lmai;
                    }
                    if ($numeros) {
                        $caracteres .= $num;
                    }
                    if ($simbolos) {
                        $caracteres .= $simb;
                    }
                    $len = strlen($caracteres);
                    for ($n = 1; $n <= $tamanho; $n++) {
                        $rand = mt_rand(1, $len);
                        $retorno .= $caracteres[$rand - 1];
                    }
                    return $retorno;
                }

                $novasenha = geraSenha(9, true, false);
                $senhamd5 = md5($novasenha);

                $query = "UPDATE usuario SET senha = '$senhamd5' where id_usuario = " . $id_usuario;
                $rs = mysqli_query($conecta, $query);
                $formato = "\nContent-type: text/html";
                $msg = "Olá, $nome. Recebemos uma solicitação para renovar sua senha.<br><br>";
                $msg .= "Seu usuario: <strong>$usuario</strong><br>";
                $msg .= "Sua <strong>nova</strong> senha: <strong>$novasenha</strong><br><br>";
                $msg .= "Caso não tenha solicitado esta ação. Acesse a sua conta e altere sua senha novamente.<br>";
                $msg .= "<br>";
                $msg .= "Obrigado.<br>";
                mail("$email", "Nova Senha", "$msg", "From: Sistema <sistema@sistema.com> " . $formato);
                ?>
                <H2>Senha enviada!</H2> 
                <p>Parabéns. Sua senha foi enviada para o e-mail solicitado.</p>
                <p>Após verificar seu e-mail, retorne à página de login.</p>
                <p>Se preferir, <a href="./login.php">clique aqui</a>.</p>
                <p>Obrigado!</p>
<?php } ?>
    </body>
</html>