<?php
session_start();
include('configdb.php');

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $update_status = "UPDATE tbl_order SET Status = 'Selesai' WHERE id_user = '$user_id'";
    $result = mysqli_query($mysqli, $update_status);

    if ($result) {
        // Redirect kembali ke halaman sebelumnya atau tampilan data order
        header("Location: order.php"); // Ganti dengan halaman yang sesuai
    } else {
        echo "Error updating status: " . mysqli_error($mysqli);
    }
}
?>
