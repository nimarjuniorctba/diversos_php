<html>
    <head>
        <title>Seleções</title>
    </head>
    <body>
        <?php
            $numero = 120;
            $media = 2;
          
          /* if(($numero/$media)>6){
                echo "acima da média<br>";
            }else{
                echo "abaixo da media<br>";
            }    

            switch (($numero/$media)){
                case '5':
                    echo "Média 5!<br>";
                    break;
                case '6':
                    echo "Média 6!<br>";
                    break; 
                    default:
                    echo "fora do esperado: ".($numero/$media).'<br>';                   
            }*/


            function valMedia($numeros,$medias){
                echo    ($numeros/$medias)>6? 'acima da media<br>': 'abaixo da media<br>';
            }


             valMedia($numero,$media);   

        ?>
    </body>

</html>