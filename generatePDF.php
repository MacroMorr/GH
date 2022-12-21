<?php
require __DIR__ . "/vendor/autoload.php";
require 'function.php';


use Dompdf\Dompdf;
use Dompdf\Options;

$dompdf = new Dompdf(['fontDir' => __DIR__ . '/vendor/dompdf/dompdf/lib/fonts', 'defaultFont' => 'DejaVuSans.ttf']);

//$html = file_get_contents(__DIR__ . '/pdfHTML.php');

$content = '<!DOCTYPE html><html><head>';
$content .= '<style>';
$content .= '
    * {
        font-family: "DejaVu Sans";
        font-style: normal;
    }
    table {
        width: 100%;
    }
    .text {
        text-align: center;
    }
    th {
        font-weight: normal;
        color: #039;
        padding: 10px 15px;
    }
    td {
        color: #669;
        border-top: 1px solid #e8edff;
        padding: 10px 15px;
    }
    tr:nth-child(2n) {
        background: #e8edff;
    }
    ';

$content .= '</style><title>PDF</title></header><body>';
$content .= '<div>';
$content .= '<table>';
$content .= '<tr>';
$content .= '<th>Тип</th><th>Отделение</th><th>№ клапана полива</th><th>Объём</th><th>EC</th><th>pH</th><th>times</th>';
$content .= '</tr>';

foreach ($sampleAll as $sample) {
    $content .= '<tr>';
    $content .= "<td>$sample->name</td>";
    $content .= "<td class='text'>$sample->department</td>";
    $content .= "<td class='text'>$sample->valve_watering</td>";
    $content .= "<td class='text'>$sample->volume</td>";
    $content .= "<td class='text'>$sample->EC</td>";
    $content .= "<td class='text'>$sample->pH</td>";
    $content .= "<td class='text'>$sample->times</td> . <br/>";
    $content .= '</tr>';
}

$content .= '</table>';
$content .= '</div>';
$content .= '</body></html>';

$dompdf->loadHtml($content, 'UTF-8');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
$dompdf->stream('TableInfo.pdf', ['Attachment' => false]);

