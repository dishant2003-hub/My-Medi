<div class="row">
    <div class="col-12">
        <div class="card ">
              <div class="card-body pt-0">
                <div class="card-datatable table-responsive">
                    <?php
                    $table_data = array(
                        'Date',
                        'Name',
                        'email',
                        'mobile',
                        'country',
                        'Type',
                        // 'message ',
                        'Action',
                    );
                    render_datatable($table_data, 'support');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- contact Model -->
<div class="modal fade" id="contactDetails" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Contact Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body contact_details">
        
      </div>
    </div>
  </div>
</div>
<!-- contact Model -->
