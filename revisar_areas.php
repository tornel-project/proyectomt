<?php


require_once("db.php");

print_r($_POST);

if (isset($_POST['buscar'])) {



	$area=$_POST['area'];

	if ($area==0) {
	$query="select * 
			from areas a, departamentos d, profesores p, asignatura asi
			where a.codigo_area=d.codigo_area
			and d.cod_depto=p.cod_depto
			and asi.cod_depto=d.cod_depto
			and p.id_profesor=asi.id_profesor";
	}
	else{
	$query="select * 
			from areas a, departamentos d, profesores p, asignatura asi
			where a.codigo_area=d.codigo_area
			and d.cod_depto=p.cod_depto
			and asi.cod_depto=d.cod_depto
			and p.id_profesor=asi.id_profesor
			and a.codigo_area=$area";
	}
}

?>

<form method="post" name="forma" action="index.php">
		<input type="hidden" name="idlotero" type="text" id="idlotero" value="<?php echo($query); ?>"/>
		<input type="hidden" name="area" type="text" id="area" value="<?php echo($area); ?>"/>

</form>


<script>
{
document.forma.submit()
}
</script>

