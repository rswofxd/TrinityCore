<?php
require_once 'config/config.php';
require_once 'class/Core.php';
require_once 'class/Remove.php';

$isCompleted = FALSE;
$core = new Core;
$check = $core->init($config);

if ($_POST):
    $core->setInput($_POST);

    if ($core->checkDB()):
        $core->createTables();

        if ($core->reWrite())
            $isCompleted = TRUE;
    endif;
endif;

if (isset($_POST['delete_install'])):
    $install_folder = '../install/';
    targetFiles($install_folder);
    echo '<script>window.location.href = "/";</script>';
endif;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
    <title>Installation | BlizzCMS</title>
    <!-- UIkit -->
    <link rel="stylesheet" href="../core/uikit/css/uikit.min.css"/>
    <script src="../core/uikit/js/uikit.min.js"></script>
    <script src="../core/uikit/js/uikit-icons.min.js"></script>
    <!-- Font Awesome -->
    <script src="../core/fontawesome/js/all.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="../core/css/install.css">
    <!-- JQuery -->
    <script src="../core/js/jquery-3.3.1.min.js"></script>
  </head>
  <body>
    <div class="uk-section uk-section-xsmall" uk-height-viewport="offset-top: true;offset-bottom: true">
      <div class="uk-container">
        <h3 class="uk-h3 uk-text-center blizzcms-logo-install">BlizzCMS</h3>
        <p class="uk-text-center"><img class="uk-border-circle" src="images/ProjectsCMS.png" width="80" height="80" alt="" uk-scrollspy="cls: uk-animation-fade; delay: 400; repeat: true"></p>
        <p class="uk-text-center">We are pleased to present a new <strong>Free CMS</strong> for <strong>World of Warcraft</strong>! this cms is in constant development based on the <strong>CodeIgniter</strong> Framework and clean <strong>PHP</strong> code. For now the main functionalities are concentrated in an integrated forum, store, user panel and more...</p>
        <div class="uk-card uk-card-body">
          <form id="form_install" action="" method="POST" accept-charset="utf-8" autocomplete="off">
            <?php
              if ($core->getError()):
                echo "<div class='uk-alert-danger' uk-alert><h3 class='uk-text-bold uk-margin-remove'><i class='fas fa-exclamation-circle'></i> Error</h3><ul class='uk-margin-small-top'>";
                foreach ($core->getError() as $item):
                  echo "<li>$item</li>";
                endforeach;
                echo "</ul></div>";
              endif;
            ?>
            <h2 class="uk-h2 uk-text-uppercase uk-text-bold uk-text-center uk-light"><i class="fas fa-wrench"></i> Required Settings</h2>
            <div class="uk-text-center">
              <button class="uk-button uk-button-primary" type="button" uk-toggle="target: #requirements"><i class="fas fa-question-circle"></i> What do I need to run this <strong>website</strong>?</button>
              <button class="uk-button uk-button-primary" type="button" uk-toggle="target: #guide"><i class="fas fa-question-circle"></i> How to enable modules/extensions</button>
            </div>
            <hr class="uk-hr">
            <?php if ($isCompleted):
              echo "<div class='uk-alert-success' uk-alert><h3 class='uk-text-bold uk-margin-remove'><i class='far fa-check-circle'></i> Successful</h3>The installation was successful, Now press the button <strong>Continue with installation</strong> for delete install folder and continue</div><div class='uk-margin'><button class='uk-button uk-button-primary uk-width-1-1' type='submit' name='delete_install'><i class='fas fa-cog fa-spin'></i> Continue with the installation</button></div>";
            else:
            if ($check):
              echo "<div class='uk-alert-danger' uk-alert><h3 class='uk-text-bold uk-margin-remove'><i class='fas fa-exclamation-circle'></i> Error</h3><ul class='uk-margin-small-top'>";
              foreach ($check as $item) :
                echo "<li>$item</li>";
              endforeach;
              echo "</ul></div>";
            else:
            ?>
            <div class="uk-grid uk-child-width-1-1 uk-child-width-1-2@s" data-uk-grid>
              <div>
                <div class="uk-margin uk-light">
                  <label class="uk-form-label uk-text-uppercase">Server Name</label>
                  <div class="uk-form-controls">
                    <input name="ProjectName" class="uk-input" type="text" id="ProjectName" placeholder="Example: MyServer" required>
                  </div>
                </div>
                <div class="uk-margin uk-light">
                  <div class="uk-grid-small" uk-grid>
                    <div class="uk-inline uk-width-1-2@s">
                      <label class="uk-form-label uk-text-uppercase">Expansion</label>
                      <div class="uk-form-controls">
                        <select name="expansion_id" class="uk-select" id="expansion_id" style="background-color: rgba(0,0,0,.15);">
                          <option value="1">Vanilla</option>
                          <option value="2">The Burning Crusade</option>
                          <option value="3">Wrath of the Lich King</option>
                          <option value="4">Cataclysm</option>
                          <option value="5">Mist of Pandaria</option>
                          <option value="6">Warlords of Draenor</option>
                          <option value="7">Legion</option>
                          <option value="8">Battle for Azeroth</option>
                        </select>
                      </div>
                    </div>
                    <div class="uk-inline uk-width-1-2@s">
                      <label class="uk-form-label uk-text-uppercase">Language</label>
                      <div class="uk-form-controls">
                        <select name="language" class="uk-select" id="language" style="background-color: rgba(0,0,0,.15);">
                          <option value="english">English</option>
                          <option value="french">French</option>
                          <option value="german">German</option>
                          <option value="hungarian">Hungarian</option>
                          <option value="portuguese">Portuguese</option>
                          <option value="russian">Russian</option>
                          <option value="spanish">Spanish</option>
                          <option value="thai">Thai</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="uk-margin uk-light">
                  <label class="uk-form-label uk-text-uppercase">Url of Website</label>
                  <div class="uk-form-controls">
                    <input name="base_url" class="uk-input" type="url" id="base_url" placeholder="Example: http://domain.com/ or https://domain.com/" required>
                  </div>
                </div>
                <div class="uk-margin uk-light">
                  <div class="uk-grid-small" uk-grid>
                    <div class="uk-inline uk-width-1-2@s">
                      <label class="uk-form-label uk-text-uppercase">Realmlist</label>
                      <div class="uk-form-controls">
                        <input name="realmlist" class="uk-input" type="text" id="realmlist" placeholder="Example: logon.domain.com" required>
                      </div>
                    </div>
                    <div class="uk-inline uk-width-1-2@s">
                      <label class="uk-form-label uk-text-uppercase">Discord INV ID</label>
                      <div class="uk-form-controls">
                        <input name="discord_inv" class="uk-input" type="text" id="discord_inv" placeholder="Example: WGGGVgX" required>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <div class="uk-margin uk-light">
                  <div class="uk-grid-small" uk-grid>
                    <div class="uk-inline uk-width-1-2@s">
                      <label class="uk-form-label uk-text-uppercase"><strong>Website</strong> Database Hostname</label>
                      <div class="uk-form-controls">
                        <input name="hostname" class="uk-input" type="text" id="hostname" placeholder="Example: 127.0.0.1" required>
                      </div>
                    </div>
                    <div class="uk-inline uk-width-1-2@s">
                      <label class="uk-form-label uk-text-uppercase"><strong>Website</strong> Database Name</label>
                      <div class="uk-form-controls">
                        <input name="database" class="uk-input" type="text" id="database" placeholder="Example: blizzcms" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="uk-margin uk-light">
                  <div class="uk-grid-small" uk-grid>
                    <div class="uk-inline uk-width-1-2@s">
                      <label class="uk-form-label uk-text-uppercase"><strong>Website</strong> Database Username</label>
                      <div class="uk-form-controls">
                        <input name="username" class="uk-input" type="text" id="username" placeholder="Example: root" required>
                      </div>
                    </div>
                    <div class="uk-inline uk-width-1-2@s">
                      <label class="uk-form-label uk-text-uppercase"><strong>Website</strong> Database Password</label>
                      <div class="uk-form-controls">
                        <input name="password" class="uk-input" type="password" id="password" placeholder="Example: ascent">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="uk-margin uk-light">
                  <div class="uk-grid-small" uk-grid>
                    <div class="uk-inline uk-width-1-2@s">
                      <label class="uk-form-label uk-text-uppercase"><strong>Auth</strong> Database Hostname</label>
                      <div class="uk-form-controls">
                        <input name="hostname2" class="uk-input" type="text" id="hostname2" placeholder="Example: 127.0.0.1" required>
                      </div>
                    </div>
                    <div class="uk-inline uk-width-1-2@s">
                      <label class="uk-form-label uk-text-uppercase"><strong>Auth</strong> Database Name</label>
                      <div class="uk-form-controls">
                        <input name="database2" class="uk-input" type="text" id="database2" placeholder="Example: auth" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="uk-margin uk-light">
                  <div class="uk-grid-small" uk-grid>
                    <div class="uk-inline uk-width-1-2@s">
                      <label class="uk-form-label uk-text-uppercase"><strong>Auth</strong> Database Username</label>
                      <div class="uk-form-controls">
                        <input name="username2" class="uk-input" type="text" id="username2" placeholder="Example: root" required>
                      </div>
                    </div>
                    <div class="uk-inline uk-width-1-2@s">
                      <label class="uk-form-label uk-text-uppercase"><strong>Auth</strong> Database Password</label>
                      <div class="uk-form-controls">
                        <input name="password2" class="uk-input" type="password" id="password2" placeholder="Example: ascent">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="uk-margin">
              <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" type="submit" form="form_install"><i class="fas fa-cog fa-spin"></i> Start Installation</button>
            </div>
            <?php endif;endif; ?>
          </form>
        </div>
      </div>
    </div>
    <div class="uk-section-xsmall">
      <div class="uk-container uk-container-expand uk-text-center uk-position-relative">
        <div class="uk-flex-inline uk-flex-center uk-margin-small">
          <a target="_blank" href="https://gitlab.com/ProjectCMS/BlizzCMS" class="uk-icon-button uk-light uk-margin-small-right"><i class="fab fa-gitlab"></i></a>
          <a target="_blank" href="https://discord.gg/7QcXfJE" class="uk-icon-button  uk-light uk-margin-small-right"><i class="fab fa-discord"></i></a>
        </div>
        <h5 class="uk-h5 uk-margin-remove">Proudly powered by <span class="uk-text-bold">ProjectCMS</span></h5>
      </div>
    </div>
    <div id="requirements" uk-modal>
      <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-outside" type="button" uk-close></button>
        <h2 class="uk-modal-title uk-text-center"><i class="fas fa-question-circle"></i> What requirements need this website?</h2>
        <p class="uk-text-uppercase uk-text-bold"><i class="fas fa-server"></i> Host Requirements:</p>
        <ul class="uk-list uk-list-bullet">
          <li class="uk-text-success uk-text-bold">PHP +7.1</li>
        </ul>
        <hr class="uk-hr">
        <p class="uk-text-uppercase uk-text-bold"><i class="fas fa-cogs"></i> Apache Modules Required:</p>
        <ul class="uk-list uk-list-bullet">
          <li>mod_rewrite</li>
          <li>mod_headers</li>
          <li>mod_expires</li>
          <li>mod_deflate</li>
        </ul>
        <hr class="uk-hr">
        <p class="uk-text-uppercase uk-text-bold"><i class="fas fa-cogs"></i> PHP Extensions Required:</p>
        <ul class="uk-list uk-list-bullet">
          <li>php_curl</li>
          <li>php_openssl</li>
          <li>php_soap</li>
          <li>php_gd</li>
          <li>php_mbstring</li>
          <li>php_json</li>
        </ul>
      </div>
    </div>
    <div id="guide" uk-modal>
      <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-outside" type="button" uk-close></button>
        <h2 class="uk-modal-title uk-text-center"><i class="fas fa-question-circle"></i> How to Enable Apache Modules?</h2>
        <p>Go into your Apache directory and find the <b>httpd.conf</b> file. Mine was located in "C:\wamp\bin\apache\apache2.4.28\conf\". Open the file with a text editor and search (CTRL+F) for one of the modules you need to enable. To enable them, simply remove the #-character in front of the line.</p>
        <p class="uk-text-center"><img src="images/apache.jpg" style="border:1px solid #ccc; height: 85%; width: 85%" /></p>
        <hr class="uk-hr">
        <h2 class="uk-modal-title uk-text-center"><i class="fas fa-question-circle"></i> How to Enable PHP Extensions?</h2>
        <p>Go into your PHP directory and find the <b>php.ini</b> file. Mine was located in "C:\wamp\bin\php\php7.2.11". Open the file with a text editor and search (CTRL+F) for one of the modules you need to enable. To enable them, simply remove the ;-character in front of the line.</p>
        <p class="uk-text-center"><img src="images/php.jpg" style="border:1px solid #ccc; height: 85%; width: 85%" /></p>
      </div>
    </div>
  </body>
</html>
