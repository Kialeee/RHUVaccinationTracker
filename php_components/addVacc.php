<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add New Vaccine</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../php_components/addVaccine.php">
            <div style="display: flex;">
                <div class="mb-12 row">
                    <label class="col-sm-10 col-form-label">Vaccine Code</label><br>
                    <input type="number" style="width: 380px; margin-left: 10px;" class="form-control" name="vacc_code" required><br>
                </div>
                <div class="mb-12 row" style="margin-left: 10px;">
                    <label class="col-sm-10 col-form-label">Vaccine Administration Code</label><br>
                    <input type="text" style="width: 382px; margin-left: 10px;" class="form-control" name="vacc_administration_code" required><br>
                </div>
            </div>
            <div class="mb-12 row">
                <label class="col-sm-10 col-form-label">Manufacturer</label><br>
                <input type="text" style="width: 97.5%; margin-left: 10px;" class="form-control" name="manufacturer" required><br>
            </div>
            <div style="display: flex;">
                <div class="mb-12 row" style="margin-left: 10px;">
                    <label class="col-sm-10 col-form-label" style="margin-left: -25px;">Vaccine Name</label><br>
                    <input type="text" style="width: 650px; margin-left: -15px;" class="form-control" name="vacc_name" required><br>
                </div> 
                <div class="mb-12 row">
                    <label class="col-sm-10 col-form-label" style="margin-left: 15px;">Quantity</label><br>
                    <input type="number" style="width: 130px; margin-left: 18px;" class="form-control" name="quantity" required><br>
                </div>             
            </div>
            <div style="display: flex;">
                <div class="mb-12 row">
                    <label class="col-sm-10 col-form-label">NDC10</label><br>
                    <input type="number" style="width: 380px; margin-left: 10px;" class="form-control" name="ndc10" required><br>
                </div>
                <div class="mb-12 row" style="margin-left: 10px;">
                    <label class="col-sm-10 col-form-label">NDC11</label><br>
                    <input type="number" style="width: 382px;" class="form-control" name="ndc11" required><br>
                </div>
            </div>
            <div style="display: flex;">
                <div class="mb-12 row">
                    <label class="col-sm-10 col-form-label">Arrival Date</label><br>
                    <input type="date" style="width: 380px; margin-left: 10px;" class="form-control" name="arrival_date" required><br>
                </div>
                <div class="mb-12 row" style="margin-left: 10px;">
                    <label class="col-sm-10 col-form-label">Expiry Date</label><br>
                    <input type="date" style="width: 382px;" class="form-control" name="expiry_date" required><br>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Save</a>
        </form>
      </div>
    </div>
  </div>
</div>