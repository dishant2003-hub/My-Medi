<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body pb-0">
                        <h5 class="header-title">
                        <div class="">
                            <a class="btn btn-dark" href="<?php echo base_url('backend/product_detail'); ?>" ><i class="fa fa-plus"></i> Add</a>
                        </div>
                    </h5>
            </div>
             <div class="card-body pt-0">
                <div class="card-datatable table-responsive">
                    <?php
                    $table_data = array(
                        'id', 
                        'Category',   
                        'Sub-category',
                        'Name', 
                        'Image',
                        'Price',  
                        'Description',
                        'Status',
                        'Action',   
                    );
                    render_datatable($table_data, 'product'); // table list, js and controller same name apvu(product) product name database nai
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
 




