<div class="az-content-body az-content-body-dashboard-six">
    <div class="card-body-container">
        <!-- Tab Content -->
        <div class="card-title d-flex justify-content-between align-items-center">
            <h4><?= $heading ?></h4>
        </div>
        <form id="<?= $formid ?>">
            <?php if ($editit) { ?>
                <input type="hidden" name="edit" value="<?= $editit ?>">
            <?php } ?>
            <input type="hidden" name="permissions" id="permission"/>
            <div class="table-responsive p-0">
                <div class="row">
                    <!-- Role Name -->
                    <div class="col-md-4 col-xl-4">
                        <div class="form-group row">
                            <label for="role_name" class="col-sm-4 col-form-label">Role Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="role_name" name="role_name"
                                    placeholder="Role Name" value="<?= isset($detailsdata->role_name) ? $detailsdata->role_name : '' ?>">
                                <span id="role_name_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Role Description -->
                    <div class="col-md-4 col-xl-4">
                        <div class="form-group row">
                            <label for="role_discription" class="col-sm-4 col-form-label">Role Description</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="role_discription"
                                    name="role_discription" placeholder="Role Description"
                                    value="<?= isset($detailsdata->role_discription) ? $detailsdata->role_discription : '' ?>">
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
                                    <option <?= isset($detailsdata->role_status) && $detailsdata->role_status == 'Active' ? 'selected' : '' ?> value="active" >Active</option>
                                    <option <?= isset($detailsdata->role_status) && $detailsdata->role_status == 'Deactive' ? 'selected' : '' ?> value="inactive">Inactive</option>
                                </select>
                                <span id="role_status_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="permission" id="permission" />
                </div>
                <?php 
                    $request = \Config\Services::request();
                    $uri = service('uri'); 
                    $route = $uri->getSegment(1);
                    $menuItems = [];

                    if (file_exists(ROOTPATH . 'inc/core')) {
                        $modulesPath = ROOTPATH . 'inc/core/';
                        $modules = scandir($modulesPath);

                        foreach ($modules as $module) {
                            if ($module === '.' || $module === '..' || $module === 'Home') continue;

                            $configPath = $modulesPath . $module . '/Config.php';
                            if (file_exists($configPath)) {
                                $config = require($configPath);
                                if (isset($config['position'])) {
                                    $menuItems[] = $config; 
                                }
                            }
                        }

                        usort($menuItems, function ($a, $b) {
                            return $a['position'] <=> $b['position'];
                        }); 
                ?>
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
                            <?php foreach ($menuItems as $key => $config):?>
                                <?php if (!empty($config['menu']) && is_array($config['menu']) && !empty($config['menu']['sub_menu']) && is_array($config['menu']['sub_menu'])): ?> 
                                    <?php foreach ($config['menu']['sub_menu'] as $submenu): ?>
                                        <tr class="permission">
                                            <td><?=$submenu['name']?></td>
                                            <td><input type="checkbox" id="create<?=$key?>" data-per="create" class="create"  value="<?=$submenu['id']?>"></td>
                                            <td><input type="checkbox" id="view<?=$key?>" data-per="view" class="view" value="<?=$submenu['id']?>"></td>
                                            <td><input type="checkbox" id="edit<?=$key?>" data-per="edit" class="edit" value="<?=$submenu['id']?>"></td>
                                            <td><input type="checkbox" id="delete<?=$key?>" data-per="delete" class="delete" value="<?=$submenu['id']?>"></td>
                                            <td><input type="checkbox" id="download<?=$key?>" data-per="download" class="download" value="<?=$submenu['id']?>"></td>
                                            <td><input type="checkbox" id="all<?=$key?>" data-per="all" class="all" value="<?=$submenu['id']?>"></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php elseif (!empty($config['menu']) && is_array($config['menu'])): ?> 
                                        <tr class="permission">
                                            <td><?=$config['name']?></td>
                                            <td><input type="checkbox" id="create<?=$key?>" data-per="create" class="create"  value="<?=$config['id']?>"></td>
                                            <td><input type="checkbox" id="view<?=$key?>" data-per="view" class="view" value="<?=$config['id']?>"></td>
                                            <td><input type="checkbox" id="edit<?=$key?>" data-per="edit" class="edit" value="<?=$config['id']?>"></td>
                                            <td><input type="checkbox" id="delete<?=$key?>" data-per="delete" class="delete" value="<?=$config['id']?>"></td>
                                            <td><input type="checkbox" id="download<?=$key?>" data-per="download" class="download" value="<?=$config['id']?>"></td>
                                            <td><input type="checkbox" id="all<?=$key?>" data-per="all" class="all" value="<?=$config['id']?>"></td>
                                        </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <!-- Add additional rows here -->
                        </tbody>
                    </table>
                </div>
                <?php } ?>
            </div>
            <div class="mt-3">
                <button type="submit" id="savebtn" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i> Save
                </button>
                <button type="button" class="btn btn-danger" onclick="history.back();">
                    <i class="fas fa-times me-2"></i> Cancel
                </button>
            </div>
        </form>
    </div>
</div>
<?php echo $this->section('script') ?>
<script>
    $(document).ready(function () {
        let permission = <?=$permission?>; 
        $('#permission').val(JSON.stringify(permission));
        function precheckPermissions() {
            permission.forEach((item) => {
                $(`.${item.type}[value="${item.value}"]`).prop('checked', true);
            });
            updateAllCheckboxes(); 
        }
        function handlePermissionChange(actionClass, type) {
            $(document).on('input change', actionClass, function () {
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
                updateAllCheckboxes(); 
            });
        }
        $(document).on('change', '.all', function () {
            let $this = $(this);
            let checkit = $this.prop('checked');
            let $box = $this.closest('.permission');
            $box.find('.create, .view, .edit, .delete, .download').each(function () {
                $(this).prop('checked', checkit).trigger('change');
            });
        });
        function updateAllCheckboxes() {
            $('.permission').each(function () {
                const $box = $(this);
                const allChecked = $box.find('.create, .view, .edit, .delete, .download').length ===
                                $box.find('.create:checked, .view:checked, .edit:checked, .delete:checked, .download:checked').length;
                $box.find('.all').prop('checked', allChecked);
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
<?php echo view('common_script/formsubmit', ['formid' => $formid, 'submitbtn' => 'savebtn', 'formurl' => $formroute]); ?>
<?php echo $this->endSection() ?>