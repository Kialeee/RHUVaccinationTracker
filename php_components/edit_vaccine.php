<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Update Vaccine</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../php_components/editVaccineAction.php?id=<?php echo $row['id']; ?>">
            <div style="display: flex;">
                <div class="mb-12 row">
                    <label class="col-sm-10 col-form-label">Vaccine Code</label><br>
                    <input type="number" disabled style="width: 380px; margin-left: 10px;" class="form-control" name="vacc_code" value="<?php echo $row['vacc_code']; ?>"><br>
                </div>
                <div class="mb-12 row" style="margin-left: 10px;">
                    <label class="col-sm-10 col-form-label">Vaccine Administration Code</label><br>
                    <input type="text" disabled style="width: 382px; margin-left: 10px;" class="form-control" name="vacc_administration_code" value="<?php echo $row['vacc_administration_code']; ?>"><br>
                </div>
            </div>
            <div class="mb-12 row">
                <label class="col-sm-10 col-form-label">Manufacturer</label><br>
                <input type="text" style="width: 97.5%; margin-left: 10px;" class="form-control" name="manufacturer" value="<?php echo $row['manufacturer']; ?>"><br>
            </div>
            <div style="display: flex;">
                <div class="mb-12 row" style="margin-left: 10px;">
                    <label class="col-sm-10 col-form-label" style="margin-left: -25px;">Vaccine Name</label><br>
                    <input type="text" style="width: 650px; margin-left: -15px;" class="form-control" name="vacc_name" value="<?php echo $row['vacc_name']; ?>"><br>
                </div> 
                <div class="mb-12 row">
                    <label class="col-sm-10 col-form-label" style="margin-left: 15px;">Quantity</label><br>
                    <input type="number" disabled style="width: 130px; margin-left: 18px;" class="form-control" name="quantity" value="<?php echo $row['quantity']; ?>"><br>
                </div>             
            </div>
            <div style="display: flex;">
                <div class="mb-12 row">
                    <label class="col-sm-10 col-form-label">NDC10</label><br>
                    <input type="number" disabled style="width: 380px; margin-left: 10px;" class="form-control" name="ndc10" value="<?php echo $row['ndc10']; ?>"><br>
                </div>
                <div class="mb-12 row" style="margin-left: 10px;">
                    <label class="col-sm-10 col-form-label">NDC11</label><br>
                    <input type="number" disabled style="width: 382px;" class="form-control" name="ndc11" value="<?php echo $row['ndc11']; ?>"><br>
                </div>
            </div>
            <div style="display: flex;">
                <div class="mb-12 row">
                    <label class="col-sm-10 col-form-label">Arrival Date</label><br>
                    <input type="date" disabled style="width: 380px; margin-left: 10px;" class="form-control" name="arrival_date" value="<?php echo $row['arrival_date']; ?>"><br>
                </div>
                <div class="mb-12 row" style="margin-left: 10px;">
                    <label class="col-sm-10 col-form-label">Expiry Date</label><br>
                    <input type="date" disabled style="width: 382px;" class="form-control" name="expiry_date" value="<?php echo $row['expiry_date']; ?>"><br>
                </div>
            </div>
                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary">Update</a>
        </form>
      </div>
    </div>
  </div>
</div>