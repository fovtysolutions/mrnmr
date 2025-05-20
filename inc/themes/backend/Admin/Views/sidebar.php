<style>
  .nav-icon {
    scroll-behavior: smooth !important;
    overflow-y: scroll !important;
    scrollbar-width: none !important;
  }

  .m-sidebar a:hover {
    color: #ffffff !important;
  }

  @media (min-width: 768px) and (max-width: 991px) {
    .az-body.az-iconbar-show .az-iconbar-aside {
      display: block;
    }

    .az-body.az-iconbar-show .m-sidebar {
      display: block;
    }

    .az-iconbar {
      width: 85px;
      padding: 20px 8px;
    }

    .az-iconbar-aside {
      width: 250px;
      left: 85px;
    }
  }
</style>
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
<div class="az-iconbar m-sidebar">
    <a href="<?= base_url() ?>" class="az-iconbar-logo">
        <img src="<?php echo _ec(base_url((!empty($setting->logo) ? $setting->logo : 'assets/img/logo.png'))) ?>" alt="MR n MR Logo" class="logo-image-icon">
    </a>
    <nav class="nav-icon">
        <?php foreach ($menuItems as $config):?>
            <?php if (!empty($config['menu']) && is_array($config['menu']) && permissionvaluecheck($config['id'], 'view')): ?> 
                <a href="#<?=$config['id']?>" class="nav-link <?= $route == $config['id'] ? 'active' : '' ?>">
                    <img width="24" height="24" src="<?= base_url('assets/img/'.$config['icon']) ?>" alt="<?=$config['id']?>" />
                    <span><?= $config['name'] ?></span>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </nav>
</div>
<div class="az-iconbar-aside">
    <div class="az-iconbar-header">
        <!-- <a href="index.php" class="az-logo">Logo</a> -->
        <a href="#" class="az-iconbar-toggle-menu">
            <i class="icon ion-md-arrow-back"></i>
            <i class="icon ion-md-close"></i>
        </a>
    </div>
    <div class="az-iconbar-body">
        <ul class="metismenu">
            <?php   foreach ($menuItems as $config):?>
                <?php if (!empty($config['menu']) && is_array($config['menu']) && !empty($config['menu']['sub_menu']) && is_array($config['menu']['sub_menu'])): ?> 
                    <div id="<?=$config['id']?>" class="az-iconbar-pane <?= $route == $config['id'] ? 'active' : '' ?>">
                        <h6 class="az-iconbar-title"><?= $config['name'] ?></h6>
                        <ul class="nav">
                            <?php foreach ($config['menu']['sub_menu'] as $submenu): ?>
                                <?php if(permissionvaluecheck($submenu['id'], 'view')): ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url($submenu['id']) ?>" style="color:#ffffff"><?= $submenu['name'] ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php elseif (!empty($config['menu']) && is_array($config['menu'])): ?> 
                    <div id="<?=$config['id']?>" class="az-iconbar-pane <?= $route == $config['id'] ? 'active' : '' ?>">
                        <h6 class="az-iconbar-title"><?= $config['name'] ?></h6>
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="<?= base_url($config['id']) ?>" style="color:#ffffff"><?= $config['name'] ?></a>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php } ?>
<!--end::Sidebar-->