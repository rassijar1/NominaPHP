<form action = "GenerarPdf.php" method="post">
<table  border CELLPADDING=15 CELLSPACING=0 align ="center">
<style>
 button {

        font-size:30px;
        font-family:Verdana,Helvetica;
        background-color: #023604;
        color: white;
        padding: 20px 10px;
        margin: 80px 0;
        border: none;
        cursor: pointer;
        width: 15%;
        margin: 0 100px;
    }

</style>
<?php
   
    $nombre = $_REQUEST['nombre'];
    $id = $_REQUEST['id'];
    $centro = $_REQUEST['centro'];
    $cargo = $_REQUEST['cargo'];
    $salario = $_REQUEST['salario'];
    $dias = $_REQUEST['dias'];
    $vacaciones = $_REQUEST['vacaciones'];
    $incapacidad = $_REQUEST['incapacidad'];
    $dExtra = $_REQUEST['dExtra'];
    $nExtra = $_REQUEST['nExtra'];
    $dDominical = $_REQUEST['dDominical'];
    $nDominical = $_REQUEST['nDominical'];
    $monto = $_REQUEST['monto'];
    $cuotas = $_REQUEST['cuotas'];
    $fecha = $_REQUEST['fecha'];

    $diaMes = 30;
    $t=count($nombre);
    $SMMLV = 908526;
    $auxTrans = 106454;
    $resp = 0;
    $hDiurnaE = 4731;
    $hNocturnaE = 6624;
    $domDiurna = 7571;
    $domNocturna = 9463;
    
  

    echo"
    <table  border CELLPADDING=15 CELLSPACING=0 align ='center'><br><br>
    <TR>
		<TH COLSPAN=7 BGCOLOR='#5DADE2' >DATOS DEL EMPLEADO</TH>
        <TH COLSPAN=9 BGCOLOR='#52BE80' >DEVENGADO</TH>
        <TH COLSPAN=7 BGCOLOR = '#F4D03F'>DEDUCCIONES</TH>
	</TR>
     <tr BGCOLOR ='#AED6F1'>
        <th BGCOLOR =' #AED6F1 '><h3 align = 'center'> N°</h3></th> 
        <th BGCOLOR =' #AED6F1 '><h3 align = 'center'> Nombre</h3></th> 
        <th BGCOLOR =' #AED6F1 '><h3 align = 'center'> Identificación</h3></th>
        <th BGCOLOR =' #AED6F1 '><h3 align = 'center'> Centro de costos </h3></th>
        <th BGCOLOR =' #AED6F1 '><h3 align = 'center'> Cargo </h3></th>
        <th BGCOLOR =' #AED6F1 '><h3 align = 'center'> Salario </h3></th> 
        <th BGCOLOR =' #AED6F1 '><h3 align = 'center'> Días laborados </h3></th>
        <th BGCOLOR='#A9DFBF'><h3 align = 'center'> Salario según días laborados </h3></th>
        <th BGCOLOR='#A9DFBF'><h3 align = 'center'> Vacaciones Disfrutadas </h3></th>
        <th BGCOLOR='#A9DFBF'><h3 align = 'center'> Auxilio de Transporte</h3></th>
        <th BGCOLOR='#A9DFBF'><h3 align = 'center'> Pago Incapacidad</h3></th>
        <th BGCOLOR='#A9DFBF'><h3 align = 'center'> H.Diurnas Extras </h3></th>
        <th BGCOLOR='#A9DFBF'><h3 align = 'center'> H.Nocturnas Extras </h3></th>
        <th BGCOLOR='#A9DFBF'><h3 align = 'center'> H.Diurnas Dominicales Extras </h3></th>
        <th BGCOLOR='#A9DFBF'><h3 align = 'center'> H.Nocturnas Dominicales Extras </h3></th>
        <th BGCOLOR='#A9DFBF'><h3 align = 'center'> TOTAL DEVENGADO </h3></th>
        <th BGCOLOR='#F9E79F'><h3 align = 'center'> Salud </h3></th>
        <th BGCOLOR='#F9E79F'><h3 align = 'center'> Pensión </h3></th>
        <th BGCOLOR='#F9E79F'><h3 align = 'center'> Fondo de Solidaridad </h3></th>
        <th BGCOLOR = '#F9E79F'><h3 align = 'center'> Fecha del Monto desembolsado </h3></th>
        <th BGCOLOR='#F9E79F'><h3 align = 'center'> Monto Deuda </h3></th>
        <th BGCOLOR='#F9E79F'><h3 align = 'center'> N° Cuotas </h3></th>
        <th BGCOLOR='#F9E79F'><h3 align = 'center'> Valor cuota </h3></th>
        <th BGCOLOR='#F9E79F'><h3 align = 'center'> TOTAL DEDUCCIONES</h3></th>
        <th BGCOLOR='#C0392B'><h3 align = 'center'> TOTAL NOMINA A PAGAR</h3></th>
        </tr>";



    for($i=0;$i<$t;$i++){ 
        $salario2[$i] = (($salario[$i]/$diaMes)*$dias[$i]);
        $pagoV[$i] = (($salario[$i]/$diaMes)*$vacaciones[$i]);
        $pagoI[$i] = (($salario[$i]/$diaMes)*$incapacidad[$i]);
        $totaldExtra[$i] = $dExtra[$i]*$hDiurnaE;
        $totalnExtra[$i] = $nExtra[$i]*$hNocturnaE;
        $totaldomDiu[$i] = $dDominical[$i]*$domDiurna;
        $totaldomNoc[$i]  = $nDominical[$i]*$domNocturna;
        if($salario[$i] < ($SMMLV*2)){
            $resp = $auxTrans;
        }
        else{
            $resp = 0;
        }
        $totalDevengado[$i] = ($salario2[$i] + $pagoV[$i] + $pagoI[$i] + $resp +
                            $totaldExtra[$i] + $totalnExtra[$i] + $totaldomDiu[$i] + $totaldomNoc[$i]);


        $salud[$i] = (($salario[$i] + $pagoV[$i]) * 0.04);
        $pension[$i] = (($salario[$i] + $pagoV[$i]) * 0.04);
       
        if($cuotas[$i] > 0){
            $cuotaPagar[$i] = $monto[$i]/$cuotas[$i];
        }
        else{
            $cuotaPagar[$i] = 0;
        }

        if($salario[$i] >= ($SMMLV*4)){
            $fondo[$i] = $salario[$i]*0.01;
        }
        else{
            $fondo[$i] = 0;
        }
        $totalDeduccion[$i] = ($salud[$i] + $pension[$i] + $fondo[$i]);
        $totalNomina[$i] = $totalDevengado[$i] - $totalDeduccion[$i];
        

        $a=$i+1;
         

        echo "
        <tr>
            <th><h4>".$a."</h4></th> 
            <th><h4>".$nombre[$i]."</h4></th>
            <th><h4>".$id[$i]."</h4></th>
            <th><h4>".$centro[$i]."</h4></th>
            <th><h4>".$cargo[$i]."</h4></th>
            <th><h4>".$salario[$i]."</h4></th>
            <th><h4>".$dias[$i]."</h4></th>
            <th><h4>".$salario2[$i]."</h4></th>
            <th><h4>".$pagoV[$i]."</h4></th>
            <th><h4>".$resp."</h4></th>
            <th><h4>".$pagoI[$i]."</h4></th>
            <th><h4>". $totaldExtra[$i]."</h4></th>
            <th><h4>". $totalnExtra[$i]."</h4></th>
            <th><h4>". $totaldomDiu[$i]."</h4></th>
            <th><h4>". $totaldomNoc[$i]."</h4></th>
            <th BGCOLOR='#A9DFBF'><h4>". $totalDevengado[$i]."</h4></th>
            <th><h4>". $salud[$i]."</h4></th>
            <th><h4>". $pension[$i]."</h4></th>
            <th><h4>". $fondo[$i]."</h4></th>
            <th><h4>". $fecha[$i]."</h4></th>
            <th><h4>". $monto[$i]."</h4></th>
            <th><h4>". $cuotas[$i]."</h4></th>
            <th><h4>". $cuotaPagar[$i]."</h4></th>
            <th BGCOLOR='#F9E79F'><h4>". $totalDeduccion[$i]."</h4></th>
            <th BGCOLOR='#C0392B'><h4>". $totalNomina[$i]."</h4></th>
            
            
            


        </tr>";

        
       
        echo "<input  type='hidden' name='newnomb[]' value = '".$nombre[$i]."'readonly>";
        echo "<input  type='hidden' name='newnid[]' value = '".$id[$i]."'readonly>";
        echo "<input  type='hidden' name='newcentro[]' value = '".$centro[$i]."'readonly>";
        echo "<input  type='hidden' name='newcargo[]' value = '".$cargo[$i]."'readonly>";
        echo "<input  type='hidden' name='newsalario[]' value = '".$salario[$i]."'readonly>";
        echo "<input  type='hidden' name='newdias[]' value = '".$dias[$i]."'readonly>";
        echo "<input  type='hidden' name='newextra[]' value = '".$nExtra[$i]."'readonly>";
        echo "<input  type='hidden' name='newpago[]' value = '".$pagoV[$i]."'readonly>";
        echo "<input  type='hidden' name='newres[]' value = '".$resp."'readonly><br>";
        echo "<input  type='hidden' name='newpagoI[]' value = '".$pagoI[$i]."'readonly>";
        echo "<input  type='hidden' name='newtotaldExtra[]' value = '".$totaldExtra[$i]."'readonly>";
        echo "<input  type='hidden' name='newtotaldomDiu[]' value = '".$totaldomDiu[$i]."'readonly>";
        echo "<input  type='hidden' name='newtotaldomNoc[]' value = '".$totaldomNoc[$i]."'readonly>";
        echo "<input  type='hidden' name='newtotalDevengado[]' value = '".$totalDevengado[$i]."'readonly>";
        echo "<input  type='hidden' name='newsalud[]' value = '".$salud[$i]."'readonly>";
        echo "<input  type='hidden' name='newpension[]' value = '".$pension[$i]."'readonly>";
        echo "<input  type='hidden' name='newfondo[]' value = '".$fondo[$i]."'readonly>";
        echo "<input  type='hidden' name='newfecha[]' value = '".$fecha[$i]."'readonly>";
        echo "<input  type='hidden' name='newmonto[]' value = '".$monto[$i]."'readonly>";
        echo "<input  type='hidden' name='newcuotas[]' value = '".$cuotas[$i]."'readonly>";
        echo "<input  type='hidden' name='newcuotaPagar[]' value = '".$cuotaPagar[$i]."'readonly>";
        echo "<input  type='hidden' name='newtotalDeduccion[]' value = '".$totalDeduccion[$i]."'readonly>";
        echo "<input  type='hidden' name='newtotalNomina[]' value = '".$totalNomina[$i]."'readonly>";

     
            
        
       


    }

    






?>



    

<tr><td colspan='25' align="center"><button  type='submit'>Descargar nomina PDF</button></td></tr>
</form>





