<html lang="br" class="no-js">
    <head>
        <title>Sistema de Login e Senha Criptografados</title>
        <link href="css/esqueceuSenha.css" rel="stylesheet" />
    </head>
    <body>
        <div id="conteudo">
            <h1>Sistema de login e senha criptografados – recuperação de Senha</h1>
            <div class="borda"></div>
            <p>Informe o email utilizado no login, para que um nova senha seja enviada!</p>
            <!--            <form action="recuperar_senha.php" method="post">-->
            <form action="esqueceuSenha.php" method="POST">                
                <fieldset>
                    <legend>Recuperar senha</legend>
                    <label for="email">E-Mail:</label> <input type="email" name="email" id="email" required>
                    <input type="submit" value="Enviar">
                </fieldset>
            </form>
        </div>
    </body>
</html>