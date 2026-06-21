<html>
<head>
<title>jquery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<head>
<body>


 <h1>{$minha_var}</h1> 
 <hr>
<a href="" class="btn-floating green"><i class="material-icons">Ok</i></a>

 {foreach from=$array item=dados}
 <b>Nome:</b>{$dados.nome}<br>
 <b>Sobrenome:</b>{$dados.sobrenome}<br>
 {/foreach}

</body>
</html>





