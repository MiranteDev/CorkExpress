<?php


$funcionarioid = $_REQUEST['funcionarioid'];

include 'connections/conn.php';

$catprf = mysqli_query($conn,"SELECT id_funcionario,func_nome,func_nib,func_nif,func_niss,func_salario from funcionarios WHERE id_funcionario = $funcionarioid");

while ($row = mysqli_fetch_array($catprf)) {
  echo "<label>NIB</label><input type=\"text\" class=\"form-control\" value=\"$row[func_nib]\" disabled>";
  echo "<label>NIF</label><input type=\"text\" class=\"form-control\" value=\"$row[func_nif]\" disabled>";
  echo "<label>NISS</label><input type=\"text\" class=\"form-control\" value=\"$row[func_niss]\" disabled>";
  echo "<label>Salario Base</label><input type=\"text\" class=\"form-control\" value=\"$row[func_salario]\" disabled>";

}

include 'connections/diconn.php';

 ?>
