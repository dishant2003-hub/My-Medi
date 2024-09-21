</div>

<footer class="content-footer footer bg-footer-theme">
    <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0"> © <?= DATE('Y') ?> </div>
    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>
</div>
<!-- / Layout wrapper --> 

<?php
$cur_tab = $this->uri->segment(2) == '' ? '' : $this->uri->segment(2);
$curr_action = $this->uri->segment(3) == '' ? '' : $this->uri->segment(3);
?>
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/popper/popper.js"></script>
<script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/js/bootstrap.js"></script>
<script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/hammer/hammer.js"></script>

<!-- start form validation -->
<script src="<?php echo ADMIN_ASSETS_PATH; ?>js/form-validation.js"></script>
<!-- end form validation -->
<script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/select2/select2.js"></script>

<!-- responsive datatable -->
<script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/datatables/jquery.dataTables.js"></script>
<script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/datatables-responsive/datatables.responsive.js"></script>
<script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
<script src="<?php echo ADMIN_ASSETS_PATH; ?>js/tables-datatables-advanced.js"></script>
<script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/tagify/tagify.js"></script>
<script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/simpleLightbox/simpleLightbox.min.js"></script>
<!--end  responsive datatable -->

<script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/i18n/i18n.js"></script>
<script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/typeahead-js/typeahead.js"></script>
<script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Main JS -->
<script src="<?php echo ADMIN_ASSETS_PATH; ?>js/main.js"></script>

<script src="<?php echo ADMIN_ASSETS_PATH; ?>script/datatable.js?v=<?= date("YmdH"); ?>"></script>
<script src="<?php echo ADMIN_ASSETS_PATH; ?>script/general.js?v=<?= date("YmdH"); ?>"></script>

<script src="<?php echo ADMIN_ASSETS_PATH; ?>plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/toastr/toastr.js"></script>
<script>
    $(document).ready(function() {
        // $('.textarea_editor').wysihtml5();
        // $('.textarea_edit').wysihtml5();
        $('.textarea_editor').summernote({
            placeholder: '',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
</script>

</body>

</html>