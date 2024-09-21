<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body pb-0">
                        <h5 class="header-title">
                        <div class="">
                            <a class="btn btn-dark" href="<?php echo base_url('backend/blog_form'); ?>" ><i class="fa fa-plus"></i> Add</a>
                        </div>
                    </h5>
            </div>
             <div class="card-body pt-0">
                <div class="card-datatable table-responsive">
                    <?php
                    $table_data = array(
                        'id',
                        'Image',
                        'Title',
                        'Date',
                        'Description',
                        'Status',
                        'Action',
                    );
                    render_datatable($table_data, 'blog');
                    ?> 
                </div>
            </div>
        </div>
    </div>
</div>
 




