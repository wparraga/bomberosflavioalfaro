<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>COMPRADORES</title>
  </head>
  <body>
    <?php
        include ("../config/db.php");
        include ("../config/conexion.php");
        include ("../config/swee.php");
        $count_query=mysqli_query($con, "SELECT count(*) AS numrows FROM compradores");
        $row=mysqli_fetch_array($count_query);
        $numrows = $row['numrows'];
        $sql="SELECT * FROM compradores";
        $query = mysqli_query($con, $sql); 

        if ($numrows>0){
          ?>
            <table width="60%" border="1" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="6" bgcolor="skyblue"><CENTER><strong>COMPRADORES</strong></CENTER></td>
            </tr>
            <tr  class="success">
              <th>Nombres</th>
              <th>Partida</th>
              <th>Repertorio</th>
              <th>Observación</th>
              <th>Año</th>
              <th>Ubicación</th>
              
            </tr>
            <?php
              header("Pragma: public");
              header("Expires: 0");
              $filename = "compradores.xls";
              header("Content-type: application/x-msdownload");
              header("Content-Disposition: attachment; filename=$filename");
              header("Pragma: no-cache");
              header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
              while ($row=mysqli_fetch_array($query)){
                  $nom_com=$row['com_nombres'];
                  $part_com=$row['com_partida'];
                  $rep_com=$row['com_repertorio'];
                  $obs_com=$row['com_observacion'];
                  $ani_com=$row['com_anio'];
                  $sit_com=$row['com_sitio'];
            ?>        
              <tr>
                <td ><?php echo $nom_com; ?></td>
                <td ><?php echo $part_com; ?></td>
                <td ><?php echo $rep_com; ?></td>
                <td ><?php echo $obs_com; ?></td>
                <td ><?php echo $ani_com; ?></td>
                <td ><?php echo $sit_com; ?></td>
              </tr>
              <?php
            }
            ?>
            </table>
          <?php
        }else{
          echo '<script language="javascript">
                document.location="../compradores.php";

                 alert("No Existen Datos para Exportar");
                 
                </script>';


        }
    ?>   
  </body>
</html>