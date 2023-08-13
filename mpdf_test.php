
<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Kirk A. Alesna</h1>');
$mpdf->Output();
?>