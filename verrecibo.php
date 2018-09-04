<div class="page-wrapper">
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="card card-outline-info">
    <div class="card-header">
        <h2 class="m-b-0 text-white">Recibos</h2>
    </div>

    <hr>
    <div class="row">
      <div class="col">

        <h2>Filtros</h2>
          <div class="card-body">
            <div class="row">
      <div class="col-lg-4">
        <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text btn-info" style="color:white;" id="basic-addon1">Ano</span>
  </div>
  <form method="post" action="/corkexpress/indexuser.php?an=5&page=recibo">


  <select class="form-control custom-select" name="ano"  tabindex="1">
      <?php for($i=2015;$i<=2020;$i++){echo "<option value=\"$i\">$i</option>";} ?>
  </select></div>

  </div>
  <div class="col-lg-4">
    <div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text btn-info" style="color:white;" id="basic-addon1">Mês</span>
</div>
<select class="form-control custom-select" name="mes"  tabindex="1">
  <?php for($i=1;$i<=12;$i++){echo "<option value=\"$i\">$i</option>";} ?>

</select></div>

</div>
<div class="col-lg-4">
<button type="submit" class="btn btn-info btn-block" name="bt_pesquisa">Pesquisar</button>
</form>
<?php



 ?>
</div>
  </div>
</div>
</div>
</div>
</div>

<?php
@$page = $_REQUEST['page'];

switch ($page) {
  case 'recibo':
    // code...
    include 'recibo.php';
    break;

      default:
      echo '  <div class="row">
          <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2>Não exite recibo para a sua pesquisa!</h2>
                </div>



              </div>
            </div>
        </div>';
    break;
    }

 ?>

</div>
</div>
</div>
