<?php 
require_once("db.php");
include("includes/header.php");




if (isset($_POST['area']) && $_POST['area'] != "") {
	$area=$_POST['area'];


$query="select codigo_area, desc_area from areas where codigo_area=$area union select codigo_area, desc_area from areas where codigo_area<>$area";


}else{
$query="select codigo_area, desc_area from areas";
}


$query3="select * from areas a, departamentos d, profesores p, asignatura asi
			where a.codigo_area=d.codigo_area
			and d.cod_depto=p.cod_depto
			and asi.cod_depto=d.cod_depto
			and p.id_profesor=asi.id_profesor";

	
	$resultado=mysqli_query($conn,$query);

	if (!$resultado) {
		die("fallo consulta");
	}else{
		$row=mysqli_fetch_array($resultado);

		}

	if (isset($_POST['idlotero']) && $_POST['idlotero'] != "") {
		
		$query2=$_POST['idlotero'];

		$resultado2=mysqli_query($conn,$query2);
		}

	else{
		
		$resultado2=mysqli_query($conn,$query3);


	}	

?>

<div class="container p-4">
	
	<div class="row"> 
	
		<div class="col"> 
			
			<div class="card card-body">
				<form action="revisar_areas.php" name="form1" id="form1" method="POST">
					<div class="form-group">				
						<select name="area">
						<?php
						if ($area=='') { ?>					
						<option value="0"> todos</option>
						<?php }?>

						<?php 
							foreach ($resultado as $key) {
							?>
							<option value="<?php print($key['codigo_area']);?>"><?php print($key['desc_area']);?></option>							
							<?php
							}?> 
  							
						</select>
					</div>
					
							<table class="table" name="tabla">
							  <thead>
							  <tr>
							    <th scope="col">area</th>
							    <th scope="col">codigo depto</th>
							    <th scope="col">id profesor</th>
							    <th scope="col">nombre profesor</th>
							    <th scope="col">id asignatura</th>
							  	<th scope="col">nombre asignatura</th>
							  </tr>
							  </thead>
  							  <tbody>
  							<?php 
  							  foreach ($resultado2 as $key1){ 
  							  	?>							  		
  							  	 <tr>
							     <th scope="row"><?php print($key1['codigo_area']);?></th>
							     <th scope="row"><?php print($key1['desc_codigo']);?></th>
							     <th scope="row"><?php print($key1['id_profesor']);?></th>
							     <th scope="row"><?php print($key1['nombre_profesor']);?></th>
							     <th scope="row"><?php print($key1['id_asignatura']);?></th>
  							     <th scope="row"><?php print($key1['nombre_asi']);?></th>
							  </tr>	
							 <?php } ?>
							</tbody>
						</table>
					<input type="submit" class="btn btn-success btn-block" name="buscar" value="buscar">	
				</form>
			</div>	
		</div>

		<div class="col-md-8">
			

		</div>

	</div>

</div>


<?php 
include("includes/footer.php"); 
?>
