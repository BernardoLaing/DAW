<?php echo '
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title"> Error </h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <p><strong><?php echo $_SESSION["error_msg"]; ?> </strong></p>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="row">
          </div>
        </div>
      </div>
    </div>
  </div>
'
?>