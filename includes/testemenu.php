<?php
  session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light" style="min-height: 70px; background-color: black;">
  <a class="nav-link" href="index.php"><img src="img/LOGO.png" style="max-height: 40px;"></a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link h4" href="#" style="font-family: 'Varela Round', sans-serif; color: yellow;">Quem somos?</a>
      </li>
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
      include 'includes/busca.php'
    ?>
    <?php 
      require_once 'includes/funcoes.php';
      require_once 'core/conexao_mysql.php';
      require_once 'core/sql.php';
      require_once 'core/mysql.php';

      foreach ($_GET as $indice => $dado) {
        $$indice = limparDados($dado);
      }
      $data_atual = date('Y-m-d H:i:s');

      $criterio = [['data_postagem', '<=',$data_atual]];
    ?>
    <div class="card-body text-right text-white">
      <a href="#" class="btn btn-link btn-sm" role="buttom">
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
            <a class="nav-link h4 text-warning" href="usuario_formulario.php" style="font-family: 'Varela Round', sans-serif;">Cadastre-se</a>
          </li>
           <li class="nav-item active">
            <a class="nav-link h4 text-warning" href="login_formulario.php" style="font-family: 'Varela Round', sans-serif;">Login</a>
          </li>
        </ul>
      </div>
    <?php endif ?>
  </div>
</nav>