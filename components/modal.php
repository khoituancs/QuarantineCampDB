<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#patientModal">
  Launch demo modal
</button>

<script src="<?= $HTML_PATH ?>/controllers/modal.js"></script>

<!-- Modal -->
<div class="modal fade" id="patientModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="patientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="patientModalLabel">Patient Report</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body container-fluid">
                
            </div>

            <div class="modal-footer container-fluid">
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-secondary">Print</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>