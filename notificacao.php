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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-content">
                            <!-- Left sidebar -->
                            <div class="inbox-leftbar">
                              <?php @$page = $_REQUEST['page'];

                              if(!empty(@$_SESSION['userid'])){
                                if($page=='read')
                                {
                                  echo "<a class=\"btn btn-danger btn-block waves-effect waves-light\" href=\"/corkexpress/indexuser.php?an=4&page=compose\">Enviar Notificação";
                                }else
                                {
                                  echo "<a class=\"btn btn-danger btn-block waves-effect waves-light\" href=\"/corkexpress/indexuser.php?an=4&page=read\">Ver Notificações";
                                }
                              }else if(!empty(@$_SESSION['admin'])){
                                 if($page=='read')
                                 {
                                   echo "<a class=\"btn btn-danger btn-block waves-effect waves-light\" href=\"/corkexpress/indexadmin.php?an=9&page=compose\">Enviar Notificação";
                                 }else
                                 {
                                   echo "<a class=\"btn btn-danger btn-block waves-effect waves-light\" href=\"/corkexpress/indexadmin.php?an=9&page=read\">Ver Notificações";
                                 }
                               }
                                 ?></a>

                                <div class="mail-list mt-4">
                                    <a class="list-group-item border-0 text-danger" href="#"><i class="mdi mdi-inbox font-18 align-middle mr-2"></i><b>Inbox</b><?php include 'connections/conn.php';
                                            if(empty(@$_SESSION['userid'])){
                                              $q = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(id_notificacao) as total FROM notificacao WHERE estado = '0' AND id_funcionario='0'"));

                                            }else{
                                              $q = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(id_notificacao) as total FROM notificacao WHERE estado = '0' AND id_funcionario='$_SESSION[userid]'"));

                                            }
                                                      if($q['total'] != '0'){
                                                      echo "<span class=\"label label-danger float-right ml-2\">$q[total]</span>";
                                                    }
                                                     include 'connections/diconn.php';?></a>
                                    <a class="list-group-item border-0" href="#"><i class="mdi mdi-star font-18 align-middle mr-2"></i>Starred</a>

                                    <a class="list-group-item border-0" href="#"><i class="mdi mdi-delete font-18 align-middle mr-2"></i>Trash</a>
                                </div>


                            </div>
                            <!-- End Left sidebar -->

                            <div class="inbox-rightbar">

                                <div role="toolbar" class="">
                                    <div class="btn-group">
                                        <button class="btn btn-light waves-effect" type="button"><i class="mdi mdi-archive font-18 vertical-middle"></i></button>
                                        <button class="btn btn-light waves-effect" type="button"><i class="mdi mdi-alert-octagon font-18 vertical-middle"></i></button>
                                        <button class="btn btn-light waves-effect" type="button"><i class="mdi mdi-delete-variant font-18 vertical-middle"></i></button>
                                    </div>
                                    <div class="btn-group">
                                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-light dropdown-toggle waves-effect" type="button">
                                                                            <i class="mdi mdi-folder font-18 vertical-middle"></i>
                                                                            <b class="caret m-l-5"></b>
                                                                        </button>
                                        <div class="dropdown-menu">
                                            <span class="dropdown-header">Move to</span>
                                            <a href="javascript: void(0);" class="dropdown-item">Social</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Promotions</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Updates</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Forums</a>
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-light dropdown-toggle waves-effect" type="button">
                                                                            <i class="mdi mdi-label font-18 vertical-middle"></i>
                                                                            <b class="caret m-l-5"></b>
                                                                        </button>
                                        <div class="dropdown-menu">
                                            <span class="dropdown-header">Label as:</span>
                                            <a href="javascript: void(0);" class="dropdown-item">Updates</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Social</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Promotions</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Forums</a>
                                        </div>
                                    </div>

                                    <div class="btn-group">
                                        <button aria-expanded="false" data-toggle="dropdown" class="btn btn-light dropdown-toggle waves-effect" type="button">
                                                                            More
                                                                            <span class="caret m-l-5"></span>
                                                                        </button>
                                        <div class="dropdown-menu">
                                            <span class="dropdown-header">More Option :</span>
                                            <a href="javascript: void(0);" class="dropdown-item">Mark as Unread</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Add to Tasks</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Add Star</a>
                                            <a href="javascript: void(0);" class="dropdown-item">Mute</a>
                                        </div>
                                    </div>
                                </div>

                                  <?php
                                  @$page = $_REQUEST['page'];

                                  switch ($page) {
                                    case 'compose':
                                      // code...
                                      include 'sendnotify.php';
                                      break;
                                    case 'read':
                                          include 'viewnotify.php';
                                        break;
                                      }
                                    ?>


                            </div>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
    <!-- footer -->
    <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
    <!-- End footer -->
</div>
