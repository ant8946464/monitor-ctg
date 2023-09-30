
<?php

require_once  '../assets/tcpdf/include/tcpdf_include.php';



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