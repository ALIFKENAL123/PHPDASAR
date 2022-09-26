<h2>Data Produk Dzikri</h2>
<a href="?pages=test&aksi=tambah_data">Tambah Data</a>
<table border="3" cellspacing="5" >
    <tr style = "font-weigth:bold ; text-align:center ;">
        <td>No</td>
        <td>Nama Produk</td>
        <td>Status</td>
        <td>Jenis Produk</td>
        <td>Merk</td>
        <td>Deskripsi</td>
        <td>Aksi<td>
    </tr>
    <?php
include "koneksi.php";
$TAMPIL = 'SELECT * FROM tbl_produk';
mysqli_query($KONEKSI, $TAMPIL);
$HASIL = mysqli_query($KONEKSI, $TAMPIL);

$NO=1;
 
while ($DATA = mysqli_fetch_array($HASIL)) {
    $STATUS = $DATA['status'];
    $JENIS = $DATA['jenis_produk'];

?>
    <tr>
        <td><?php echo $NO; ?></td>
        <td><?php echo $DATA['nama_produk'];?></td>
        <td><?php if ($STATUS == 'Baik') {
            echo 'Baik';
        } elseif ($STATUS == 'Rusak') {
            echo 'Rusak';
        } else {
            echo 'Hilang';
        }
        ?></td>
        <td><?php switch ($JENIS) {
            case '1':
                echo 'Elektronika';
                break;
            case '2':
                echo 'Komputer Personal';
                break;
            case '3':
                echo 'Laptop';
                break;
            case '4':
                echo 'Furniture';
                break;
            case '5':
                echo 'Mesin';
                break;
            case '6':
                echo 'Kendaraan';
                break;
            
        }
        ?>
        <td><?php echo $DATA['merk'];?></td>
        <td><?php echo $DATA['deskripsi'];?></td>
        
        <?php echo "
        <td>
            <a href=index.php?pages=test&aksi=edit&id=$DATA[id_produk]>
            Edit |
            <a href=index.php?pages=test&aksi=hapus_produk&id=$DATA[id_produk]>Delete
        </td>";
        ?>
    </tr>

    <?php
    $NO++;
}
    ?>
</table>