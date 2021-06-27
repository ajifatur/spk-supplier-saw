<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        html, body {padding: 10px; margin: 10px;}
        #header {border-bottom: 3px solid #333; padding: 10px 15px;}
        #header table {width: 100%;}
        #header table tr td {padding: 0px;}
        #header-logo {vertical-align: middle;}
        #header-title {text-align: center;}
        #header-title h1 {margin-top: 0px; margin-bottom: 10px;}
        #header-title p {margin-top: 0px; margin-bottom: 5px; font-size: 18px;}
        #matriks-1, #matriks-2 {display: none;}
        #matriks-3 h4 {display: none;}
        #result-title {text-align: center; font-size: 20px; font-weight: bold;}
        #result {margin-top: 30px;}
        .table {width: 100%; border-collapse: collapse; text-align: center;}
        .table th {padding: 5px 8px; border: solid 1px #e3e3e3; border-bottom: solid 2px #e3e3e3; background-color: #f1f1f1; font-weight: bold; vertical-align: middle;}
        .table td {border: solid 1px #e3e3e3; padding: 5px;}
        .text-danger {color: #dc3545 !important;}
        footer {position: absolute; bottom: 10px; left: 10px;}
    </style>
</head>
<body>
    <div id="header">
        <table>
            <tr>
                <td id="header-logo" width="100"><img src="http://spk.faturmedia.xyz/asset/logo/fav-bm1.png" width="100"></td>
                <td id="header-title">
                    <h1>CV. Bumi Makmur</h1>
                    <p>Jl. Untung Suropati, RT.01/IV Kedungpane, Kec.Mijen, Kota Semarang - 50211</p>
                    <p>Telp (0247) 069 2177, Fax (024) 355 0423</p>
                </td>
            </tr>
        </table>
    </div>
    <div id="body">
        <p id="result-title">Laporan Hasil Perhitungan Sistem Pendukung Keputusan Pemilhan Supplier</p>
        <div id="result">
            <?php
            include 'hasil.php';
            ?>
        </div>
    </div>
    <footer>
        <i style="font-size: 10px;">Dicetak oleh <b><?= $_SESSION['nama']; ?></b> pada tanggal <?= date('d/m/Y') ?> pukul <?= date('H:i:s') ?> WIB.</i>
    </footer>
</body>
</html>
<?php
$content = ob_get_clean();
// var_dump($content);
// return;

require __DIR__.'/class/vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options;
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf();
$dompdf->loadHtml($content);
$dompdf->setPaper('A4', 'landscape');
$dompdf->setOptions($options);
$dompdf->render();
$dompdf->stream('Hasil Perankingan Supplier.pdf');
/*
use Spipu\Html2Pdf\Html2Pdf;
$pdf = new Html2Pdf('L');
$pdf->writeHTML($content);
$pdf->output('Hasil Perankingan Supplier.pdf', 'D');
*/
