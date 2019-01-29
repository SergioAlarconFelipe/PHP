<?php
include_once 'plugins.php';
?>
<html>
	<head>
	
	</head>
	<body>
		<div id="head">
			<?php
			//cabecera
			execAction('head');
			?>
		</div>
		<div id="body">
			<?php
			//cuerpo
			execAction('body', array( 'parametro uno', 'parametro dos' ) );
			?>
		</div>
		<div id="footer">
			<?php
			//pie
			execAction('footer');
			?>
		</div>
	</body>
</html>