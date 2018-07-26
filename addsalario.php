<div class="page-wrapper">
  <div class="container-fluid">


    <div class="card-header">Emissão de Recibos </div>
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h3 class="text-center title-2">Recibo</h3>
                                            </div>
                                            <hr>
                                            <form action="" method="post" novalidate="novalidate">
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Referente ao mes de:</label>

 <div class="mes">
   <div>
     <span>
       <label for="month">Mes:</label>
       <select id="month" name="month">
         <option selected>January</option>
         <option>February</option>
         <option>March</option>
         <option>April</option>
         <option>May</option>
         <option>June</option>
         <option>July</option>
         <option>August</option>
         <option>September</option>
         <option>October</option>
         <option>November</option>
         <option>December</option>
       </select>
     </span>


     <span>

            <label for="year">Year:</label>
            <select id="year" name="year" >
              <?php

              
                  for($year=date("Y")-5;$year<=date("Y")+5;$year++){
                    if(date("Y")==$year){
                      echo "<option selected value=\"$year\">$year</option>";
                    }else{
                        echo "<option value=\"$year\">$year</option>";
                    }

                  }
                ?>

            </select>
      </span>


   </div>
 </div>
                  </div>
                  <div class="form-group has-success">

                      <label class="control-label">Funcionário</label>
                      <select class="form-control custom-select" name="funcionario" id="funcionario"  tabindex="1">
                        <?php
                          include 'connections/conn.php';

                          $catprf = mysqli_query($conn,"SELECT id_funcionario,func_nome from funcionarios");

                            while($row = mysqli_fetch_array($catprf)){
                              echo '<option value="'.$row['id_funcionario'].'">'.$row['func_nome'].'</option>';

                            }



                          include 'connections/diconn.php';

                            ?>


                      </select>

                      <div id="campos">

                      </div>



                  </div>


                  <div class="form-group">
                      <label for="cc-number" class="control-label mb-1">Turno</label>
                      <select class="form-control custom-select" name="id_categoria"  tabindex="1">
                        <?php
                          include 'connections/conn.php';

                          $catprf = mysqli_query($conn,"SELECT * from turnos");

                            while($row = mysqli_fetch_array($catprf)){
                              echo '<option value="'.$row['id_turno'].'">'.$row['descricao_turno'].'</option>';

                            }

                          include 'connections/diconn.php';

                            ?>


                      </select>



                      <div id="contablidade">

                      </div>




                  <div>
                      <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                          <i class="fa fa-lock fa-lg"></i>&nbsp;
                          <span id="payment-button-amount">Emitir Recibo</span>
                          <span id="payment-button-sending" style="display:none;">Sending…</span>
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div>
