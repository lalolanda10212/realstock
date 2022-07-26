<?php
session_start();
if (!isset($_SESSION['user_id'], $_SESSION['username'])) {
    echo '<script type="text/javascript">
	window.location.href = "./index.php";
	</script>';
    exit();
}
