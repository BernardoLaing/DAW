<?php require_once("partials/session_functions.php")?>
<script src="js/permissions.js"></script>
<script>
    $(document).ready(function(){
        $.setPermissions(<?php echo json_encode($_SESSION['permisos']) ?>);
    });
</script>
