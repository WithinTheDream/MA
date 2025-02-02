<?php
require '../libs/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

include '../DATABASE/db.php';

$query_orders = "SELECT * FROM orders";
$result_orders = $conn->query($query_orders);

// Setup DomPDF
$options = new Options();
$options->set('defaultFont', 'Arial');
$dompdf = new Dompdf($options);

ob_start();
?>

<h1>Laporan Pesanan</h1>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Nama Paket</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if ($result_orders->num_rows > 0) {
            while ($row = $result_orders->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['nama_paket'] . "</td>
                        <td>Rp. " . number_format($row['harga'], 0, ',', '.') . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada pesanan.</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
$html = ob_get_clean();

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Laporan_Pesanan.pdf", ["Attachment" => 0]);
?>
