<?php
include("partials/session_functions.php");
require_once("utils.php");
require_once("regexps.php");
$a = "id not valid";
if(isset($_GET["id"])&&$_GET["id"]!=null&&test($NUMBER, $_GET["id"]))
    $a = json_encode(buildAssocArray(queryCredencial($_GET["id"])));
include("partials/_header.html");
include("partials/_top_bar.html");
include("html/credential.html");
include("partials/_footer.html");
include("modals/modal_saved.html");
include("modals/modal_connection_error.html");
?>
<script src="js/credential.js"></script>
<script>
    $(document).ready(function(){
        $.loadData(<?php echo $a ?>, <?php echo $_GET["id"] ?>);
    });
</script>

