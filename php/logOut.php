<?php

    session_start();

    session_destroy();

 
	echo 'Cerrarste sesión';
    echo '<script> window.location="../login.php";</script>';

?>
<script type="text/javascript">
	function reg(){
		window.location="../login.php";
	}

reg();
</script>