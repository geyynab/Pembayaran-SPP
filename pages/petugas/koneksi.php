<?php
$conn=mysqli_connect('localhost','root','','pembayaran_spp');

/* check connection */
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
}
?>