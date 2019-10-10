<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/favicon.ico'); ?>">
    <title><?= $this->config->item('ProjectName'); ?> | <?= $fxtitle ?></title>
    <!-- UIkit -->
    <link rel="stylesheet" href="<?= base_url('core/uikit/css/uikit.min.css'); ?>"/>
    <script src="<?= base_url('core/uikit/js/uikit.min.js'); ?>"></script>
    <script src="<?= base_url('core/uikit/js/uikit-icons.min.js'); ?>"></script>
    <!-- Font Awesome and Rpg Awesome -->
    <script defer src="<?= base_url('core/fontawesome/js/all.js'); ?>"></script>
    <link rel="stylesheet" href="<?= base_url('core/rpg_awesome/css/rpg-awesome.css'); ?>">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('core/css/general.css'); ?>">
    <link rel="stylesheet" type="text/css" media="all" href="<?= base_url('theme/'); ?><?= $this->config->item('theme_name'); ?>/css/<?= $this->config->item('theme_name'); ?>.css"/>
    <!-- Wowhead -->
    <script>var whTooltips = {colorLinks: true, iconizeLinks: false, renameLinks: false};</script>
    <script type="text/javascript" src="//wow.zamimg.com/widgets/power.js"></script>
    <!-- JQuery -->
    <script src="<?= base_url('core/js/jquery-3.3.1.min.js'); ?>"></script>

    <?php if($this->m_data->isLogged()): ?>
    <link type="text/css" rel="stylesheet" media="all" href="<?= base_url('assets/chat/css/chat.css'); ?>" />
    <link type="text/css" rel="stylesheet" media="all" href="<?= base_url('assets/chat/css/screen.css'); ?>" />
    <script type="text/javascript" src="<?= base_url('assets/chat/js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/chat/js/chat.js'); ?>"></script>
    <?php endif ?>

    <!-- Notify -->
    <link rel="stylesheet" href="<?= base_url('core/amaranjs/css/amaran.min.css'); ?>">
    <script src="<?= base_url('core/amaranjs/js/jquery.amaran.min.js'); ?>"></script>
    <!-- Cookieconsent -->
    <link rel="stylesheet" href="<?= base_url('core/cookieconsent/css/cookieconsent.min.css'); ?>"/>
    <script type="text/javascript" src="<?= base_url('core/cookieconsent/js/cookieconsent.min.js'); ?>"></script>
    <script>
    window.addEventListener("load", function(){
    window.cookieconsent.initialise({
      "palette": {
        "popup": {
          "background": "rgba(21, 26, 35, 0.95)"
        },
        "button": {
          "background": "#0e86ca"
        }
      },
      "theme": "edgeless",
      "position": "bottom-right",
      "content": {
        "message": "This website uses cookies to ensure you get the best experience on our website. ",
        "dismiss": "Got it!",
        "link": "Learn more",
        "href": "<?= base_url('cookies'); ?>"
      }
    })});
    </script>
    <!-- Loader -->
    <link href="<?= base_url('core/pageloader/pace-theme-minimal.tmpl.css'); ?>" rel="stylesheet" />
    <script src="<?= base_url('core/pageloader/pace.min.js'); ?>"></script>
  </head>
  <body>
    <?php $this->load->view('general/menu'); ?>
