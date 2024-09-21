<div class="row">
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-body">

                <form id="userform" method="POST" class="form-horizontal p-t-20" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 form-group mail_type_smtpClick">
                            <label for="ff" class="col-sm-3 control-label">Mail Type</label>
                            <div class="col-sm-9 mb-3">
                                <select class="form-control" name="sendmail_type">
                                    <option value="1" <?= isset($rowData['sendmail_type']) && $rowData['sendmail_type'] == 1 ? 'selected' : '' ?>> Normal Mail </option>
                                    <option value="2" <?= isset($rowData['sendmail_type']) && $rowData['sendmail_type'] == 2 ? 'selected' : '' ?>> SMTP Mail </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="site_name" class="col-sm-3 control-label">From Email</label>
                            <div class="col-sm-9 mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="from_email" id="from_email" value="<?= isset($rowData['from_email']) ? $rowData['from_email'] : '' ?>" placeholder="Enter from email">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mail_type_smtpShow d-none">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="smtp_host" class="col-sm-3 control-label">SMTP Host</label>
                                <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="smtp_host" id="smtp_host" value="<?= isset($rowData['smtp_host']) ? $rowData['smtp_host'] : '' ?>" placeholder="Enter SMTP Host">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="smtp_host" class="col-sm-3 control-label">SMTP Username</label>
                                <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="smtp_username" id="smtp_username" value="<?= isset($rowData['smtp_username']) ? $rowData['smtp_username'] : '' ?>" placeholder="Enter SMTP Username">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="smtp_host" class="col-sm-3 control-label">SMTP Password</label>
                                <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="smtp_password" id="smtp_password" value="<?= isset($rowData['smtp_password']) ? $rowData['smtp_password'] : '' ?>" placeholder="Enter SMTP Password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="smtp_host" class="col-sm-3 control-label">SMTP Secure</label>
                                <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="smtp_secure" id="smtp_secure" value="<?= isset($rowData['smtp_secure']) ? $rowData['smtp_secure'] : '' ?>" placeholder="Enter SMTP Secure">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="smtp_host" class="col-sm-3 control-label">SMTP Port</label>
                                <div class="col-sm-9 mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="smtp_port" id="smtp_port" value="<?= isset($rowData['smtp_port']) ? $rowData['smtp_port'] : '' ?>" placeholder="Enter SMTP Port">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 text-right">
                        <div class="form-group row m-b-0">
                            <div class=" col-sm-9">
                                <button type="submit" name="submit" value="Submit" class="btn btn-dark waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>