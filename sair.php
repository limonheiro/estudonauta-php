<!DOCTYPE html>
<html lang="pt-br">

	<?php
		require_once "head.php";
	?>

	<body>
		<div id="corpo">
        <?php
            echo msg_warning("Usuario desconectado.");
            logout();
        ?>
        </div>
    </body>
</html>

