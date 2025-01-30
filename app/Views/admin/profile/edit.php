<div class="tab-pane fade active show" id="">
    <div class="card-body">
        <form action="<?= base_url('/profile/updateprofile') ?>" method="post">
            <?= csrf_field(); ?>
            <div class="row gy-4">
             
                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control form-control-sm" id="username" name="username" 
                               value="<?= esc($branch['username']); ?>" placeholder="Enter username">
                        <small id="username_error" class="text-danger"></small>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control form-control-sm" id="email" name="email" 
                               value="<?= esc($branch['email']); ?>" placeholder="Enter email">
                        <small id="email_error" class="text-danger"></small>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control form-control-sm" id="mobile" name="mobile" 
                               value="<?= esc($branch['mobile']); ?>" placeholder="Enter mobile number">
                        <small id="mobile_error" class="text-danger"></small>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" class="form-control form-control-sm" id="role" name="role" 
                               value="<?= esc($branch['role']); ?>" placeholder="Enter role">
                        <small id="role_error" class="text-danger"></small>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label for="github_link" class="form-label">GitHub Link</label>
                        <input type="url" class="form-control form-control-sm" id="github_link" name="github_link" 
                               value="<?= esc($branch['github_link']); ?>" placeholder="Enter GitHub link...">
                        <small id="github_link_error" class="text-danger"></small>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label for="twitter_link" class="form-label">Twitter Link</label>
                        <input type="url" class="form-control form-control-sm" id="twitter_link" name="twitter_link" 
                               value="<?= esc($branch['twitter_link']); ?>" placeholder="Enter Twitter link...">
                        <small id="twitter_link_error" class="text-danger"></small>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label for="linkdin_link" class="form-label">LinkedIn Link</label>
                        <input type="url" class="form-control form-control-sm" id="linkdin_link" name="linkdin_link" 
                               value="<?= esc($branch['linkdin_link']); ?>" placeholder="Enter LinkedIn link...">
                        <small id="linkdin_link_error" class="text-danger"></small>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label for="portfolio_link" class="form-label">Portfolio Link</label>
                        <input type="url" class="form-control form-control-sm" id="portfolio_link" name="portfolio_link" 
                               value="<?= esc($branch['portfolio_link']); ?>" placeholder="Enter Portfolio link...">
                        <small id="portfolio_link_error" class="text-danger"></small>
                    </div>
                </div>
                
                <div class="col-md-6 col-xl-4">
                    <div class="form-group">
                        <label for="formtextarea" class="form-label">Description</label>
                        <textarea class="form-control" id="formtextarea" placeholder="Enter here..."  name="formtextarea" rows="3"><?= esc($branch['formtextarea']); ?></textarea>
                    </div>
                </div>

            </div> <!-- End of row -->
           
            <div class="form-buttons mt-4 text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i> Save & Close
                </button>
                <a class="btn btn-danger" href="#cancel" role="button">
                    <i class="fas fa-times me-2"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
