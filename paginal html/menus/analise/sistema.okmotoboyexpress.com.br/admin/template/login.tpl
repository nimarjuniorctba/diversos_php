<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>{$pagina->empresa_nome} - Login</title>
{literal}
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>

            .form-signin
            {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
            }
            .form-signin .form-signin-heading, .form-signin .checkbox
            {
                margin-bottom: 10px;
            }
            .form-signin .checkbox
            {
                font-weight: normal;
            }
            .form-signin .form-control
            {
                position: relative;
                font-size: 16px;
                height: auto;
                padding: 10px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            .form-signin .form-control:focus
            {
                z-index: 2;
            }
            .form-signin input[type="text"]
            {
                margin-bottom: -1px;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
            }
            .form-signin input[type="password"]
            {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
            .account-wall
            {
                margin-top: 20px;
                padding: 40px 0px 20px 0px;
                background-color: #f7f7f7;
                -moz-box-shadow: 1px 2px 2px rgba(0, 0, 0, 0.3);
                -webkit-box-shadow: 1px 2px 2px rgba(0, 0, 0, 0.3);
                box-shadow: 1px 2px 2px rgba(0, 0, 0, 0.3);
                margin: 0 auto;
                max-width:360px;
                margin-top: 30px;
            }
            .login-title
            {
                color: #555;
                font-size: 18px;
                font-weight: 400;
                display: block;
                margin-top: 200px;
            }
            .profile-img
            {
                width: 96px;
                height: 96px;
                margin: 0 auto 10px;
                display: block;
                -moz-border-radius: 50%;
                -webkit-border-radius: 50%;
                border-radius: 50%;
            }
            .need-help
            {
                margin-top: 10px;
            }
            .new-account
            {
                display: block;
                margin-top: 10px;
            }

    </style>


{/literal}


</head>    
<body class="bg-secondary">
  
    <div class="container">
        <div class="row">
            <div class="">
                <h1 class="text-center login-title text-light" style="font-size: 23px;font-weight: 600;">Acesso ao Sistema</h1>
                <div class="account-wall">
                    <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
                    <form class="form-signin" method="POST">
                        <input type="text" class="form-control mb-2" name="login-email" placeholder="Email" value="{$email|default:''}"   required autofocus>
                        <input type="password" class="form-control" name="login-senha" placeholder="Senha" required>
						<label class="text-center">{$mensagem|default:''}</label>
                        <div class="d-grid gap-2 mt-2">
                            <button class="btn btn-primary" name="submit" value="Entrar" type="submit">Acessar</button>
                        </div>                        
                    </form>
                </div>
                <a href="#" class="text-center new-account" style="display:none;">Esqueceu senha</a>
            </div>
        </div>
    </div>    

</body>
</html>