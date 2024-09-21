<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body pb-0">

                <?php if (check_permission('users', 'can_create', $this->user_permission)) { ?>
                    <h5 class="header-title">
                        <div class="">
                            <a href="javascript:void(0);" class="btn btn-dark add_user_ajax" data-bs-toggle="modal" data-bs-target="#user_add_ajax"><i class="fa fa-plus"></i> Add </a>
                        </div>
                    </h5>
                <?php } ?>
            </div>
            <div class="card-body pt-0">
                <div class="card-datatable table-responsive">
                    <?php
                    $table_data = array(
                        'id',
                        'User',
                        'Email', 
                        'Mobile',
                        'Birth Date',
                        'Last Login Date',
                        'Status',
                        'Action',
                    );
                    render_datatable($table_data, 'user');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="user_ajax" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="ps-popup__body" id="add_user"></div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="user_edit_ajax" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple modal-pricing">
        <div class="modal-content bg-body p-2 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="ps-popup__body" id="edit_users_ajax"></div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="user_add_ajax" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple modal-pricing">
        <div class="modal-content bg-body p-2 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="ps-popup__body" id="add_users_ajax"></div>

            </div>
        </div>
    </div>
</div>

<!-- /Modal -->