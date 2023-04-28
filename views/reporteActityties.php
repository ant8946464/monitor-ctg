<?php


    require_once dirname(__DIR__) . '/app/Models/Activitylog.php';

    require_once './classes/Session.php';

    use Classes\Session;
    use App\Models\Activitylog;

    $actitivy = new Activitylog();
    $resul;

    $session = new Session();

    var_dump($session->getSessionName('reportActivity'));
    var_dump($session->getSessionName('columUser'));
    
   if($session->getSessionName('reportActivity')==1){
      $resul = $actitivy->getallJoin();
   }else{
      $resul = $actitivy->getallJoinWhere($session->getSessionName('columActivity'), $session->getSessionName('valueActivity'));
   }

   
   require_once dirname( __DIR__ ) . '/assets/tcpdf/include/tcpdf_include.php';;
   $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

   $pdf->Image('../examples/images/logo.jpg',120, 15, 65, 20);
   $pdf->SetCreator(PDF_CREATOR);
   $pdf->SetAuthor('Sistema Web de  monitoreo');
   $pdf->SetTitle('Reporte Actvidades');

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

   $pdf->AddPage();

   $html = '
       <style>
           h1{
               font-family: Arial, Helvetica, sans-serif;
           }
       </style>
       <h1>Reporte</h1>
       <h3>Actvidades de los servidores</h3>
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
               color: white;
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
               <th>Actividad</th>
               <th>Servidor</th>
               <th>Usuario</th>
               <th>Fecha del evento</th>
           </tr>';
          
               foreach ( $resul as $k => $v) {
                   $html.= 
                   '<tr>
                       <td>'.$v['id_event'].'</td>
                       <td>'.$v['activity'].'</td>
                       <td>'.$v['name'].'</td>
                       <td>'.$v['user_corporate'].'</td>
                       <td>'.$v['event_date'].'</td>
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
   $pdf->Output('ReporteActividades.pdf', 'I');
 
?>