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
			execAction('body', array( 'arg1' => 'parametro uno', 'arg2' => 'parametro dos' ) );
			?>
		</div>
		<div id="footer">
			<?php
			//pie
			execAction('footer1', array( ) );
			execAction('footer2', array( 4, 2 ) );
			?>
		</div>
	</body>
</html>
