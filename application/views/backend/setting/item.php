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
                        'name',
                        'logo',
                        'favicon',
                        'header',
                        'footer',
                        'email',
                        'number',
                        'facebook',
                        'twitter',
                        'linkdin',
                        'instagram',
                        'youtube',
                        'phone',
                        'address',
                        'form Email',
                        'Action',
                    );
                    render_datatable($table_data, 'setting');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>