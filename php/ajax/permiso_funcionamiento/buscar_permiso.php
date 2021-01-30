<?php

	require_once ("../../../config/db.php");
	require_once ("../../../config/conexion.php");
	include ("../../../config/swee.php");

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('per_propietario', 'per_ruc', 'per_local');
		 $sTable = "permisos_bomberos";
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
		$sWhere.=" order by per_codigo desc";
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
		            <th>Nro.</th>
		            <th>Propietario</th>
		            <th>Local</th>
		            <th>Dirección</th>
		            <th>Per_Fun</th>
		            <th>Per_Ins</th>
		            <th>Año</th>
		            <th></th>

		        </tr>
		        <?php
						while ($row=mysqli_fetch_array($query)){
								$per_cod=$row['per_codigo'];
								$per_fec=$row['per_fechaemision'];
								$per_num=$row['per_numero'];
								$per_loc=$row['per_local'];
								$per_pro=$row['per_propietario'];
								$per_ruc=$row['per_ruc'];
								$per_dir=$row['per_direccion'];
								$per_tel=$row['per_telefono'];
								$per_tasapermisofuncionamiento=$row['per_tasapermisofuncionamiento'];
								$per_tasapermisoinspeccion=$row['per_tasapermisoinspeccion'];
								$per_anio=$row['per_anio'];
								$per_usuariogenera=$row['per_usuariogenera'];
							?>

		        <input type="hidden" value="<?php echo $row['perfun_persona'];?>" id="perfun_persona<?php echo $per_cod;?>">
		        <input type="hidden" value="<?php echo $row['perfun_cedularuc'];?>" id="perfun_cedularuc<?php echo $per_cod;?>">
		        <input type="hidden" value="<?php echo $row['perfun_actividad'];?>" id="perfun_actividad<?php echo $per_cod;?>">
		        <input type="hidden" value="<?php echo $row['perfun_ubicacion'];?>" id="perfun_ubicacion<?php echo $per_cod;?>">
		        <input type="hidden" value="<?php echo $row['perfun_valido'];?>" id="perfun_valido<?php echo $per_cod;?>">
		        <tr>
		            <td><?php echo $per_cod; ?></td>
		            <td><?php echo $per_fec; ?></td>
		            <td><?php echo $per_num; ?></td>
		            <td><?php echo $per_pro;?></td>
		            <td><?php echo $per_loc;?></td>
		            <td><?php echo $per_dir;?></td>
		            <td><?php echo '$'.$per_tasapermisofuncionamiento;?></td>
		            <td><?php echo '$'.$per_tasapermisoinspeccion;?></td>
		            <td><?php echo $per_anio;?></td>

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