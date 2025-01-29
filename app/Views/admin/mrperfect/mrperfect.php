<?= $this->extend("layouts/layout")?>
<?= $this->section("content")?>
<script>window.masterkey = '<?=$masterkey?>'; window.downloadRoute = null;</script>
    <div class="az-content-body az-content-body-dashboard-six">
        <!-- Upper Tabs -->
        <div class="card-body-container">
            <?php echo view('hooks/module/fronttabcontent'); ?>
        </div>
    </div>
<?= $this->endSection("content")?>