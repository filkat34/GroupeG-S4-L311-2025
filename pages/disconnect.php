<?php
	setDisconnectUser();

	header('Location:index.php');
	exit(); // ← CRITICAL: Stop execution after redirect
?>