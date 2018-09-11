<?php
/*
  @$an = $_REQUEST['an'];

  if(!$an){
    echo'<meta http-equiv="refresh" content="0;url=/corkexpress/indexuser.php?an=1"';
  }
*/
?>

<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                          <h2><?php
                          include 'connections/conn.php';
                          $dados = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(func_salario) as total from funcionarios"));
                          echo round($dados['total'],2);
                          include 'connections/diconn.php';

                            ?> €</h2>
                            <p class="m-b-0">Total Gasto em Ordenados</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                          <h2><?php
                          include 'connections/conn.php';
                          $dados = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(desconto_irc)  as totalirs from recibos"));


                          echo round($dados['totalirs'],2);
                          include 'connections/diconn.php';

                            ?> €</h2>
                            <p class="m-b-0">Total Gastos em IRS</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                          <h2><?php
                          include 'connections/conn.php';
                          $dados1 = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(desconto_ss)  as totalss from recibos"));
                          echo round($dados1['totalss'],2);
                          include 'connections/diconn.php';

                            ?> €</h2>
                            <p class="m-b-0">Total Gasto em Segurança Social</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2><?php
                            include 'connections/conn.php';
                            $dados = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(id_funcionario) as total from funcionarios"));
                            echo round($dados['total'],2);
                            include 'connections/diconn.php';

                              ?></h2>
                            <p class="m-b-0">Funcionarios</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- End Container fluid  -->
    <!-- footer -->
    <footer class="footer"> © 2018 All rights reserved by João Vilares & João Mirante</a></footer>
    <!-- End footer -->
</div>
<!-- End Page wrapper  -->
