<h3 class="text-center">Perfil de Usuario</h3><hr>
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
    <table class="table table-bordered">
      <tbody>
      <tr>
        <td height="210" width="200" rowspan="5"><img height="250" width="250" src="bootstrap/img/users.png"></td><td><strong>Nome: </strong><?php echo htmlentities($_SESSION['user']['nome']); ?></td>
      </tr>
      <tr>
        <td><strong>Matricula: </strong><?php echo htmlentities($_SESSION['user']['matricula']); ?></td>
      </tr>
      <tr>
        <td><strong>E-mail: </strong><?php echo htmlentities($_SESSION['user']['email']); ?></td>
      </tr>
      <tr>
        <td><strong>Tipo de Usu&aacute;rio: </strong><?php if($_SESSION['user']['tipo']==1) echo 'Administrador'; else echo 'Padrão'; ?></td>
      </tr>
      <tr>
        <td><strong>Senha: </strong>...........</td>
      </tr>
      </tbody>
    </table>
  </div>
  </div>
  <div class="text-center">
    <a href="views.php?header=perfil&acao=atualizar-usuario&id=<?php echo $_SESSION['user']['matricula']; ?>" class="btn btn-primary" role="button">Atualizar</a>
  </div>
</div>
