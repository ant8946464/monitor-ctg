<?php


    require_once dirname(__DIR__) . '/app/Models/User.php';

    require_once './classes/Session.php';

    use Classes\Session;
   
    use App\Models\User;

		$Colum;
		$value;
        $connectioDb = new User();
         $resul;

    $session = new Session();
    
   if($session->getSessionName('reporteUser')==1){
      $resul = $connectioDb->getallColumn();
   }else{
      $resul = $connectioDb->getallWhere($session->getSessionName('columUser'), $session->getSessionName('valueUser'));
   }
   
   require_once dirname( __DIR__ ) . '/assets/tcpdf/include/tcpdf_include.php';;
   $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

   
   $pdf->SetCreator(PDF_CREATOR);
   $pdf->SetAuthor('Sistema Web de  monitoreo');
   $pdf->SetTitle('Evento Servidores');

   $pdf->setPrintHeader(false);
   $pdf->setPrintFooter(false);

   $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

   $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
   $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

   $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

   $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
   $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
   $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

   $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

   $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

   if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
       require_once(dirname(__FILE__) . '/lang/eng.php');
       $pdf->setLanguageArray($l);
   }

   $pdf->SetFont('helvetica', '', 11);
   $pdf->Image('../examples/images/logo.jpg',120, 15, 65, 20);
   $pdf->AddPage();

   $html = '
       <style>
           h1{
               font-family: Arial, Helvetica, sans-serif;
           }
       </style>
       <h1>Reporte</h1>
       <h3>Evento Servidores</h3>
       <br><br>
   ';

   $html.='
       <style>
           table {
               border-collapse: collapse;
               margin-top: 100px;
           }
           th{
               vertical-align:middle;
               background:  #0077b6;
               color: blue;
           }
           table, th, td {
               border: 1px solid black;
           }
           table > tr > th {
               font-weight: bold; 
               text-align: center;
               vertical-align: middle;
               color: black;
               height: 40px;
          
           }
           table > tr > td {
               font-weight: bold; 
               text-align: center;
               color: black;
               height: 40px;
            
           }
       </style>
       
       <table>
           <tr>
               <th>Id</th>
               <th>NOMBRE</th>
               <th>APELLIDOS</th>
               <th>USUARIO GENERICO</th>
               <th>CORREO</th>
               <th>TELÉFONO</th>
           </tr>';
          
               foreach ( $resul as $k => $v) {
                   $html.= 
                   '<tr>
                       <td>'.$v['id_user'].'</td>
                       <td>'.$v['username'].'</td>
                       <td>'.$v['first_name'] . '  ' . $v['last_name'].'</td>
                       <td>'.$v['user_corporate'].'</td>
                       <td>'.$v['email'].'</td>
                       <td>'.$v['phone'].'</td>
                   </tr>';
               }	 		
   $html.=' 
           </table>';

   $pdf->writeHTML($html, true, false, false, false, 'C');

   // move pointer to last page
    $pdf->lastPage();
   ob_end_clean();
   // ---------------------------------------------------------

   //Close and output PDF document
   $pdf->Output('ReporteEventoServidores.pdf', 'I');
 
?>