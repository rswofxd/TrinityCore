    <div class="uk-navbar-container uk-navbar-transparent">
      <div class="uk-container">
        <nav class="uk-navbar" uk-navbar>
          <div class="uk-navbar-left">
            <a href="<?= base_url(); ?>" class="uk-navbar-item uk-logo uk-margin-small-right" width="28" height="34"><?= $this->config->item('ProjectName'); ?></a>
            <ul class="uk-navbar-nav uk-visible@m">
              <?php foreach ($this->m_general->getMenu()->result() as $menulist): ?>
              <?php if($this->m_permissions->getMyPermissions($menulist->permissions)): ?>
              <?php if($menulist->father == '1'): ?>
              <li>
                <a href="#" <?= $menulist->extras ?>>
                  <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?><span uk-icon="chevron-down"></span>
                </a>
                <div class="uk-navbar-dropdown">
                  <ul class="uk-nav uk-navbar-dropdown-nav">
                    <?php foreach ($this->m_general->getMenuSon($menulist->id)->result() as $menusonlist): ?>
                      <li>
                        <a href="<?= base_url($menusonlist->url); ?>" <?= $menusonlist->extras ?>>
                          <i class="<?= $menusonlist->icon ?>"></i>&nbsp;<?= $menusonlist->name ?>
                        </a>
                      </li>
                    <?php endforeach ?>
                  </ul>
                </div>
              </li>
              <?php elseif($menulist->father == '0' && $menulist->son == '0'): ?>
              <li>
                <a href="<?= base_url($menulist->url); ?>" <?= $menulist->extras ?>>
                  <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                </a>
              </li>
              <?php endif ?>
              <?php endif ?>
              <?php endforeach ?>
            </ul>
          </div>
          <div class="uk-navbar-right">
            <ul class="uk-navbar-nav uk-visible@m">
              <li>
                <?php if ($this->m_data->isLogged()): ?>
                <a href="#"><?= $this->session->userdata('fx_sess_username'); ?> #<?= $this->session->userdata('fx_sess_tag'); ?><span uk-icon="chevron-down"></span></a>
                <?php else: ?>
                <a href="#"><?= $this->lang->line('nav_account'); ?><span uk-icon="chevron-down"></span></a>
                <?php endif ?>
                <div class="uk-navbar-dropdown">
                  <ul class="uk-nav uk-navbar-dropdown-nav">
                    <?php if (!$this->m_data->isLogged()): ?>
                    <?php if($this->m_modules->getStatusLogin() == '1'): ?>
                    <li><a href="<?= base_url('login'); ?>"><i class="fas fa-sign-in-alt"></i> <?= $this->lang->line('button_login'); ?></a></li>
                    <?php endif ?>
                    <?php if($this->m_modules->getStatusRegister() == '1'): ?>
                    <?php if($this->m_permissions->getMyPermissions('Permission_Register')): ?>
                    <li><a href="<?= base_url('register'); ?>"><i class="fas fa-user-plus"></i> <?= $this->lang->line('button_account_create'); ?></a></li>
                    <?php endif ?>
                    <?php endif ?>
                    <?php endif ?>
                    <?php if ($this->m_data->isLogged()): ?>
                    <?php if($this->m_modules->getStatusUCP() == '1'): ?>
                    <?php if($this->m_permissions->getMyPermissions('Permission_Panel')): ?>
                    <li><a href="<?= base_url('panel'); ?>"><i class="far fa-user-circle"></i> <?= $this->lang->line('button_user_panel'); ?></a></li>
                    <?php endif ?>
                    <?php endif ?>
                    <?php if($this->m_modules->getACP() == '1'): ?>
                    <?php if($this->m_permissions->getMyPermissions('Permission_ACP')): ?>
                    <li><a href="<?= base_url('admin'); ?>"><i class="fas fa-cog"></i> <?= $this->lang->line('button_admin_panel'); ?></a></li>
                    <?php endif ?>
                    <?php endif ?>
                    <?php if($this->m_modules->getStatusGifts() == '1'): ?>
                    <li><a href="<?= base_url('user/gifts'); ?>"><i class="fas fa-gift"></i> <?= $this->lang->line('button_gifts'); ?></a></li>
                    <?php endif ?>
                    <li><a href="#" id="fx_logout"><i class="fas fa-sign-out-alt"></i> <?= $this->lang->line('button_logout'); ?></a></li>
                    <script>
                    $(document).ready(function() {
                      $("#fx_logout").click(function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: '<?= base_url('user/logout') ?>',
                            cache: false,
                            success:function(data) {
                              location.reload();
                            }
                        });
                      });
                    });
                    </script>
                    <?php endif ?>
                  </ul>
                </div>
              </li>
            </ul>
            <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#mobile" uk-toggle></a>
            <!-- friends -->
            <div class="uk-offcanvas-content">
              <div id="chat" uk-offcanvas="flip: false">
                <div class="uk-offcanvas-bar">
                  <button class="uk-offcanvas-close" type="button" uk-close></button>
                  <div class="uk-panel">
                    <ul class="uk-nav uk-nav-default">
                      <li class="uk-nav-header uk-text-center"><span uk-icon="icon: commenting"></span> <?= $this->lang->line('chat_header'); ?></li>
                      <li class="uk-nav-divider"></li>
                      <?php foreach ($this->m_data->getUsers()->result() as $users): ?>
                      <?php if($users->id != $this->session->userdata('fx_sess_id')): ?>
                      <li class="uk-text-center">
                        <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/'.$this->m_data->getNameAvatar($this->m_data->getImageProfile($users->id))); ?>" width="25" height="25" alt=""/>
                        <button class="uk-button uk-button-text" onclick="javascript:chatWith('<?= $users->id ?>','<?= $users->username ?>#<?= $this->m_data->getTag($users->id); ?>')"><?= $users->username ?>#<?= $this->m_data->getTag($users->id); ?></button>
                      </li>
                      <?php endif ?>
                      <?php endforeach ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- mobile -->
            <div class="uk-offcanvas-content">
              <div id="mobile" uk-offcanvas="flip: true">
                <div class="uk-offcanvas-bar">
                  <button class="uk-offcanvas-close" type="button" uk-close></button>
                  <div class="uk-panel">
                    <p class="uk-logo uk-text-center uk-margin-small"><?= $this->config->item('ProjectName'); ?></p>
                    <?php if ($this->m_data->isLogged()): ?>
                    <div class="uk-padding-small uk-padding-remove-vertical uk-margin-small uk-text-center">
                        <a href="<?= base_url('profile/'.$this->session->userdata('fx_sess_id')); ?>">
                          <?php if($this->m_general->getUserInfoGeneral($this->session->userdata('fx_sess_id'))->num_rows()): ?>
                          <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/'.$this->m_data->getNameAvatar($this->m_data->getImageProfile($this->session->userdata('fx_sess_id')))); ?>" width="36" height="36" alt="" uk-tooltip="title: Profile; pos: right">
                          <?php else: ?>
                          <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/default.png'); ?>" width="36" height="36" alt="" uk-tooltip="title: Profile; pos: right">
                          <?php endif ?>
                        </a>
                        <span class="uk-label"><?= $this->session->userdata('fx_sess_username'); ?> #<?= $this->session->userdata('fx_sess_tag'); ?></span>
                    </div>
                    <?php endif ?>
                    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
                      <?php if (!$this->m_data->isLogged()): ?>
                      <?php if($this->m_modules->getStatusLogin() == '1'): ?>
                      <?php if($this->m_permissions->getMyPermissions('Permission_Login')): ?>
                      <li><a href="<?= base_url('login'); ?>"><i class="fas fa-sign-in-alt"></i> <?= $this->lang->line('button_login'); ?></a></li>
                      <?php endif ?>
                      <?php endif ?>
                      <?php endif ?>
                      <?php if ($this->m_data->isLogged()): ?>
                      <?php if($this->m_modules->getStatusUCP() == '1'): ?>
                      <?php if($this->m_permissions->getMyPermissions('Permission_Panel')): ?>
                      <li><a href="<?= base_url('panel'); ?>"><i class="far fa-user-circle"></i> <?= $this->lang->line('button_user_panel'); ?></a></li>
                      <?php endif ?>
                      <?php endif ?>
                      <?php if($this->m_modules->getACP() == '1'): ?>
                      <?php if($this->m_permissions->getMyPermissions('Permission_ACP')): ?>
                      <li><a href="<?= base_url('admin'); ?>"><i class="fas fa-cog"></i> <?= $this->lang->line('button_admin_panel'); ?></a></li>
                      <?php endif ?>
                      <?php endif ?>
                      <?php if($this->m_modules->getStatusGifts() == '1'): ?>
                      <li><a href="<?= base_url('user/gifts'); ?>"><i class="fas fa-gift"></i> <?= $this->lang->line('button_gifts'); ?></a></li>
                      <?php endif ?>
                      <li><a href="#" id="fx_mobile_logout"><i class="fas fa-sign-out-alt"></i> <?= $this->lang->line('button_logout'); ?></a></li>
                      <script>
                        $(document).ready(function() {
                          $("#fx_mobile_logout").click(function(e) {
                            e.preventDefault();
                            $.ajax({
                              url: '<?= base_url('user/logout') ?>',
                              cache: false,
                              success:function(data) {
                                location.reload();
                              }
                            });
                          });
                        });
                      </script>
                      <?php endif ?>
                      <?php foreach ($this->m_general->getMenu()->result() as $menulist): ?>
                      <?php if($this->m_permissions->getMyPermissions($menulist->permissions)): ?>
                      <?php if($menulist->father == '1'): ?>
                      <li class="uk-parent">
                        <a href="#" <?= $menulist->extras ?>>
                          <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                        </a>
                        <ul class="uk-nav-sub">
                          <?php foreach ($this->m_general->getMenuSon($menulist->id)->result() as $menusonlist): ?>
                          <li>
                            <a href="<?= base_url($menusonlist->url); ?>" <?= $menusonlist->extras ?>>
                              <i class="<?= $menusonlist->icon ?>"></i>&nbsp;<?= $menusonlist->name ?>
                            </a>
                          </li>
                          <?php endforeach ?>
                        </ul>
                      </li>
                      <?php elseif($menulist->father == '0' && $menulist->son == '0'): ?>
                      <li>
                        <a href="<?= base_url($menulist->url); ?>" <?= $menulist->extras ?>>
                          <i class="<?= $menulist->icon ?>"></i>&nbsp;<?= $menulist->name ?>
                        </a>
                      </li>
                      <?php endif ?>
                      <?php endif ?>
                      <?php endforeach ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
