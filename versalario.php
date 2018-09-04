<?php
  if(!@$_POST['id_funcionario']){
    if(!@$_SESSION['userid']){
      echo'<meta http-equiv="refresh" content="0;url=/corkexpress/indexadmin.php?an=2"';
    }else{
      echo'<meta http-equiv="refresh" content="0;url=/corkexpress/indexuser.php"';
    }
  }else{
    include 'connections/conn.php';
    $dados = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM funcionarios WHERE id_funcionario='$_POST[id_funcionario]'"));

    include 'connections/diconn.php';
  }

?>

<div class="page-wrapper">

  <div class="container-fluid">
                  <!-- Start Page Content -->
                  <div class="row">
                      <div class="col">
                          <div class="card card-outline-info">
                              <div class="card-header">
                                  <h4 class="m-b-0 text-white">Funcionario: <?php echo "$dados[func_nome]"; ?></h4>
                                  <input type="hidden" id="id" name="id" value=" <?php echo "$dados[id_funcionario]"; ?> ">
                              </div>
                              <div class="card-body">
                                  <form method="post">
                                      <div class="form-body">
                                          <h3 class="card-title m-t-15">Informações Fiscais</h3>
                                          <hr>
                                          <div class="row">
                                              <div class="col-md-12 ">
                                                  <div class="form-group">
                                                    </div>
                                              </div>
                                          </div>
                                          <!--/row-->
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>BI</label>
                                                      <input type="text" value="<?php echo "$dados[func_bi]"; ?>" name="func_bi" placeholder="Introduza o seu bi" max="8" class="form-control" disabled>
                                                  </div>
                                              </div>
                                              <!--/span-->
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>NIF</label>
                                                      <input type="text" value="<?php echo "$dados[func_nif]"; ?>" name="func_nif" placeholder="Introduza o seu nif" max="9" class="form-control" disabled>
                                                  </div>
                                              </div>
                                              <!--/span-->
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>NISS</label>
                                                      <input type="text" value="<?php echo "$dados[func_niss]"; ?>" name="func_niss" placeholder="Introduza o seu niss" max="12" class="form-control" disabled>
                                                  </div>
                                              </div>
                                              <!--/span-->
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>NIB</label>
                                                      <input type="text" value="<?php echo "$dados[func_nib]"; ?>" name="func_nib" placeholder="Introduza o seu nib" max="21" class="form-control" disabled>
                                                  </div>
                                              </div>
                                              <!--/span-->
                                          </div>





                                          <h3 class="box-title m-t-40">Contablidade</h3>
                                          <hr>
                                          <div class="row">
                                              <div class="col-md-6 ">
                                                  <div class="form-group">
                                                      <label>Salario Base</label>
                                                      <input type="text" value="<?php echo "$dados[func_salario]"; ?>  €" name="func_salario"  class="form-control" disabled>
                                                  </div>



                                                  </select>

                                                    <?php
                                                    if($dados['func_tipodepart'] == 2){

                                                    echo'<label>Turno</label><select class="form-control custom-select" name="turno_mensal"  id="turno_mensal" tabindex="1">
                                                        <option value="1">Manhã</option>
                                                        <option value="2">Tarde</option>
                                                        <option value="3">Noite</option>
                                                    </select> ';}
                                                    if($dados['func_tipodepart'] == 1){

                                                    echo'<label>Escritório</label><select class="form-control custom-select" type="hidden" name="turno_mensal"  id="turno_mensal" tabindex="1">
                                                        <option value="4"></option>
                                                    </select> ';}
                                                    ?>


                                                    </div>



                                          </div>
                                          <div id="contablidade">
                                          </div>
                                          <br>
                                          <div class="input-group-prepend">
                                            <span class="input-group-text btn-info" style="color:white;" id="basic-addon1">Ano</span>
                                          </div>
                                          <select class="form-control custom-select" name="func_tipodepart"  tabindex="1">
                                              <?php for($i=2015;$i<=2020;$i++){echo "<option value=\"$i\">$i</option>";} ?>
                                          </select></div>

                                          </div>
                                          <div class="col-lg-4">
                                            <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text btn-info" style="color:white;" id="basic-addon1">Mês</span>
                                        </div>
                                        <select class="form-control custom-select" name="func_tipodepart"  tabindex="1">
                                          <?php for($i=1;$i<=12;$i++){echo "<option value=\"$i\">$i</option>";} ?>

                                        </select></div>
                                          <br>
                                      <div class="form-actions">
                                          <button type="submit" name="bt_save" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
                                          <button type="button" class="btn btn-inverse">Cancel</button>
                                      </div>
                                  </form>
                                  <?php


                                        if(isset($_POST["bt_save"])){
                                          include 'connections/conn.php';

                                            mysqli_query($conn,"INSERT INTO funcionarios (func_nome,func_bi,func_nif,func_niss
                                            ,func_nib,func_datan,func_salario,func_tipodepart,id_categoria) VALUES (
                                              '$_POST[func_nome]','$_POST[func_bi]','$_POST[func_nif]','$_POST[func_niss]'
                                              ,'$_POST[func_nib]','$_POST[func_datan]','$_POST[func_salario]'
                                              ,'$_POST[func_tipodepart]','$_POST[id_categoria]'
                                            )");

                                          include 'connections/diconn.php';
                                        }
                                  ?>

                              </div>
                          </div>
                      </div>
                  </div>
</div>
