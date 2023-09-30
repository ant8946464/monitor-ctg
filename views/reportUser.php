<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/tcpdf/include/tcpdf_include.php';
// extend TCPF with custom functions
class MYPDF extends TCPDF
{


    // Colored table
    public function ColoredTable($header, $data)
    {
        // Colors, line width and bold font
       
        $this->SetFillColor(  21, 160, 212 );
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(15,60, 25, 60,30);
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
       
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach ($data as $k => $v) {
            $this->Ln();
            $this->Cell($w[0], 6, $v['id_user'], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $v['username'].''.$v['first_name']. '  ' . $v['last_name'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $v['user_corporate'], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $v['email'], 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 6, $v['phone'], 'LR', 0, 'L', $fill);
            $fill = !$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }

}
 	

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
   

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('TELCEL');
$pdf->SetAuthor('TELCEL');
$pdf->SetTitle('REPORTES USUARIOS');

$header_logo='images/logo.jpg';
// set default header data
$pdf->SetHeaderData($header_logo, PDF_HEADER_LOGO_WIDTH, 'TELCEL', 'REPORTE DE USUARIO');

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

// column titles
$header = array('Id', 'NOMBRE', 'USUARIO ','CORREO','TELÉFONO');


// data loading

$pdf->header();
// print colored table
$pdf->ColoredTable($header,  $resul);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('Reporte_Usarios'.date('Y-m-d').'.pdf', 'I');
