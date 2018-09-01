<?php
/*
  @$an = $_REQUEST['an'];

  if(!$an){
    echo'<meta http-equiv="refresh" content="0;url=/corkexpress/indexuser.php?an=1"';
  }
*/
?>


<div class="page-wrapper">
  <?php
    include 'connections/conn.php';
    $dados = mysqli_fetch_array(mysqli_query($conn,"SELECT func_nome,func_bi,func_nif,func_niss
    ,func_nib,func_datan,func_salario,func_tipodepart,id_categoria FROM funcionarios WHERE id_funcionario= '$_SESSION[userid]'"));
    if(!$dados){
      $x=1;
    }else{
      $x=2;
    }
    include 'connections/diconn.php';
   ?>
  <div class="container-fluid">
                  <!-- Start Page Content -->
                  <div class="row">
                      <div class="col">
                          <div class="card card-outline-info">
                              <div class="card-header">
                                  <h4 class="m-b-0 text-white">Funcionario, <?php echo "$_SESSION[userid]"; ?></h4>
                              </div>
                              <div class="card-body">
                                  <form method="post">
                                      <div class="form-body">
                                          <h3 class="card-title m-t-15">Informaçãos Pessoais</h3>
                                          <hr>
                                          <div class="row">
                                              <div class="col-md-12 ">
                                                  <div class="form-group">
                                                      <label>Nome</label>
                                                      <input type="text" value="<?php if($x==2){echo "$dados[func_nome]";} ?>" placeholder="Introduza o seu nome" name="func_nome" class="form-control">
                                                  </div>
                                              </div>
                                          </div>
                                          <!--/row-->
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>BI</label>
                                                      <input type="text" value="<?php if($x==2){echo "$dados[func_bi]";} ?>" name="func_bi" placeholder="Introduza o seu bi" max="8" class="form-control">
                                                  </div>
                                              </div>
                                              <!--/span-->
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>NIF</label>
                                                      <input type="text" value="<?php if($x==2){echo "$dados[func_nif]";} ?>" name="func_nif" placeholder="Introduza o seu nif" max="9" class="form-control">
                                                  </div>
                                              </div>
                                              <!--/span-->
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>NISS</label>
                                                      <input type="text" value="<?php if($x==2){echo "$dados[func_niss]";} ?>" name="func_niss" placeholder="Introduza o seu niss" max="12" class="form-control">
                                                  </div>
                                              </div>
                                              <!--/span-->
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>NIB</label>
                                                      <input type="text" value="<?php if($x==2){echo "$dados[func_nib]";} ?>" name="func_nib" placeholder="Introduza o seu nib" max="21" class="form-control">
                                                  </div>
                                              </div>
                                              <!--/span-->
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>Data de Nascimento</label>
                                                      <input type="date" value="<?php if($x==2){echo "$dados[func_datan]";} ?>" class="form-control" name="func_datan" placeholder="dd/mm/yyyy">
                                                  </div>
                                              </div>
                                              <!--/span-->
                                          </div>

                                          <h3 class="box-title m-t-40">Informaçãos Profissionais</h3>
                                          <hr>
                                          <div class="row">
                                              <div class="col-md-6 ">
                                                  <div class="form-group">
                                                      <label>Salario</label>
                                                      <input type="number" value="<?php if($x==2){echo "$dados[func_salario]";} ?>" min="0.00" max="10000.00" step="0.01" name="func_salario" placeholder="0.00€" class="form-control">
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                  <label class="control-label">Categoria Profissional</label>
                                                  <select class="form-control custom-select" name="id_categoria"  tabindex="1">
                                                    <?php
                                                      include 'connections/conn.php';

                                                      $catprf = mysqli_query($conn,"SELECT * from categoria_profissional");

                                                        while($row = mysqli_fetch_array($catprf)){
                                                          if($x==2 && $dados['id_categoria'] == $row['id_categoria']){
                                                            echo '<option value="'.$row['id_categoria'].'" Selected>'.$row['descricao_categoria'].'</option>';
                                                          }else{
                                                            echo '<option value="'.$row['id_categoria'].'">'.$row['descricao_categoria'].'</option>';

                                                          }
                                                          }

                                                      include 'connections/diconn.php';

                                                        ?>


                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Tipo de Departamento</label>
                                                <select class="form-control custom-select" name="func_tipodepart"  tabindex="1">
                                                    <option value="1"<?php if($x==2 && $dados['func_tipodepart'] == '1'){echo 'Selected';} ?>>Escritorio</option>
                                                    <option value="2"<?php if($x==2 && $dados['func_tipodepart'] == '2'){echo 'Selected';} ?>>Operacional</option>
                                                </select>
                                            </div>
                                        </div>
                                              <!--/span-->
                                          </div>

                                      </div>
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
