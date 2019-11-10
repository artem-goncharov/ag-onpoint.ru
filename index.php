<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Розулип 01</title>
	<link href="styles/style_01.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="wrapper">
		<div id="logo"></div>
		<div id="navPrev"></div>
		<div id="navNext" onclick="checkFunc()"><input type="submit" form="formData" id="send" value="" /></div>
		<div id="pill">
			<img src="images/pill.png" alt="pill" />
		</div>
		<div id="oldman"></div>
		<div id="figures"></div>
		<div id="rollerBox">
			<input type="range" id="roller" form="formData" min="0" max="800" step="40" value="0" onmouseup="checkPosition()"/>
		</div>
		<div id="buttons">
			<div id="per1" onclick="savePeriod(1)"></div>
			<div id="per2" onclick="savePeriod(2)"></div>
			<div id="per3" onclick="savePeriod(3)"></div>
		</div>
		<div id="form">
			<form action="next_slide.php" id="formData" method="GET">
				<input type="text" name="healed" id="healed" />
				<input type="text" name="patQuant" id="patQuant" />
				<input type="text" name="butSt" id="butSt" />
			</form>
		</div>
	</div>
</body>
<script type="text/javascript" src="scripts/process.js"></script>
</html>