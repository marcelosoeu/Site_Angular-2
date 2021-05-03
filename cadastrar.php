<!DOCTYPE html>
<?php
    require_once "./BD/usuários.php";
    $u = new Usuario;
?>
<html>
    <head>
        <title>Cadastrar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/cadastrar.css" type="text/css"/>
        <script src="./JS/FunctionBaner.js"></script>
    </head>
    <body>
        <form method="POST">
            <h1>CADASTRE-SE</h1>
            <div class="label-float">
                <input type="text" id="Nome" name="nome" placeholder="Nome" required maxlength="50"/>
            </div>
            <div class="label-float"> 
                <input type="tel" id="Telefone" name="telefone" placeholder="Telefone" required maxlength="12"/>
            </div>
            <div class="label-float"> 
                <input type="email" id="Email" name="email" placeholder="E-Mail" required maxlength="50"/>
            </div>
            <div class="label-float">
                <input type="password" id="Senha" name="senha" placeholder="Senha" required maxlength="12"/>
            </div>
            <div class="label-float"> 
                <input type="password" id="ConSenha" name="conSenha" placeholder="Confirmar Senha" required maxlength="12"/>
            </div>
            <div>
                <input type="submit" id="btnCadastrar" value="Cadastrar"/>
                <input type="reset" id="btnCancelar" value="Cancelar"/>
            </div>
        </form>
        <?php
            //verificar se clicou no botão
            if(isset($_POST['nome']))
            {
                $nome = addslashes($_POST['nome']);
                $telefone = addslashes($_POST['telefone']);
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);
                $confirmarSenha = addslashes($_POST['conSenha']);
                //verificar se esta preenchido
                if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
                {
                   $u->conectar("techscontrol","localhost","root","");
                   if($u->msgErro == "")//se está tudo ok
                   {
                       if($senha == $confirmarSenha){
                       
                           if($u->cadastrar($nome,$telefone,$email,$senha))
                            {
                               ?>
                                <div id="msg-sucesso">
                                    Cadastrado com sucesso!
                                 </div>
                               <?php
                           }else{
                               ?>
                                 <div class="msg-erro">
                                     Email já cadastrado
                                 </div>
                               <?php
                           }
                       }else{
                          ?>
                                 <div class="msg-erro">
                                     Senhas não conferem
                                 </div>
                               <?php
                       }                      
                       
                   }else{
                       ?>
                         <div class="msg-erro">
                               <?php echo "Erro: ".$u->msgErro; ?>
                         </div>                        
                       <?php
                   }
                }else{
                    ?>
                      <div class="msg-erro">
                          Preencher todos os campos
                      </div>
                    <?php
                }
            }
        ?>
    </body>
</html>

