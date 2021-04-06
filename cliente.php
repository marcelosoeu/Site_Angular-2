<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: login.php");
        exit;
    }
?>
<html>
    <head>
        <title>Cliente</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/cliente.css" type="text/css"/>
        </head>
    <body>
        <section>            
         <div id="user">
                <img src="./IMG/usuario.png" style="width: 80px; height: 80px; float: left; padding-right: 5%;"/>
                <p style="margin: 5% 0% 0% 1%; padding: 3% 0% 0% 2%; font-family: sans-serif; font-weight: bold;">Marcelo Vieira Almeida</p><br>
                <p style="margin: 0% 0% 0% 1%; padding: 0% 0% 0% 2%; font-family: sans-serif; font-weight: bold;">(11) 94174-1969</p>
            </div>
            <div id="btn">
                <a href="./sair.php"><input type="button" value="Sair"/></a> 
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr id="col1">
                        <th style="padding: 2px;">Produto</th>
                        <th style="padding: 2px;">Ficha Técnica</th>
                        <th style="padding: 2%;">Data</th>
                        <th style="padding: 2%;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="col2">
                        <td><img src="./IMG/relogio1.jpg" style="margin: 6% 24%; width: 120px; height: 120px; float: left; padding-right: 5%;"/></td>
                        <td><a href="./DOC/Documentação_TechSControl_TSC0706.pdf" download="Caracteristicas_TSC_0706.pdf"><img src="./IMG/pdf.png" style="width: 80px; height: 80px; margin-top: 2%;"></a></td>
                        <td>10/08/2020</td>
                        <td><strong>PAGO</strong></td>
                    </tr>
               
                    <tr id="col3">
                        <td><img src="./IMG/Catraca_clieite.jpg" style="margin: 4% 24%; width: 125px; height: 125px; float: left; padding-right: 5%;"/></td>
                        <td><a href="./DOC/Documentação_TechSControl_TSC_5906_2020.pdf" download="Caracteristicas_TSC_5906.pdf"><img src="./IMG/pdf.png" style="width: 80px; height: 80px; margin-top: 8%; margin-bottom: 10%;"></a></td>
                        <td>10/09/2020</td>
                        <td><strong>PAGO</strong></td>
                    </tr>
                    <tr id="col4">
                        <td><img src="./IMG/catraca 2.JPG" style="margin: 4% 24%; width: 150px; height: 150px; float: left; padding-right: 5%;"/></td>
                        <td><a href="./DOC/curriculo2020.pdf" download="Curriculo 2020.pdf"><img src="./IMG/pdf.png" style="width: 80px; height: 80px; margin-top: 8%; margin-bottom: 10%;"></a></td>
                        <td>10/10/2020</td>
                        <td><strong>ABERTO</strong></td>
                    </tr>
                    
                </tbody>
            </table>
        </section>
    </body>
</html>