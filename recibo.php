<?php
  if(!@$_POST['ano'] && !@$_POST['mes']){
    if(!@$_SESSION['userid']){
      echo'<meta http-equiv="refresh" content="0;url=/corkexpress/indexadmin.php"';
    }else{
      echo'<meta http-equiv="refresh" content="0;url=/corkexpress/indexuser.php?an=5&page=notfound"';
    }
  }else{
    include 'connections/conn.php';
    $row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM recibos WHERE ano='$_POST[ano]' AND mes='$_POST[mes]' AND id_funcionario='$_SESSION[userid]'"));
    $func = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM funcionarios WHERE id_funcionario='$_SESSION[userid]'"));
    $cat = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM categoria_profissional WHERE id_categoria='$func[id_categoria]'"));

    include 'connections/diconn.php';
  }

?>

<div class="row">
  <div class="col">
    <div class="card">
        <div class="card-body">
            <div class="row">
          <div class="col">
              <h1><?php echo "$func[func_nome]"; ?></h1>
          </div>


            <div class="col" >
                <h2 style="text-align:right;"><?php require_once 'datas.php'; echo getMesName($_POST['mes']);echo " $_POST[ano]"; ?></h2>
            </div>
          </div>
          <br>
          <div class="table-responsive">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th>Data</th>
                                          <th>Categoria Profissional</th>
                                          <th>Nº Beneficiario</th>
                                          <th>Nº Contribuite</th>
                                          <th>Taxa/IRS</th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <th scope="row">01- <?php echo "$_POST[mes]-$_POST[ano]"; ?></th>
                                          <td><?php echo "$cat[descricao_categoria]"; ?></td>
                                          <td scope="row" ><?php echo "$func[func_niss]"; ?> </td>
                                          <td scope="row" ><?php echo "$func[func_nif]"; ?></td>
                                          <td class="color-primary"></td>
                                      </tr>

                                  </tbody>
                              </table>
                          </div>
            <h4>Salario Base: <?php echo "$func[func_salario]"; ?></h4>



      </div>
    </div>
</div>
</div>
  <div class="row">

      <div class="col">
        <div class="card">
            <div class="card-body">
              </div>
              <div class="table-responsive">
                                  <table class="table">
                                      <thead>
                                          <tr>
                                              <th>Designação</th>
                                              <th>Quant</th>
                                              <th>Valor Unitario</th>
                                              <th>Abonos</th>
                                              <th>%</th>
                                              <th>Descontos</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <th>Remuneração</th>
                                              <td>176h</td>
                                              <td><?php echo ($func['func_salario']/176) ?></td>
                                              <td><?php echo "$func[func_salario]"; ?></td>
                                              <td class="color-primary"></td>
                                              <td></td>
                                          </tr>
                                          <tr>
                                              <th>Subsidio Turno</th>
                                              <td></td>
                                              <td></td>
                                              <td><?php echo "$row[turno_mensal]"; ?> €</td>
                                              <td class="color-primary"></td>
                                              <td></td>
                                          </tr>
                                          <tr>
                                              <th>Segurança Social</th>
                                              <td>539€</td>
                                              <td></td>
                                              <td></td>
                                              <td class="color-primary">11</td>
                                              <td>59€</td>
                                          </tr>
                                          <tr>
                                              <th>Totais</th>
                                              <td></td>
                                              <td></td>
                                              <td>618€</td>
                                              <td class="color-primary"</td>
                                              <td>69€</td>
                                          </tr>

                                      </tbody>
                                  </table>
                              </div>

              </div>
      </div>

  </div>
