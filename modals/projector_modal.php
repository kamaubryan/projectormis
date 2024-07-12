 <!-- Edit Projector Modal -->
  <!-- Button trigger modal -->
<?php
echo $_SESSION['row_id'];
$modal_id = "updateProjectorModal".$row['id'];
echo $modal_id;
?>

<!-- Modal -->
<div class="modal fade" id="<?php echo $modal_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>


 <div class="modal fade" id="updateProjectorModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editProjectorModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editprojectorModalLabel">Edit Projector</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="editProjectorForm">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input type="text" name="editProjectorName" placeholder="Projector Name">
    <input type="text" name="editImage" placeholder="Image URL">
    <button type="button" onclick="updateProjector()">Update Projector</button>
</form>
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Food Modal -->
<div class="modal fade" id="deleteProjectorModal" tabindex="-1" role="dialog" aria-labelledby="deleteProjectorModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteProjectorModalLabel">Delete Projector</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this projector item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
        
        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
      </div>
    </div>
  </div>
</div>