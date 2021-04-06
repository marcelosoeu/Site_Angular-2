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
         
                    
                </tbody>
            </table>
        </section>
    </body>
</html>