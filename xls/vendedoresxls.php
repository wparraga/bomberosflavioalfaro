<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>VENDEDORES</title>
  </head>
  <body>
    <?php
        include ("../config/db.php");
        include ("../config/conexion.php");
        include ("../config/swee.php");
        $count_query=mysqli_query($con, "SELECT count(*) AS numrows FROM vendedores");
        $row=mysqli_fetch_array($count_query);
        $numrows = $row['numrows'];
        $sql="SELECT * FROM vendedores";
        $query = mysqli_query($con, $sql); 

        if ($numrows>0){
          ?>
            <table width="60%" border="1" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="6" bgcolor="skyblue"><CENTER><strong>VENDEDORES</strong></CENTER></td>
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
                  $nom_ven=$row['ven_nombres'];
                  $part_ven=$row['ven_partida'];
                  $rep_ven=$row['ven_repertorio'];
                  $obs_ven=$row['ven_observacion'];
                  $ani_ven=$row['ven_anio'];
                  $sit_ven=$row['ven_sitio'];
            ?>        
              <tr>
                <td><?php echo $nom_ven; ?></td>
                <td><?php echo $part_ven; ?></td>
                <td><?php echo $rep_ven; ?></td>
                <td><?php echo $obs_ven; ?></td>
                <td><?php echo $ani_ven; ?></td>
                <td><?php echo $sit_ven; ?></td>
              </tr>
              <?php
            }
            ?>
            </table>
          <?php
        }else{
          echo '<script language="javascript">
                document.location="../vendedores.php";
                 alert("No Existen Datos para Exportar");
                </script>';
        }
    ?>   
  </body>
</html>