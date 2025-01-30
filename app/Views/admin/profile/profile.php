<?= $this->extend("layouts/backend_layout")?>
<?= $this->section("content")?>
    <?php 
        if($dashboard == 1){
            echo view("backend/profile/profilep"); 
        }
        if($dashboard == 2){
            echo view("backend/profile/edit"); 
        }
        
    ?>
<?= $this->endSection()?> 