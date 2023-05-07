

<form action = "index.php" method="post">
Ingrese cantidad de empleados: <input type="number" name="tam">
<input type="submit" value="CREAR" name="crear">
<input type="reset" value="BORRAR">
</form>



<?php
if(isset($_POST['crear'])){
    $t = $_REQUEST['tam'];

?>

<form method="post" action="calculos.php">
    <table  border CELLPADDING=15 CELLSPACING=0 align ="center">
    <TR>
		<TH COLSPAN=7 BGCOLOR="#5DADE2 " >DATOS DEL EMPLEADO</TH>
        <TH COLSPAN=6 BGCOLOR="#52BE80" >DEVENGADO</TH>
        <TH COLSPAN=3 BGCOLOR = "#F4D03F">DEDUCCIONES</TH>
	</TR>
     <tr BGCOLOR =" #AED6F1 ">
        <th BGCOLOR =" #AED6F1 "><h3 align = "center"> N°</h3></th> 
        <th BGCOLOR =" #AED6F1 "><h3 align = "center" > Nombre</h3></th> 
        <th BGCOLOR =" #AED6F1 "><h3 align = "center"> Identificación</h3></th>
        <th BGCOLOR =" #AED6F1 "><h3 align = "center"> Centro de costos </h3></th>
        <th BGCOLOR =" #AED6F1 "><h3 align = "center"> Cargo </h3></th>
        <th BGCOLOR =" #AED6F1 "><h3 align = "center"> Salario </h3></th> 
        <th BGCOLOR =" #AED6F1 "><h3 align = "center"> Días laborados </h3></th>
    
    
        <th BGCOLOR="#A9DFBF"><h3 align = "center" > Días-Vacaciones</h3></th>
        <th BGCOLOR="#A9DFBF"><h3 align = "center"> Días-Incapacidad </h3></th>
        <th BGCOLOR="#A9DFBF"><h3 align = "center"> H.Diurnas Extras </h3></th>
        <th BGCOLOR="#A9DFBF"><h3 align = "center"> H.Nocturnas Extras </h3></th>
        <th BGCOLOR="#A9DFBF"><h3 align = "center"> H.Diurnas Dominicales Extras </h3></th>
        <th BGCOLOR="#A9DFBF"><h3 align = "center"> H.Nocturnas Dominicales Extras </h3></th>

        <th BGCOLOR = "#F9E79F"><h3 align = "center"> Monto desembolsado </h3></th>
        <th BGCOLOR = "#F9E79F"><h3 align = "center"> N° de Cuotas </h3></th>
        <th BGCOLOR = "#F9E79F"><h3 align = "center"> Fecha del Monto desembolsado </h3></th>
    </tr>

   
</form>
<?php
for($i=0;$i<$t;$i++){
    echo "
      
        <tr><th>".($i+1)."</th>
        <td><input  type='text' name ='nombre[]' required>
        <td><input type='number' name = 'id[]' required>
        <td><input type='text' name = 'centro[]' required>
        <td><input type='text' name = 'cargo[]' required>
        <td><input type='number' name = 'salario[]' required>
        <td><input type='number' name = 'dias[]' required>
        <td><input type='number' name = 'vacaciones[]' required>
        <td><input type='number' name = 'incapacidad[]' required>
        <td><input type='number' name = 'dExtra[]' required>
        <td><input type='number' name = 'nExtra[]' required>
        <td><input type='number' name = 'dDominical[]' required>
        <td><input type='number' name = 'nDominical[]' required>
        <td><input type='number' name = 'monto[]' required>
        <td><input type='number' name = 'cuotas[]' required>
        <td><input type='date' name = 'fecha[]' required>
        </td></tr>";
}

echo "<tr><td colspan='16' align='center'><input type='submit' value='ENVIAR' name='env'></td></tr></form>";
}
?>

