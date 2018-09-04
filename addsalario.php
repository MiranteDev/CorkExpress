
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

                                            </div>
                                            <hr>
                                            <form action="" method="post" novalidate="novalidate">
                                                <div class="form-group">

                  </div>
                  <div class="form-group has-success">

                      <label class="control-label">Funcionários</label>

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
                                                                echo '<form method="post" action="/corkexpress/indexadmin.php?an=12"><tr><td style="text-align:left;">'.$row['func_nome'].'</td>
                                                                <td>'.$row['func_nif'].'</td>';
                                                                echo '';
                                                                echo '

                                                                  <td style="text-align:left;">'.$row['func_salario'].'
                                                                </td><td>
                                                                  <input type="hidden" name="id_funcionario" value="'.$row['id_funcionario'].'">
                                                                  <button type="submit" name="btemitir" class="btn btn-info m-b-10 m-l-5">Emitir Recibo</button>
                                                                </td>
                                                                </tr></form>';

                                                                  $i+=1;
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
