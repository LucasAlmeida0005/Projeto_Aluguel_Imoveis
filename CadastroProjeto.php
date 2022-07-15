
<?php

   if(isset($_POST['submit'])){
      
    //  print_r('<br>');
    //  print_r('NOME: '.$_POST['nome']);
    //  print_r('<br>');
    //  print_r('SOBRENOME:'.$_POST['sobrenome']);
    //  print_r('<br>');
    //  print_r('CPF: '.$_POST['cpf']);
    //  print_r('<br>');
    //  print_r('E-MAIL: '.$_POST['email']);
    //  print_r('<br>');
    //  print_r('SENHA: '.$_POST['senha']);
    //  print_r('<br>');
    //  print_r('TELEFONE: '.$_POST['telefone']);
    //  print_r('<br>');
    //  print_r('DATA NASCIMENTO: '.$_POST['datanasc']);

    include_once('configuracao.php');

    $nome = strtolower($_POST['nome']);
    $sobre = strtolower($_POST['sobrenome']);
    $cpf = $_POST['cpf'];
    $email = strtolower($_POST['email']);
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $datanasc = $_POST['datanasc'];

    $result = mysqli_query($conexao, "INSERT INTO cadastro(nome,sobrenome,cpf,email,senha,telefone,datanasc) 
        values ('$nome', '$sobre', '$cpf', '$email', '$senha', '$telefone', '$datanasc')");
   }
   
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Formulário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="assets/img//undraw_house_searching_re_stk8.svg" alt="">
        </div>
        <div class="form">

         <div class="login-button">
                <button><a href="Login_v15\index.php">Entrar</a></button>
            </div>

            <form action="CadastroProjeto.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                   
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Primeiro Nome</label>
                        <input id="nome" type="text" name="nome" placeholder="Digite seu primeiro nome" required>
                    </div>

                    <div class="input-box">
                        <label for="sobrenome">Sobrenome</label>
                        <input id="sobrenome" type="text" name="sobrenome" placeholder="Digite seu sobrenome" required>
                    </div>
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box">
                        <label for="telefone">Celular</label>
                        <input id="telefone" type="tel" name="telefone" placeholder="(xx) xxxx-xxxx" required>
                    </div>

                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="number" name="cpf" placeholder="123.456.789-01" required>
                    </div>

                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>


                    <div class="input-box">
                        <label for="data">Data de nascimento</label>
                        <input type="date" name="datanasc" required>
                    </div>

                </div>

                <div class="continue-button">
                    <input type="submit" name="submit" value="Continuar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<!--
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Area Cadastro</title>
    <link rel="stylesheet" type="text/css" href="Cadastro.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
   
     <header class="header">
        
         <img src="airbnb.PNG" class="iconLogo">
         <img src="usuario.PNG" class="iconUser">

          <nav class="MenuDrop">

              <input type="checkbox" id="check">
              <label for="check" class="checkbtn">
                     <img src="menu.png" class="icon">
              </label>

               <ul>
                   <li><a href="#">Início</a></li>
                   <li><a href="#">Sobre</a></li>
                   <li><a href="#">Serviços</a></li>
                   <li><a href="#">Contato</a></li>
               </ul>
            </nav>

         <div class="bordaMenu">
         
         </div>
     </header>

        <form action="Busca.php" method="GET">
        <div class="search-box search-especial">
            <input class="search-text"   type="text"   name="consulta" placeholder="Pesquisar">
            
              <a class="search-btn" type="submit" href="Busca.php">
                    <button class="btnpesquisa" type="submit">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                    width="31" height="34" 
                    viewBox="0 0 172 172"
                    style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M70.34479,19.35053c-13.06797,0 -26.13541,4.97135 -36.07916,14.9151c-19.8875,19.8875 -19.8875,52.27083 0,72.15833c9.94375,9.94375 22.97865,14.91772 36.1474,14.91772c13.16875,0 26.20365,-4.97397 36.1474,-14.91772c19.75313,-19.8875 19.75103,-52.27083 -0.13647,-72.15833c-9.94375,-9.94375 -23.01119,-14.9151 -36.07916,-14.9151zM70.27917,27.27917c11.01875,0 22.03698,4.16353 30.36823,12.62915c16.79688,16.79688 16.79635,44.07605 0.13385,60.87292c-16.79687,16.79688 -44.07605,16.79688 -60.87292,0c-16.79687,-16.79687 -16.79687,-44.07605 0,-60.87292c8.33125,-8.33125 19.3521,-12.62915 30.37085,-12.62915zM70.27917,35.34167c-9.27187,0 -18.0073,3.62708 -24.59167,10.34583c-6.31562,6.31563 -9.80885,14.51303 -10.21197,23.38178c-0.13437,2.28437 1.61302,4.03072 3.8974,4.1651h0.13385c2.15,0 3.89687,-1.7474 4.03125,-3.8974c0.26875,-6.85312 3.08905,-13.16927 7.79218,-18.00677c5.10625,-5.10625 11.8271,-7.92603 18.94897,-7.92603c2.28438,0 4.03125,-1.74688 4.03125,-4.03125c0,-2.28437 -1.74687,-4.03125 -4.03125,-4.03125zM47.03125,86c-2.2264,0 -4.03125,1.80485 -4.03125,4.03125c0,2.2264 1.80485,4.03125 4.03125,4.03125c2.2264,0 4.03125,-1.80485 4.03125,-4.03125c0,-2.2264 -1.80485,-4.03125 -4.03125,-4.03125zM112.01941,108.17188c-1.02461,0 -2.03242,0.40365 -2.77148,1.2099c-1.6125,1.6125 -1.6125,4.16457 0,5.6427l3.35938,3.35938c-0.80625,1.6125 -1.2099,3.3599 -1.2099,5.24115c0,3.225 1.20885,6.31615 3.49322,8.60053l17.20105,16.93072c2.41875,2.41875 5.50728,3.62708 8.5979,3.62708c3.09062,0 6.18177,-1.20885 8.60052,-3.49323c4.70313,-4.70312 4.70313,-12.36145 0,-17.06458l-17.19843,-17.20105c-2.28438,-2.28437 -5.37552,-3.49322 -8.60052,-3.49322c-1.88125,0 -3.62865,0.40365 -5.24115,1.2099l-3.35937,-3.35937c-0.80625,-0.80625 -1.84661,-1.2099 -2.87122,-1.2099zM123.49115,119.4599c1.075,0 2.14947,0.40365 2.82135,1.2099l17.06458,17.06458c1.6125,1.6125 1.6125,4.16458 0,5.6427c-1.6125,1.6125 -4.16458,1.6125 -5.6427,0l-17.06458,-16.93073c-0.80625,-0.80625 -1.2099,-1.8802 -1.2099,-2.9552c0,-1.075 0.40365,-2.14948 1.2099,-2.82135c0.80625,-0.80625 1.74635,-1.2099 2.82135,-1.2099z"></path></g></g></svg>
                    
            </button>
                </a> 
        </div>
        </form>
    </nav>
  

     
     <p class="info">Área de Cadastro do Usuário</p>
     <hr class="hrheader">

     <form class="lista" action="CadastroProjeto.php" method="POST">

        <div>
            <h3>Nome</h3>
            <input type="text" name="nome" maxlength="25" placeholder="Nome" required>
        </div>

        <div>
            <h3>Sobrenome</h3>
            <input type="text" name="sobrenome" maxlength="25" placeholder="Sobrenome" required>
            
        </div>

         <div>
            <h3>CPF</h3>
            <input type="number" name="cpf" max="99999999999" placeholder="CPF: ex '999999999-99'" required>
            
        </div>

         <div>
            <h3>E-mail</h3>
            <input type="text" name="email" maxlength="35" placeholder="E-mail" required>
             
        </div>

        <div>
            <h3>Senha</h3>
            <input type="password" name="senha" maxlength="20" placeholder="Senha" required>
             
        </div>

         <div>
            <h3>Telefone</h3>
            <input type="number" name="telefone" maxlength="13" placeholder="Nº telefone" required>
             
        </div>

         <div>
            <h3>Data Nascimento</h3>
            <input type="date" name="datanasc" placeholder="Data de Nascimento" required>
            
        </div>


        <h4>Caso já possua uma conta clique em entrar e você será redirecionado.</h4>
        
      <button type="submit" name="submit" class="cadbtn">Cadastrar</button>
       <button name="Entrar" class="cadbtn">Entrar</button>
    </form>

        <footer class="container">
            <div class="footer">
                <div class="grid-8 footer_historia">
                        <h3>Sobre nós</h3>
                        <p> Nós somos alunos da fatec ourinhos e estamos desenvolvendo um site para aluguel de imóveis parecido
                            com o airbnb. Resposáveis: Bruno, Lucas, Mateus, Paulo.</p>
                </div>

                <div class="grid-8 footer_contato">
                        <h3>Contato</h3>
                        
                            <p> 14 9999 9999 </p>
                            <p> contato@Hotel.com </p>
                            <p> Ourinhos - SP </p>
                        
                    </div>

                    <div class="grid-8 footer_redes">
                        <h3>Redes sociais</h3>
                        <ul>
                            <li><a href="https://www.facebook.com/bruno.piga.1" target="_blank" ><img src="facebook.svg" alt="Facebook Bruno"></a></li>
                            <li><a href="http://instagram.com" target="_blank"><img src="instagram.svg"  alt="Instagram Lucas"></a></li>
                            <li><a href="http://twitter.com" target="_blank"><img src="twitter.svg"  alt="Twitter Mateus"></a></li>
                        </ul>
                    </div>
            </div>
        </footer>
   
            
    

 </body>
</html>
-->