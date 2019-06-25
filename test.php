<!DOCTYPE html>
<html>
<body>
<script type="text/javascript">
	function on_callphp()
	{
		var result = "<?php myphp(); ?>";
		alert(result);
		return false;
	}
</script>
<form>
<input type="button" value="hit me" onclick="on_callphp()">
</form>
<?php
function myphp(){
	echo "hello php 11";
}

?>
</body>
</html>