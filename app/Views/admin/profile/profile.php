<?= $this->extend("layouts/layout")?>
<?= $this->section("content")?>
    <?php 
        if($dashboard == 1){
            echo view("admin/profile/profilep"); 
        }
        if($dashboard == 2){
            echo view("admin/profile/edit"); 
        }
        
    ?>
<?= $this->endSection()?> 