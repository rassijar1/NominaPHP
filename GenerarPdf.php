<?php
    require 'fpdf/fpdf.php';
    $nombre = $_REQUEST['newnomb'];
    $id = $_REQUEST['newnid'];
    $centro = $_REQUEST['newcentro'];
    $cargo = $_REQUEST['newcargo'];
    $salario = $_REQUEST['newsalario'];
    $dias = $_REQUEST['newdias'];
    $nExtra=$_REQUEST['newextra'];
    $pagoI= $_REQUEST['newpagoI'];
    $pagoV= $_REQUEST['newpagoI'];
    $resp= $_REQUEST['newres'];

    $totaldExtra= $_REQUEST['newtotaldExtra'];
    $totaldomDiu= $_REQUEST['newtotaldomDiu'];
    $totaldomNoc= $_REQUEST['newtotaldomNoc'];
    $totalDevengado= $_REQUEST['newtotalDevengado'];
    $pension= $_REQUEST['newpension'];
    $salud= $_REQUEST['newsalud'];
    $fondo= $_REQUEST['newfondo'];
    $fecha = $_REQUEST['newfecha'];
    $monto = $_REQUEST['newmonto'];
    $cuotas = $_REQUEST['newcuotas'];
    $cuotaPagar= $_REQUEST['newcuotaPagar'];
    $totalDeduccion= $_REQUEST['newtotalDeduccion'];
    $totalNomina= $_REQUEST['newtotalNomina'];
    $pdf= new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('courier','B',10);
    $tex="NOMINA DE 01 AL 30 DE ENERO 2019 \nHERMES INFINITY PROJECTS S.A.S \n";
    $pdf->MultiCell(190,10,$tex,0,'C');
    $pdf->MultiCell(190,10,"",0,'C');
    $t=count($id);
    


    for($i=0;$i<$t;$i++){ 
       

           $a=$i+1;
           $texto1="Empleado Nro:$a \nNombre:$nombre[$i] \nCentro de costo: $centro[$i] \nCargo: $cargo[$i] \nNo.Identificacion: $id[$i]" .
           "\nSueldo: $salario[$i] \nDias laborados: $dias[$i]";
           $texto2="Horas extra: $nExtra[$i] \nPago incapacidad: $pagoI[$i] \nPago vacaciones: $pagoV[$i]".
           "\nEl auxilio de transporte es: $resp[$i] \nCantidad de Horas extras diurnas: $totaldExtra[$i]".
           "\nCantidad de Horas extras diurnas dominicales: $totaldomDiu[$i] \nCantidad de Horas extras nocturnas dominicales: $totaldomNoc[$i] ".
           "\nEl total devengado es: $totalDevengado[$i]";
           $texto3="El costo por salud es: $salud[$i] \nEl costo por pension es: $pension[$i]".
           "\nEl costo del fondo de solidaridad es: $fondo[$i] \nLa fecha del monto desembolsado es: $fecha[$i] \nLa deuda del monto es: $monto[$i] ".
           "\nEl numero de cuotas son : $cuotas[$i] \nEl valor de la cuota a pagar es: $cuotaPagar[$i]".
           "\nEl total de las deducciones es: $totalDeduccion[$i] \n ";
            $texto4="El total de las nomina es: $totalNomina[$i]";

            $pdf->SetFont('Arial','B',10);     
            $pdf->SetFillColor(100, 181, 246);//Fondo azul de celda
            $pdf->MultiCell(190,10,'Datos del empleado',1,'C',true);
            $pdf->SetFillColor(255, 255, 255);
            $pdf->MultiCell(190,10,utf8_decode($texto1),1,0,'B',true);
            $pdf->SetFillColor(129, 199, 132);//Fondo verde de celda
            $pdf->MultiCell(190,10,'Devengado',1,'C',true);
            $pdf->SetFillColor(255, 255, 255);
            $pdf->MultiCell(190,10,utf8_decode($texto2),1,0,'B',true);
            $pdf->SetFillColor(251, 192, 45);//Fondo amarillo de celda
            $pdf->MultiCell(190,10,'Deducciones',1,'C',true);
            $pdf->SetFillColor(255, 255, 255);
            $pdf->MultiCell(190,10,utf8_decode($texto3),1,'B',0);
            $pdf->SetFillColor(221, 44, 0);
            $pdf->MultiCell(190,10,utf8_decode($texto4),1,0,'B',true);
            $pdf->Ln();
         
      

    }

    
    $pdf->Output('Nomina.pdf','D'); 

    


?>