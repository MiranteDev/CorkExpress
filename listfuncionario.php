<div class="page-wrapper">
  <div class="container-fluid">

<div class="card card-outline-info">
    <div class="">
      <div class="card-header">


        <h4 class="card-title text-white">Listagem de Funcionarios</h4>
        </div>
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr role="row">
                          <th style="text-align:left;">Nome</th>
                            <th style="text-align:left;">NIF</th>
                              <th style="text-align:left;">Tipo de Categoria</th>
                              <th style="text-align:left;">Tipo de Departamento</th>
                              <th style="text-align:left;">Salario</th>

                    </tr>
                </thead>
                <tbody>



                  <?php
                    include 'connections/conn.php';

                    $dados = mysqli_query($conn, "SELECT id_funcionario,func_nome,func_nif,id_categoria,func_tipodepart,func_salario from funcionarios");


                      while($row = mysqli_fetch_array($dados)){
                        echo '<tr><td style="text-align:left;">'.$row['func_nome'].'</td>
                        <td>'.$row['func_nif'].'</td>';
                        $cate = mysqli_fetch_array(mysqli_query($conn, "SELECT descricao_categoria from categoria_profissional where id_categoria = '$row[id_categoria]'"));
                        echo '<td>'.$cate['descricao_categoria'].'</td>';
                        if($row['func_tipodepart'] == 1){
                          echo '<td>Escritorio</td>';
                        }else{
                            echo '<td>Operacional</td>';
                        }
                        echo '<td>'.$row['func_salario'].' €</td></tr>';





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
