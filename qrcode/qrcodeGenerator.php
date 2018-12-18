<?php
	
	use Endroid\QrCode\QrCode;

	function generateCode($id)
	{

		require_once 'vendor/autoload.php';

		$qrCode = new QrCode($id);
		$qrCode->setSize(300);
		$qrCode->setWriterByName('png');
		$qrCode->writeFile('C:\xampp\htdocs\Yoko\mail\qrcode.png');

	}

?>
