<?php 
require_once"classes/usuarios.php";
$u=new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/estilo.css">
    <title>Document</title>
</head>
<body>
    <div id="corpo-form">
    <h1>Entrar</h1>
      <form method="POST">
        <input type="email" name="email" placeholder="Usuário">
        <input type="password" name="senha" placeholder="Senha" >
        <input id="botao" type="submit" value="Acessar">
        <a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se!</strong> </a> 
      </form>    
   </div>
   <?php
   if(isset($_POST["email"])){
    $email=addslashes($_POST["email"]);
    $senha=addslashes($_POST["senha"]);

    if(!empty($email)&& !empty($senha)){
        $u->conectar("","", "", "");  
            if($u->msgErro==""){
                if($u->logar($email,$senha)){
                    header("location:AreaPrivada.php");

                }else{
                    ?>
                        <div class="msg-Erro">
                        Email e/ou senha estão incorretos!
                        </div>
                    <?php
                }
            }else{
               ?>
                 <div class="msg-Erro">
                 <?php echo "Erro: ".$u->msgErro;?>
                 </div>
              <?php
            }    
    }else{
      ?>
        <div class="msg-Erro">
          Preencha todos os campos
        </div>
      <?php
    }
   }
   ?>
    
</body>
</html>