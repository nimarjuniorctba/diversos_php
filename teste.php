<html>
    <head>
        <title>Pagina 01</title>
    </head>
    <body>

        <?php

            if (isset($_GET['nome'])) {
                echo "A variável 'nome' foi enviada via GET e tem o valor: " . $_GET['nome'];
            } else {
                echo "A variável 'nome' não foi enviada.";
            }

        ?>

    </body>

</html>

