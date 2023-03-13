<?php require $_SERVER['DOCUMENT_ROOT']."/sci-certificate/vendor/autoload.php"?>
<?php require $_SERVER['DOCUMENT_ROOT']."/sci-certificate/lib/TCPDF-master/tcpdf.php";?>
<?PHP
// class MYPDF extends TCPDF {
//     //Page header
//     public function Header() {
//         // get the current page break margin
//         $bMargin = $this->getBreakMargin();
//         // get current auto-page-break mode
//         $auto_page_break = $this->AutoPageBreak;
//         // disable auto-page-break
//         $this->SetAutoPageBreak(false, 0);
//         // set bacground image
//         $img_file = K_PATH_IMAGES.'image_demo.jpg';
//         $this->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
//         // restore auto-page-break status
//         $this->SetAutoPageBreak($auto_page_break, $bMargin);
//         // set the starting point for the page content
//         $this->setPageMark();
//     }
// }

// create new PDF document
 $pdf = new TCPDF("L", "mm", "A4", true, 'UTF-8', false);

// // set document information
// $pdf->SetCreator(PDF_CREATOR);
// $pdf->SetAuthor('Nicola Asuni');
// $pdf->SetTitle('TCPDF Example 051');
// $pdf->SetSubject('TCPDF Tutorial');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts
// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
// $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(0, 0, 0);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 0);

// set image scale factor
// $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
// if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
//     require_once(dirname(__FILE__).'/lang/eng.php');
//     $pdf->setLanguageArray($l);
// }

// ---------------------------------------------------------

// set font
$pdf->SetFont('thsarabun', '', 48);

// // add a page
// $pdf->AddPage();

// // Print a text
// $html = '<span style="background-color:yellow;color:blue;">&nbsp;PAGE 1&nbsp;</span>
// <p stroke="0.2" fill="true" strokecolor="yellow" color="blue" style="font-family:helvetica;font-weight:bold;font-size:26pt;">You can set a full page background.</p>';
// $pdf->writeHTML($html, true, false, true, false, '');


// // add a page
// $pdf->AddPage();

// // Print a text
// $html = '<span style="background-color:yellow;color:blue;">&nbsp;PAGE 2&nbsp;</span>';
// $pdf->writeHTML($html, true, false, true, false, '');

// --- example with background set on page ---

// remove default header
$pdf->setPrintHeader(false);

// add a page
$pdf->AddPage();


// -- set new background ---

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = $_SERVER['DOCUMENT_ROOT'].'/sci-certificate/background/sciday2022.png';
$pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();


// Print a text
// $html = '<span style="color:white;text-align:center;font-weight:bold;font-size:32pt;">PAGE 3</span>';
// $pdf->writeHTML($html, true, false, true, false, '');

 //ลายเซ็นต์ CA
//  $pdf->Image($_SERVER['DOCUMENT_ROOT'].'/sci-certificate/background/ca/susu.png', 110, 147,0 , 50, '', '', '', false, 300, '', false, false, 0);
 // Print a text
 $pdf->SetFont('thsarabun', 'B');
 $pdf->SetTextColor(0,98,133);
 $pdf->SetFontSize(36);
 $pdf->MultiCell(0, 0, "คณะวิทยาศาสตร์", 0, 'C', 0, 1, 0, 40);
 $pdf->SetFontSize(28);
 $pdf->MultiCell(0, 0, "สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง", 0, 'C', 0, 1, 0, 53);

 $pdf->SetFont('thsarabun', '');
 $pdf->SetTextColor(0,98,133);
 $pdf->SetFontSize(24);
 $pdf->MultiCell(0, 0, "ประกาศนียบัตรนี้ให้ไว้เพื่อแสดงว่า", 0, 'C', 0, 1, 0, 65);

//  $pdf->SetFont('thsarabun', 'B');
//  $pdf->SetFontSize(36);
//  $pdf->SetTextColor(28,46,75);
//  // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
//  $pdf->MultiCell(0, 0, $name, 0, 'C', 0, 1, 0, 78);

 $pdf->SetFont('thsarabun', '');
 $pdf->SetFontSize(28);
 $pdf->MultiCell(0, 0, 'โรงเรียนบ่อกรุวิทยา', 0, 'C', 0, 1, 0, 92);

 $pdf->SetFont('thsarabun', 'B');
 // $pdf->SetTextColor(0,98,133);
 $pdf->SetFontSize(34);
 $pdf->MultiCell(0, 0, 'ได้เข้าร่วม และผ่านเกณฑ์การทำแบบทดสอบ', 0, 'C', 0, 1, 0, 110);
 // $pdf->SetFont('thsarabun', 'B');
 // $pdf->SetTextColor(28,46,75);
 // $pdf->SetFontSize(30);
 // $pdf->MultiCell(0, 0, $person['project'], 0, 'C', 0, 1, 0, 122);

 $pdf->SetFont('thsarabun', 'B');
 $pdf->SetTextColor(0,98,133);
 $pdf->SetFontSize(30);
 $pdf->MultiCell(0, 0, 'เทคนิคการสอบสัมภาษณ์ TCAS ยังไง ให้โดนใจกรรมการ', 0, 'C', 0, 1, 0, 127);


 $pdf->SetFont('thsarabun', 'B');
 $pdf->SetTextColor(0,98,133);
 $pdf->SetFontSize(30);
 $pdf->MultiCell(0, 0, 'วันที่ 7 มีนาคม พ.ศ. 2566', 0, 'C', 0, 1, 0, 142);

 $pdf->SetFont('thsarabun', '');
 $pdf->SetTextColor(0,98,133);
 $pdf->SetFontSize(18);
 $pdf->MultiCell(0, 0, '(รองศาสตราจารย์ ดร.สุธี  ชุติไพจิตร)', 0, 'C', 0, 1, 0, 182);
 $pdf->SetFont('thsarabun', '');
 $pdf->SetTextColor(0,98,133);
 $pdf->SetFontSize(18);
 $pdf->MultiCell(0, 0, 'คณบดี คณะวิทยาศาสตร์', 0, 'C', 0, 1, 0, 188);
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_051.pdf', 'I');
?>