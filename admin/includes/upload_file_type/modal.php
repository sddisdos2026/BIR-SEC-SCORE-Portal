<!-- Delete Confirmation Modal -->
<div class="modal fade" id="approve<?= $uploadItem['id']; ?>" tabindex="0" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- <form action="code.php" method="POST"> -->

                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                  
              <input type="hidden" name="requestId" id="requestId" value="<?= $uploadItem['id']; ?>" />

                    <p>Are you sure you want to delete this file?</p> 
                    <p><b><?= $uploadItem['filename']; ?></b></p>
                    <p>This action cannot be undone.</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-secondary text-white btn-sm" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    <a href="file_upload_delete.php?del=<?= $uploadItem['id']; ?>" class="btn btn-primary btn-sm">Confirm</a>
                </div>

            <!-- </form> -->
        </div>
    </div>
</div>
<!-- End Confirmation Modal -->