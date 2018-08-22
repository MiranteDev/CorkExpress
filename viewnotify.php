<div class="">
    <div class="mt-4">
        <div class="">
            <ul class="message-list">
              <?php
                include 'connections/conn.php';

                if(!@$_SESSION['userid']){
                  $q = mysqli_query($conn,"SELECT * FROM notificacao WHERE id_funcionario='0'");
                }else{
                  $q = mysqli_query($conn,"SELECT * FROM notificacao WHERE id_funcionario='$_SESSION[userid]'");

                }


                while($noti = mysqli_fetch_array($q)){
                    echo "<li class=\"unread\">
                        <a href=\"email-read.html\">
                            <div class=\"col-mail col-mail-1\">
                                <div class=\"checkbox-wrapper-mail\">
                                    <input type=\"checkbox\" id=\"chk1\">
                                    <label class=\"toggle\" for=\"chk1\"></label>
                                </div>
                                <p class=\"title\">$noti[nome]</p><span class=\"star-toggle fa fa-star-o\"></span>
                            </div>
                            <div class=\"col-mail col-mail-2\">
                                <div class=\"subject\">$noti[assunto] &nbsp;&ndash;&nbsp;
                                    <span class=\"teaser\">$noti[msg]</span>
                                </div>
                                <div class=\"date\">$noti[data]</div>
                            </div>
                        </a>
                    </li>";
                }

                include 'connections/diconn.php';

                ?>



            </ul>
        </div>

    </div>
    <!-- panel body -->
</div>
<!-- panel -->

<div class="row">
    <div class="col-7">
        Showing 1 - 20 of 289
    </div>
    <div class="col-5">
        <div class="btn-group float-right">
            <button class="btn btn-gradient waves-effect" type="button"><i class="fa fa-chevron-left"></i></button>
            <button class="btn btn-gradient waves-effect" type="button"><i class="fa fa-chevron-right"></i></button>
        </div>
    </div>
</div>
