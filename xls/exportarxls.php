<?php
  require_once ("../config/db.php");
  require_once ("../config/conexion.php");
  include ("../config/swee.php");
  $q1=$_GET['q1'];
  $q2=$_GET['q2'];
  $sTable = "tra_tarifas";
  $sWhere = "";
  if ( $q1 != "" && $q2 != "" )
  {
    $sWhere = "WHERE date(TRA_FECHAEMISION) between '$q1' and '$q2'";
  }else{
           echo'<script>
            swal({
              type: "error",
              title: " Escoga el rango de fechas.",
              showConfirmButton: true,
              confirmButtonColor: "#5fb45c",
              confirmButtonText: "Aceptar",
              closeOnConfirm: false
              }).then(function(result){
              if (result.value) {
                location.reload(true);
                
              }
            })
          </script>';
        }
        $count_query=mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable $sWhere");
        $row= mysqli_fetch_array($count_query);
        $numrows = $row['numrows']; 
        $sql="SELECT * FROM  $sTable $sWhere";
        $query = mysqli_query($con, $sql);
        if ($numrows>0){
          header("Pragma: public");
          header("Expires: 0");
          $filename = "reporte_tarifarios.xls";
          header("Content-type: application/x-msdownload");
          header("Content-Disposition: attachment; filename=$filename");
          header("Pragma: no-cache");
          header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
          ?>
            <table width="60%" border="1" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE TARIFARIOS</strong></CENTER></td>
            </tr>
            <tr  class="success">
              <th>#</th>
              <th>Fecha_Emisión</th>
              <th>RUC/CI</th>
              <th>Placa</th>
              <th>Nombres</th>
              <th>Total</th>
              
            </tr>
            <?php
              
              while ($row=mysqli_fetch_array($query)){
                $TRA_NUMERO=$row['TRA_NUMERO'];
                $TRA_FECHAEMISION=$row['TRA_FECHAEMISION'];
                $TRA_RUCCI=$row['TRA_RUCCI'];
                $TRA_PLACA=$row['TRA_PLACA'];
                $TRA_NOMBRES=$row['TRA_NOMBRES'];
                $TRA_TOTAL=$row['TRA_TOTAL'];
            ?>        
              <tr>
                <td><?php echo $TRA_NUMERO; ?></td>
                <td><?php echo $TRA_FECHAEMISION; ?></td>
                <td><?php echo $TRA_RUCCI; ?></td>
                <td><?php echo $TRA_PLACA; ?></td>
                <td><?php echo $TRA_NOMBRES; ?></td>
                <td>$ <?php echo $TRA_TOTAL;?></td>
              </tr>
              <?php
            }
            ?>
            </table>
          <?php
        }else{
          echo'<script>
            swal({
              type: "error",
              title: " No existen datos para Exportar.",
              showConfirmButton: true,
              confirmButtonColor: "#5fb45c",
              confirmButtonText: "Aceptar",
              closeOnConfirm: false
              }).then(function(result){
              if (result.value) {
                location.reload(true);
                
              }
            })
          </script>';
        }
?>