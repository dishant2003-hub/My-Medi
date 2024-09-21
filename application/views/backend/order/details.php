<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body pb-0">
                <h5 class="header-title">
                    <!-- <div class="">
                                <a class="btn btn-dark" href="<?php echo base_url('#'); ?>" ><i class="fa fa-plus"></i> Add</a>
                            </div> -->
                </h5>
            </div>
            <div class="card-body pt-0">
                <div class="card-datatable table-responsive">
                    <?php
                    $table_data = array(
                        'id',
                        'Fname',
                        'Lname',
                        'Email',
                        'Price',
                        'Company',
                        'Phone',
                        'Address',
                        'City',
                        'Zipcode',
                        'Country',
                        'Action',
                    );
                    render_datatable($table_data, 'detail');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Pricing Modal -->
<div class="modal fade" id="orderdetail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="ps-popup__body" id="add_detail"></div>

            </div>
        </div>
    </div>
</div>
<!-- /Pricing Modal -->
