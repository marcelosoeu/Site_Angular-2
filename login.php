<!DOCTYPE html>
<?php
    include "./BD/usuários.php";
    $u = new Usuario;
?>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/login.css" type="text/css"/>
        
    </head>
    <body>
        <section>
            <div class="logo">
                <img src="./IMG/projeto-logo.png">
            </div>
            <form method="POST">
                <h1>Bem-Vindo!</h1>
                <div class="label-float">
                    <input id="email" type="email" name="email" placeholder="Login" required/>
                </div>
                <div class="label-float">
                    <input id="senha" type="password" name="senha" placeholder="Senha" required/>
                </div>
                <input type="submit" id="entrar" value="Entrar"/>
				<a href="./index.php">Cancelar</a>
                <div class="link">
                    <a href="./cadastrar.php">Cadastre-se</a><br>
                    <a href="./arqSenha.php">Esqueceu a Senha</a><br>
                </div>
            </form>           
        </section>
        <?php
            if(isset($_POST['email']))
            {
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);
                //verificar se esta preenchido
                if(!empty($email) && !empty($senha))
                {
                    $u->conectar("techscontrol","localhost","root","");
                    if($u->msgErro == "")
                    {
                        if($u->logar($email,$senha))
                        {
                            header("location: cliente.php");
                        }
                        else
                        {                        
                            ?>
                              <div class="msg-erro">
                                    Email e/ou Senha estão incorretos
                              </div>                            
                            <?php
                        }
                    }
                    else
                    {    
                        ?>
                            <div class="msg-erro">
                                 <?php echo "Erro: ".$u->msgErro; ?>
                            </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <div class="msg-erro">
                            Preencher todos os campos!!
                        </div>
                    <?php
                }
            }    
        ?>
    </body>
</html>