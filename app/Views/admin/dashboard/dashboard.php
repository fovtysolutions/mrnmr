<?= $this->extend("layouts/layout")?>
<?= $this->section("content")?>
<style>
 .main{
    text-align: center;
 }
 img:hover {
    transform: scale(1.1);
    transition: transform 0.3s ease;
}
</style>

<div class="az-content-body az-content-body-dashboard-three main" style="text-align: center;">
    <h2 class="az-content-title mg-b-5" style="font-size: 28px; color: #4c5258;">
        Hi, welcome to Mr & Mr
    </h2>
    <!-- <p class="mg-b-20" style="font-size: 18px; color: #555;">
        Your ad campaign performance dashboard template.
    </p> -->
    <div>
      <img 
        style="width:250px"
          src="<?= base_url('assets/img/logo.png') ?>" 
          alt="Logo Image"
      >
    </div>
</div>


<?= $this->endSection("content")?>