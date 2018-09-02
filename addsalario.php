
<?php
/*
  @$an = $_REQUEST['an'];

  if(!$an){
    echo'<meta http-equiv="refresh" content="0;url=/corkexpress/indexadmin.php?an=1"';
  }
*/
?>
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="card card-outline-info">


    <div class="card-header">
      <h4 class="card-title text-white">Emitir Recibo</h4>
    </div>
                                        <div class="card-body">
                                            <div class="card-title text-white">
                                                <h3 class="text-center title-2">Recibo</h3>
                                            </div>
                                            <hr>
                                            <form action="" method="post" novalidate="novalidate">
                                                <div class="form-group">

                  </div>
                  <div class="form-group has-success">

                      <label class="control-label">Funcionário</label>

                              <h4 class="card-title text-white">Listagem de Funcionarios</h4>
                              </div>
                              <div class="table-responsive m-t-40">
                                  <table id="myTable" class="table table-bordered table-striped">
                                      <thead>
                                          <tr role="row">
                                                <th style="text-align:left;">Nome</th>
                                                  <th style="text-align:left;">NIF</th>
                                                    <th style="text-align:left;">Salario</th>
                                                    <th style="text-align:left;">Action</th>

                                          </tr>
                                      </thead>
                                      <tbody>




                                                          <?php
                                                            include 'connections/conn.php';

                                                            $dados = mysqli_query($conn, "SELECT id_funcionario,func_nome,func_nif,id_categoria,func_tipodepart,func_salario from funcionarios");

                                                              $i = 0;
                                                              while($row = mysqli_fetch_array($dados)){
                                                                echo '<tr><td style="text-align:left;">'.$row['func_nome'].'</td>
                                                                <td>'.$row['func_nif'].'</td>';

                                                                echo '<td>'.$row['func_salario'].' €</td>
                                                                <td>

                                                                  <button type="submit" name="btemitir" class="btn btn-info m-b-10 m-l-5">Emitir Recibo</button>
                                                                </td>
                                                                </tr>';

                                                                  $i+=1;
                                                            }

                                                            include 'connections/diconn.php';
                                                           ?>


                                                        </tbody>
                                                    </table>
            <?php
                                                    if(isset($_POST["btemitir"]))
                                                    {

                                                      //Codigo para emviar para a base de dados
                                                      include 'connections/conn.php';

                                                      mysqli_query($conn,"SELECT FROM recibos Where nif_funcionario = '$_POST[func_nif]'");

                                                      include 'connections/diconn.php';


                                                      echo '<meta http-equiv="refresh" content="0;url=/corkexpress/indexadmin.php?an=8"';

                                                    }
?>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        </div>
