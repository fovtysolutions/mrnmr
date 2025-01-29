<?= $this->extend("layouts/auth_layout")?>
<?= $this->section("auth_content")?>
    <?php 
        if($dashboard == "login"){
            echo $this->include("auth/login"); 
        }
        if($dashboard == "register"){
            echo $this->include("auth/register"); 
        }
        if($dashboard == "forgotpassword"){
            echo $this->include("auth/forgotpassword"); 
        }
        if($dashboard == "resetpassword"){
            echo $this->include("auth/resetpassword"); 
        }
    ?>
<?= $this->endSection()?> 
