<?php/*
  @$an = $_REQUEST['an'];

  if(!$an){
    echo'<meta http-equiv="refresh" content="0;url=/corkexpress/indexadmin.php?an=1"';
  }
*/
?>

<div class="page-wrapper">
  <div class="container-fluid">

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Listar Escalões de IRS </h4>
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr role="row">
                          <th style="text-align:left;">Escalão</th>
                            <th style="text-align:left;">Percentagem De Desconto do funcionario</th>
                              <th style="text-align:left;">Percentagem De Desconto da Empresa</th>

                    </tr>
                </thead>
                <tbody>



                  <?php
                    include 'connections/conn.php';

                    $dados = mysqli_query($conn, "SELECT * from irs");

                      while($row = mysqli_fetch_array($dados)){
                      echo '<tr><td style="text-align:left;">'.$row['escalao'].'</td>
                      <td>'.$row['funcionario_desconto'].'</td>
                      <td>'.$row['empresa_desconto'].'</td></tr>';
                    }

                    include 'connections/diconn.php';
                   ?>


                </tbody>
            </table>

        </div>
    </div>
    <hr>
    <div class="card-body">
        <h4 class="card-title">Listar Escalões de SS</h4>
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr role="row">
                      <th style="text-align:left;">Escalão</th>
                        <th style="text-align:left;">Percentagem De Desconto do funcionario</th>
                          <th style="text-align:left;">Percentagem De Desconto da Empresa</th>
                    </tr>
                </thead>
                <tbody>



                  <?php
                    include 'connections/conn.php';

                    $dados = mysqli_query($conn, "SELECT * from ss");

                    while($row = mysqli_fetch_array($dados)){
                    echo '<tr><td style="text-align:left;">'.$row['escalao'].'</td>
                    <td style="text-align:left;">'.$row['funcionario_desconto'].'</td>
                    <td style="text-align:left;">'.$row['empresa_desconto'].'</td></tr>';
                  }

                    include 'connections/diconn.php';
                   ?>


                </tbody>
            </table>

        </div>
    </div>

</div>
</div>
</div>
