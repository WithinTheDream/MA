<?php
include '../DATABASE/db.php';

if (isset($_GET['bulan'])) {
    $bulan = $_GET['bulan'];
    $query_orders = "SELECT * FROM orders WHERE DATE_FORMAT(tanggal_acara, '%Y-%m') = '$bulan'";
    $result_orders = $conn->query($query_orders);

    echo "<h2>Daftar Pesanan Bulan: $bulan</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<thead><tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. HP</th>
            <th>Lokasi</th>
            <th>Tanggal Acara</th>
            <th>Jenis Acara</th>
            <th>Paket</th>
            <th>Harga</th>
            <th>Status</th>
          </tr></thead>";
    echo "<tbody>";
    
    if ($result_orders->num_rows > 0) {
        while ($row = $result_orders->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['nama']}</td>
                    <td>{$row['alamat']}</td>
                    <td>{$row['no_hp']}</td>
                    <td><a href='{$row['lokasi_maps']}' target='_blank'>Lihat Lokasi</a></td>
                    <td>{$row['tanggal_acara']}</td>
                    <td>{$row['jenis_acara']}</td>
                    <td>{$row['paket']}</td>
                    <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                    <td>{$row['status']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>Pesanan tidak ditemukan untuk bulan ini.</td></tr>";
    }
    
    echo "</tbody></table>";
} else {
    echo "Bulan tidak ditemukan.";
}

echo "<style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
      </style>";
?>
