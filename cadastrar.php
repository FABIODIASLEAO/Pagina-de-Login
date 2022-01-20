<?php

require_once"classes/usuarios.php";
$u =new Usuario;

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
    <div id="corpo-form-cad">
    <h1>Cadastro</h1>
      <form method="POST">
        <input type="text" name="nome"placeholder="Nome Completo" maxlength="30">
        <input type="text" name="telefone"placeholder="Telefone" maxlength="30">
        <input type="email" name="email"placeholder="E-mail" maxlength="40">
        <input type="password" name="senha"placeholder="Senha" maxlength="15">
        <input type="password" name="confSenha"placeholder="Confirmar senha" maxlength="15">
        <input id="botao" type="submit" value="Cadastrar">
        
      </form>    
   </div>
   <?php
   //verificar se clicou no botao 
   if(isset($_POST["nome"])){
     $nome=addslashes($_POST["nome"]);
     $telefone=addslashes($_POST["telefone"]);
     $email=addslashes($_POST["email"]);
     $senha=addslashes($_POST["senha"]);
     $confSenha=addslashes($_POST["confSenha"]);

     if(!empty($nome)&&!empty($telefone)&& !empty($email)&& !empty($senha)&& !empty($confSenha)){
        $u->conectar("projeto_login","localhost", "root", "");
            if($u->msgErro==""){
                if($senha==$confSenha){
                        if($u->cadastrar($nome, $telefone, $email, $senha)){
                        ?>
                        <div id="msg-sucesso">
                          Cadastrado com sucesso! Acesse para entrar!
                        </div>
                        <?php
                        }else{
                          ?>
                            <div class="msg-Erro">
                              Email ja cadastrado
                            </div>
                          <?php
                      }
                  }else{
                    ?>
                    <div class="msg-Erro">
                      Senha e confirmar senha não correspondem
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