<?= $this->extend("layouts/layout")?>
<?= $this->section("content")?>
<?php 
    if ($editit) { 
        $id = $detailsdata['id'];
        $role_name = $detailsdata['role_name'];
        $role_discription = $detailsdata['role_discription'];
        $role_status = $detailsdata['role_status'];
    } else {
        $id = '';
        $role_name = '';
        $role_discription = '';
        $role_status = '';
    }
 ?>
        <div class="az-content-body az-content-body-dashboard-six">
            <div class="card-body-container">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h4><?=$heading?></h4>
                    <div class="ml-auto">
                        <a href="<?=base_url('/roleandpermission/2')?>">
                            <button class="btn btn-primary">
                                <i class="fas fa-list me-2"></i> List
                            </button>
                        </a>
                    </div>
                </div>
                <form id="rolesForm">
                    <div class="table-responsive p-0">
                        <div class="row">
                            <!-- Role Name -->
                            <div class="col-md-4 col-xl-4">
                                <div class="form-group row">
                                    <label for="role_name" class="col-sm-4 col-form-label">Role Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="role_name" name="role_name" placeholder="Role Name" value="<?=$role_name==''?'':$role_name?>">
                                        <span id="role_name_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Role Description -->
                            <div class="col-md-4 col-xl-4">
                                <div class="form-group row">
                                    <label for="role_discription" class="col-sm-4 col-form-label">Role Description</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control form-control-sm" id="role_discription" name="role_discription" placeholder="Role Description" value="<?=$role_discription==''?'':$role_discription?>">
                                        <span id="role_discription_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Role Status -->
                            <div class="col-md-4 col-xl-4">
                                <div class="form-group row">
                                    <label for="role_status" class="col-sm-4 col-form-label">Role Status</label>
                                    <div class="col-sm-8">
                                        <select class="form-control form-control-sm" id="role_status" name="role_status">
                                            <option value="<?=$role_status==''?'':$role_status?>" selected><?=$role_status==''?'Select status':$role_status?></option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                        <span id="role_status_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="permission" id="permission"/>
                            <?php if ($editit) { ?>
                                <input type="hidden" name="edit" value="<?=$editit?>"/>
                            <?php } ?>
                        </div>
                        <div class="table-page-container p-0">
                            <table class="table-page">
                                <thead>
                                    <tr>
                                        <th>Module Name</th>
                                        <th>Create</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Download</th>
                                        <th>All</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($permissions as $key => $value) { ?>
                                        <tr>
                                            <td><?=$value['discription']?></td>
                                            <td><input type="checkbox" id="create<?=$key?>" class="create" name="roles_permissions_create" value="<?=$value['discription']?>"></td>
                                            <td><input type="checkbox" id="view<?=$key?>" class="view" name="roles_permissions_view" value="<?=$value['discription']?>"></td>
                                            <td><input type="checkbox" id="edit<?=$key?>" class="edit" name="roles_permissions_edit" value="<?=$value['discription']?>"></td>
                                            <td><input type="checkbox" id="delete<?=$key?>" class="delete" name="roles_permissions_delete" value="<?=$value['discription']?>"></td>
                                            <td><input type="checkbox" id="download<?=$key?>" class="download" name="roles_permissions_download" value="<?=$value['discription']?>"></td>
                                            <td><input type="checkbox" id="all<?=$key?>" class="all" name="roles_permissions_all" value="<?=$value['discription']?>"></td>
                                        </tr>
                                        <script>
                                            $(document).ready(function() {
                                                const allCheckboxId = '#all<?=$key?>';
                                                const actions = ['create', 'view', 'edit', 'delete', 'download'];
                                                $(allCheckboxId).change(function() {
                                                    const isChecked = $(this).prop('checked');
                                                    actions.forEach(action => {
                                                        const checkbox = $(`#${action}<?=$key?>`);
                                                        checkbox.prop('checked', isChecked);
                                                        checkbox.change();
                                                    });
                                                });
                                                actions.forEach(action => {
                                                    const checkbox = $(`#${action}<?=$key?>`);
                                                    checkbox.change(function() {
                                                        const allChecked = actions.every(action => $(`#${action}<?=$key?>`).prop('checked'));
                                                        $(allCheckboxId).prop('checked', allChecked); 
                                                    });
                                                });
                                            });
                                        </script>
                                    <?php } ?>
                                    <!-- Add additional rows here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" id="savebtn" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Save
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- $('#permission').val(JSON.stringify(permission)); -->

        <script>
            $(document).ready(function() {
                let permission = <?=$permission?>; 
                $('#permission').val(JSON.stringify(permission));
                function precheckPermissions() {
                    permission.forEach((item) => {
                        $(`.${item.type}[value="${item.value}"]`).prop('checked', true);
                    });
                }
                function handlePermissionChange(actionClass, type) {
                    $(actionClass).change(function() {
                        let value = $(this).val();
                        const isChecked = $(this).prop('checked');
                        if (isChecked) {
                            const exists = permission.some(
                                (item) => item.type === type && item.value === value
                            );
                            if (!exists) {
                                const arrayData = {
                                    id: Math.floor(1000 + Math.random() * 9000), 
                                    type: type, 
                                    value: value
                                };
                                permission.push(arrayData); 
                            }
                        } else {
                            permission = permission.filter(
                                (item) => !(item.type === type && item.value === value)
                            );
                        }
                        $('#permission').val(JSON.stringify(permission));
                    });
                }
                precheckPermissions();
                handlePermissionChange('.create', 'create');
                handlePermissionChange('.view', 'view');
                handlePermissionChange('.edit', 'edit');
                handlePermissionChange('.delete', 'delete');
                handlePermissionChange('.download', 'download');
            });
        </script>



        <script>
            $("#rolesForm").submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?= base_URL('setroleandpermission')?>",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $("#savebtn").val("Please Wait...");
                    },
                    success: function (response) {
                        if (response.status === 'success') {
                            toastr.success(response.message);
                            location.href = "<?=base_url('/roleandpermission')?>";
                            $("#savebtn").html('<i class="fas fa-save me-2"></i> Save');
                        } else if (response.status === 'error') {
                            toastr.error(response.message || "An error occurred!");
                            $("#savebtn").html('<i class="fas fa-save me-2"></i> Save');
                        }
                    },
                    error: function () {
                        toastr.error("An unexpected error occurred!");
                        $("#savebtn").val("Save & Close");
                    }
                });
            })
        </script>
<?= $this->endSection("content")?>