<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SOLVENCIA</title>
  </head>
  <body>
    <?php
        include ("../config/db.php");
        include ("../config/conexion.php");
        include ("../config/swee.php");
        $count_query=mysqli_query($con, "SELECT count(*) AS numrows FROM solvencia");
        $row=mysqli_fetch_array($count_query);
        $numrows = $row['numrows'];
        $sql="SELECT * FROM solvencia";
        $query = mysqli_query($con, $sql); 

        if ($numrows>0){
          ?>
            <table width="60%" border="1" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="6" bgcolor="skyblue"><CENTER><strong>SOLVENCIAS</strong></CENTER></td>
            </tr>
            <tr  class="success">
                <th>Nombres</th>
                <th>Registro</th>
                <th>Partida</th>
                <th>Repertorio</th>
                <th>Año</th>
                <th>Observación</th>
                <th>Cancelada</th>
            </tr>
            <?php
              header("Pragma: public");
              header("Expires: 0");
              $filename = "solvencias.xls";
              header("Content-type: application/x-msdownload");
              header("Content-Disposition: attachment; filename=$filename");
              header("Pragma: no-cache");
              header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

              while ($row=mysqli_fetch_array($query)){
                  $id_sol=$row['sol_codigo'];
                  $nom_sol=$row['sol_nombres'];
                  $reg_sol=$row['sol_registro'];
                  $par_sol=$row['sol_partida'];
                  $rep_sol=$row['sol_repertorio'];
                  $ani_sol=$row['sol_anio'];
                  $obs_sol=$row['sol_observacion'];
                  $can_sol=$row['sol_cancelada'];
            ?>        
              <tr>
                  <td ><?php echo $nom_sol; ?></td>
                  <td ><?php echo $reg_sol; ?></td>
                  <td ><?php echo $par_sol; ?></td>
                  <td ><?php echo $rep_sol; ?></td>
                  <td ><?php echo $ani_sol; ?></td>
                  <td ><?php echo $obs_sol; ?></td>
                  <td ><?php echo $can_sol; ?></td>
              </tr>
              <?php
            }
            ?>
            </table>
          <?php
        }else{
          echo '<script language="javascript">
                document.location="../solvencia.php";

                 alert("No Existen Datos para Exportar");
                 
                </script>';


        }
    ?>   
  </body>
</html>