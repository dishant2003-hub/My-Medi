<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body pb-0">
                <h5 class="header-title">
                    <div class="">
                        <a href="javascript:void(0);" class="btn btn-dark edit_category_ajax" data-bs-toggle="modal" data-bs-target="#add_category_target"> <i class="fa fa-plus"></i> Add </a>
                    </div>
                </h5>
            </div>
            <div class="card-body pt-0">
                <div class="card-datatable table-responsive">
                    <?php
                    $table_data = array(
                        'id',
                        'Category',
                        'Name',
                        'Image',
                        'Description', 
                        // 'Status', 
                        'Action',
                    );
                    render_datatable($table_data, 'category');
                    ?>                                               
                </div> 
            </div>
        </div>
    </div>
</div> 


<!-- Pricing Modal -->
<div class="modal fade" id="category_target" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div id="add_category_ajax"></div> 

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add_category_target" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div id="form_category_ajax"></div>

            </div>
        </div>
    </div>
</div>
<!--/ Pricing Modal -->