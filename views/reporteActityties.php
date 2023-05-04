<?php

require_once dirname(__DIR__) . '/assets/tcpdf/include/tcpdf_include.php';;

// extend TCPF with custom functions
class MYPDF extends TCPDF
{

    // Colored table
    public function ColoredTable($header, $data)
    {
        // Colors, line width and bold font
        $imag='dirname(__DIR__)/ ';
        $this->SetFillColor(21, 160, 212 );
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(20, 35, 40, 45, 45);
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
            $this->Cell($w[0], 6, $v['id_event'], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $v['activity'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $v['name'], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $v['user_corporate'], 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 6, $v['event_date'], 'LR', 0, 'L', $fill);
            $fill = !$fill;
        }
    }
}

require_once dirname(__DIR__) . '/app/Models/Activitylog.php';

require_once './classes/Session.php';

use Classes\Session;
use App\Models\Activitylog;

$actitivy = new Activitylog();
$resul;

$session = new Session();


if ($session->getSessionName('reportActivity') == 1) {
    $resul = $actitivy->getallJoin();
} else {
    $resul = $actitivy->getallJoinWhere($session->getSessionName('columActivity'), $session->getSessionName('valueActivity'));
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('TELCEL');
$pdf->SetAuthor('TELCEL');
$pdf->SetTitle('REPORTES ACTIVIDADES');


// set default header data

$image_file = '.../tcpdf/examples/example_001.php';
$pdf->SetHeaderData($image_file, PDF_HEADER_LOGO_WIDTH, 'TELCEL', 'REPORTE DE ACTVIDADES DEL SERVIDOR');

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
$header = array('Id', 'Actividad', 'Servidor', 'Usuario', 'Fecha del evento');

// data loading

$pdf->header();
// print colored table
$pdf->ColoredTable($header,  $resul);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('Reporte_Actividades_Servidor'.date('Y-m-d').'.pdf', 'I');
