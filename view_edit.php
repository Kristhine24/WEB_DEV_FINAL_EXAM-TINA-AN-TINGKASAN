<div class="modal fade" id="edit_animal<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Services</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="edit_animal.php?id=<?php echo $row['id']; ?>" method="post">
        
          <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="name" name="name" placeholder="Animal Name" value="<?php echo $row['name']; ?>">
              <label for="name">Animal Name</label>
            </div>
            </div>

            <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="type_id" name="type_id" placeholder="Type Name"  value="<?php echo $row['type_id']; ?>">
              <label for="type_id">Type</label>
            </div>
          </div>

            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="color" name="color" placeholder="Price" value="<?php echo $row['color']; ?>">
                <label for="color">Color</label>
              </div>
            </div>

            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="number_of_legs" name="number_of_legs" placeholder="Number of Legs" value="<?php echo $row['number_of_legs']; ?>">
                <label for="number_of_legs">Number of Legs</label>
              </div>
            </div>

            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Remarks" value="<?php echo $row['remarks']; ?>">
                <label for="remarks">Remarks</label>
              </div>
            </div>
           

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
