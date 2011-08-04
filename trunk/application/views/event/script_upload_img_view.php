<script type="text/javascript">
	function init() {
		//alert('a');
		if (top.uploadDone)
			top.uploadDone(); //top means parent frame.
	}

	window.onload=init;

</script>

<json>
<?php echo $json; ?>
</json>