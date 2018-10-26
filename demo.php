<html>
	<body>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<?php 
			echo '<input type="text" name="passcheck" placeholder="password">';
			echo '<input type="submit" id="submit">';
			$id = isset($_POST['passcheck']) ? $_POST['passcheck'] : '';
			echo $id;
		?>
		</form>		
	</body>
</html>