<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Розулип 02</title>
	<link href="styles/style_02.css" rel="stylesheet" type="text/css" />
	<?php 
		$h = $_GET['healed'];
		$p = $_GET['patQuant'];
		$b = $_GET['butSt'];
	?>
</head>
<body>
	<div id="wrapper">
		<div id="logo"></div>
		<div id="navPrev"><input type="submit" form="formBack" id="send" value="" /></div>
		<div id="navNext"></div>
		<div id="oldman"></div>
		<div id="figures"></div>
		<div id="rollerBox">
			<div id="roller"></div>
		</div>
		<div id="buttons">
			<div id="per1"></div>
			<div id="per2"></div>
			<div id="per3"></div>
		</div>
	</div>
	<div id="form">
		<form action="index.php" id="formBack" method="POST">
		<!-- Можно что-то назад передать, если будет нужно! -->
		</form>
	</div>
<script type="text/javascript">
	var healed = '<?php echo $h; ?>';
	var patQuant = '<?php echo $p; ?>';
	var butSt = '<?php echo $b; ?>';

// Приняв данные из первого файла, определим массив соответствующих смещений для ползунка:	
	var quantArr = [
		{id: 0, quant: 1, val: 0, final: 0},
		{id: 1, quant: 2, val: 40, final: 37},
		{id: 2, quant: 3, val: 80, final: 75},
		{id: 3, quant: 4, val: 120, final: 112},
		{id: 4, quant: 5, val: 160, final: 149},
		{id: 5, quant: 6, val: 200, final: 187},
		{id: 6, quant: 7, val: 240, final: 224},
		{id: 7, quant: 8, val: 280, final: 261},
		{id: 8, quant: 9, val: 320, final: 298},
		{id: 9, quant: 10, val: 360, final: 336},
		{id: 10, quant: 11, val: 400, final: 373},
		{id: 11, quant: 12, val: 440, final: 410},
		{id: 12, quant: 13, val: 480, final: 448},
		{id: 13, quant: 14, val: 520, final: 485},
		{id: 14, quant: 15, val: 560, final: 522},
		{id: 15, quant: 16, val: 600, final: 560},
		{id: 16, quant: 17, val: 640, final: 597},
		{id: 17, quant: 18, val: 680, final: 634},
		{id: 18, quant: 19, val: 720, final: 671},
		{id: 19, quant: 20, val: 760, final: 709},
		{id: 20, quant: 21, val: 800, final: 746}
	];
	
	for (var i = 0; i <= 20; i++) {
		if (quantArr[i].val == patQuant) {
			var roller = document.getElementById("roller");
			roller.style.position = "absolute";
			roller.style.left = quantArr[i].final + "px";
		}
	}
	
// Кнопки с периодами будут заморожены исходя из пришедшего из первого файла значения:
	if (butSt == 1) {
		document.getElementById("per1").style.backgroundPosition = "0 -55px";
		document.getElementById("per2").style.backgroundPosition = "0 -110px";
		document.getElementById("per3").style.backgroundPosition = "0 -220px";
	}
	if (butSt == 2) {
		document.getElementById("per1").style.backgroundPosition = "0 0";
		document.getElementById("per2").style.backgroundPosition = "0 -165px";
		document.getElementById("per3").style.backgroundPosition = "0 -220px";
	}
	if (butSt == 3) {
		document.getElementById("per1").style.backgroundPosition = "0 0";
		document.getElementById("per2").style.backgroundPosition = "0 -110px";
		document.getElementById("per3").style.backgroundPosition = "0 -275px";
	}
	
</script>
</body>
</html>