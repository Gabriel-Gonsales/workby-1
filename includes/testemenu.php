<?php
  session_start();
?>
<head>
  <link rel="stylesheet" href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light" style="min-height: 70px; background-color: black;">

  <a class="nav-link" href="index.php"><img src="img/LOGO.png" style="max-height: 40px;"></a>
   <button class="bg-warning navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link h4" href="quem_somos.php" style="font-family: 'Varela Round', sans-serif; color: yellow;">Quem somos?</a>
      </li>
      <?php if ((isset($_SESSION['login'])) && ($_SESSION['login']['usuario']['usuario_adm'] != 1)): ?>
        <li class="nav-item active">
          <a class="nav-link h4" href="post_formulario.php" style="font-family: 'Varela Round', sans-serif; color: yellow;"> Incluir serviço</a>
        </li>
      <?php endif; ?>
      <?php if ((isset($_SESSION['login'])) && ($_SESSION['login']['usuario']['usuario_adm'] === 1)) : 
        ?>
        <li class="nav-item active">
          <a class="nav-link h4" href="denuncias.php" style="font-family: 'Varela Round', sans-serif; color: yellow;"> Denúncias</a>
        </li>
                <li class="nav-item active">
          <a class="nav-link h4" href="usuarios.php" style="font-family: 'Varela Round', sans-serif; color: yellow;"> Usuários</a>
        </li>
      <?php endif; ?> 
    </ul>
    <?php if (isset($_SESSION['login'])): ?>
    <?php 
      require_once 'includes/funcoes.php';
      require_once 'core/conexao_mysql.php';
      require_once 'core/sql.php';
      require_once 'core/mysql.php';

      foreach ($_GET as $indice => $dado) {
        $$indice = limparDados($dado);
      }

    ?>
    <div class="card-body text-right text-white">
      <a href="perfil_usuario.php" class="btn btn-link btn-sm" role="buttom">
        <i class="far fa-user-circle" style="font-size: 25px; color: yellow; font-weight: bold;"></i>
      </a>
      <a href="core/usuario_repositorio.php?acao=logout"
             class="btn btn-link btn-sm" role="buttom">
        <i class="fas fa-sign-out-alt" style="font-size: 25px; color: yellow; font-weight: bold;"></i>
      </a>
    </div>      
    <?php else: ?>
      <div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link h4" href="usuario_formulario.php" style="font-family: 'Varela Round', sans-serif; color: yellow;">Cadastre-se</a>
          </li>
           <li class="nav-item active">
            <a class="nav-link h4" href="login_formulario.php" style="font-family: 'Varela Round', sans-serif; color: yellow;">Login</a>
          </li>
        </ul>
      </div>
    <?php endif ?>
  </div>
</nav>