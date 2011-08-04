<html>
<head>
<script type="text/javascript">
	function init() {
		if (top.uploadDone) {
			top.uploadDone();
		}
	}

	window.onload=init;
</script>
</head>
<body>
<?php echo $json; ?>
</body>
</html>