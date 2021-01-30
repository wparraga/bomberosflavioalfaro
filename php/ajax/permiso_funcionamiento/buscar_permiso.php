<?php

	require_once ("../../../config/db.php");
	require_once ("../../../config/conexion.php");
	include ("../../../config/swee.php");

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('perfun_fechaemision', 'perfun_persona', 'perfun_cedularuc');
		 $sTable = "permiso_funcionamiento";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by perfun_codigo desc";
		include '../../../views/pagination.php'; 
		
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; 
		$adjacents  = 4; 
		$offset = ($page - 1) * $per_page;
		
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = '../../../permiso_funcionamiento.php';
		
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		
		if ($numrows>0){
			
			?>
		<div class="table-responsive">
		    <table class="table">
		        <tr class="success">
		            <th>ID</th>
		            <th>Emisión</th>
		            <th>Nombres</th>
		            <th>Cédula/RUC</th>
		            <th>Actividad</th>
		            <th>Válido</th>
		            <th><span class="pull-right">Acciones</span></th>

		        </tr>
		        <?php
						while ($row=mysqli_fetch_array($query)){
								$perfun_codigo=$row['perfun_codigo'];
								$perfun_fechaemision=$row['perfun_fechaemision'];
								$perfun_persona=$row['perfun_persona'];
								$perfun_cedularuc=$row['perfun_cedularuc'];
								$perfun_actividad=$row['perfun_actividad'];
								$perfun_ubicacion=$row['perfun_ubicacion'];
								$perfun_valido=$row['perfun_valido'];
								$perfun_usuario=$row['perfun_usuario'];
							?>

		        <input type="hidden" value="<?php echo $row['perfun_persona'];?>" id="perfun_persona<?php echo $perfun_codigo;?>">
		        <input type="hidden" value="<?php echo $row['perfun_cedularuc'];?>" id="perfun_cedularuc<?php echo $perfun_codigo;?>">
		        <input type="hidden" value="<?php echo $row['perfun_actividad'];?>" id="perfun_actividad<?php echo $perfun_codigo;?>">
		        <input type="hidden" value="<?php echo $row['perfun_ubicacion'];?>" id="perfun_ubicacion<?php echo $perfun_codigo;?>">
		        <input type="hidden" value="<?php echo $row['perfun_valido'];?>" id="perfun_valido<?php echo $perfun_codigo;?>">
		        <tr>
		            <td><?php echo $perfun_codigo; ?></td>
		            <td><?php echo $perfun_fechaemision; ?></td>
		            <td><?php echo $perfun_persona; ?></td>
		            <td><?php echo $perfun_cedularuc; ?></td>
		            <td><?php echo $perfun_actividad;?></td>
		            <td><?php echo $perfun_valido;?></td>

		            <td><span class="pull-right">

		            	<a href="ticket/TCPDF-master/examples/permiso_funcionamientopdf.php?perfun_codigo=<?php echo $perfun_codigo;?>" target="_blank" class='btn btn-default' title='Imprimir Permiso de Funcionamiento'><i class="glyphicon glyphicon-print"></i></a>


		                <a href="#" class='btn btn-default' title='Editar Permiso de Funcionamiento' onclick="obtener_datos('<?php echo $perfun_codigo;?>');"
		                        data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a>

		            </td>

		        </tr>
		        <?php
						}
						?>
		        <tr>
		            <td colspan=9><span class="pull-right">
		                    <?php
							 echo paginate($reload, $page, $total_pages, $adjacents);
							?></span></td>
		        </tr>
		    </table>
		</div>
<?php
		}
	}
?>