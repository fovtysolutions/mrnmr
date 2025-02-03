<?= $this->extend("layouts/layout")?>
<?= $this->section("content")?>
    <?php 
        if($dashboard == 'Profile'){
            echo view("admin/profile/profilep"); 
        }
        if($dashboard == 'Edit Profile'){
            echo view("admin/profile/edit"); 
        }
        
    ?>
<?= $this->endSection()?> 