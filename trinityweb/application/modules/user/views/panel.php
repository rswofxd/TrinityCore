    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-medium" data-uk-grid>
          <div class="uk-width-1-5@m"></div>
          <div class="uk-width-3-5@m">
            <div class="uk-text-center">
              <?php if($this->m_general->getUserInfoGeneral($this->session->userdata('fx_sess_id'))->num_rows()) { ?>
                <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/').$this->m_data->getNameAvatar($this->m_data->getImageProfile($this->session->userdata('fx_sess_id'))); ?>" width="120" height="120" alt="" />
              <?php } else { ?>
                <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/default.png'); ?>" width="120" height="120" alt="" />
              <?php } ?>
              <div class="uk-space-small"></div>
              <div class="uk-principal-title"><?= $this->m_data->getUsernameID($this->session->userdata('fx_sess_id')); ?></div>
              <span class="uk-label"><?= $this->lang->line('panel_last_login'); ?>: <?= $this->user_model->getLastIp($this->session->userdata('fx_sess_id')); ?></span>
              <div class="uk-space-medium"></div>
            </div>
            <?php if(isset($_POST['button_changepass'])) {
              $oldpass = $_POST['oldpass'];
              $newpass = $_POST['newpass'];
              $reppass = $_POST['newpassr'];

              if ($reppass == $newpass)
              {
                if ($this->m_general->getExpansionAction() == 1)
                {
                  $compare = $this->m_data->Account($this->session->userdata('fx_sess_username'), $oldpass);

                  $newpassI = $this->m_data->Account($this->session->userdata('fx_sess_username'), $newpass);

                  if ($this->m_data->getPasswordAccountID($this->session->userdata('fx_sess_id')) == strtoupper($compare))
                  {
                    if ($newpassI == $this->m_data->getPasswordAccountID($this->session->userdata('fx_sess_id')))
                      echo '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('password_same').'</p></div>';
                    else
                    {
                      $this->user_model->changePasswordI($this->session->userdata('fx_sess_id'), $newpassI);
                    }
                  }
                  else
                    echo '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('opassword_not_match').'</p></div>';
                }
                else if ($this->m_general->getExpansionAction() == 2)
                {
                  $compare = $this->m_data->Battlenet($this->session->userdata('fx_sess_email'), $oldpass);

                  $newpassI = $this->m_data->Account($this->session->userdata('fx_sess_username'), $newpass);

                  $newpassII = $this->m_data->Battlenet($this->session->userdata('fx_sess_email'), $newpass);

                  if ($this->m_data->getPasswordBnetID($this->session->userdata('fx_sess_id')) == strtoupper($compare))
                  {
                    if ($newpassII == $this->m_data->getPasswordBnetID($this->session->userdata('fx_sess_id')))
                      echo '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('password_same').'</p></div>';
                    else
                    {
                      $this->user_model->changePasswordII($this->session->userdata('fx_sess_id'), $newpassI, $newpassII);
                    }
                  }
                  else
                    echo '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('opassword_not_match').'</p></div>';
                }
                else
                  echo '<div class="uk-alert-danger" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('expansion_not_found').'</p></div>';
              }
              else
                echo '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('password_not_match').'</p></div>';
            } ?>

            <?php if(isset($_POST['button_changeemail'])) {
              $password = $_POST['password'];
              $oldemail = $_POST['oldemail'];
              $newemail = $_POST['newemail'];

              if ($this->m_general->getExpansionAction() == 1)
              {
                $compare = $this->m_data->Account($this->session->userdata('fx_sess_username'), $password);

                if (strtoupper($this->session->userdata('fx_sess_email')) == strtoupper($oldemail))
                {
                  if ($this->m_data->getPasswordAccountID($this->session->userdata('fx_sess_id')) == strtoupper($compare))
                  {
                    $this->user_model->changeEmailI($this->session->userdata('fx_sess_id'), $newemail);
                  }
                  else
                    echo '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('opassword_not_match').'</p></div>';
                }
                else
                  echo '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('oemail_not_match').'</p></div>';
              }
              else if ($this->m_general->getExpansionAction() == 2)
              {
                $compare = $this->m_data->Battlenet($this->session->userdata('fx_sess_email'), $password);

                $newpasscompare = $this->m_data->Battlenet($newemail, $password);

                if ($this->user_model->getExistEmail(strtoupper($newemail)) > 0)
                  echo '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('email_used').'</p></div>';
                else
                {
                  if (strtoupper($this->session->userdata('fx_sess_email')) == strtoupper($oldemail))
                  {
                    if ($this->m_data->getPasswordBnetID($this->session->userdata('fx_sess_id')) == strtoupper($compare))
                    {
                      $this->user_model->changeEmailII($this->session->userdata('fx_sess_id'), $newemail, $newpasscompare);
                    }
                    else
                      echo '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('opassword_not_match').'</p></div>';
                  }
                  else
                    echo '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('oemail_not_match').'</p></div>';
                }
              }
              else
                echo '<div class="uk-alert-danger" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('expansion_notfound').'</p></div>';
            } ?>
            <div class="uk-scrollspy-inview uk-animation-slide-bottom" uk-scrollspy-class="">
              <div class="uk-column-1-1 uk-column-1-2@s uk-column-divider">
                <div>
                  <p><i class="far fa-user-circle"></i> <?= $this->lang->line('panel_acc_rank'); ?>: <span class="uk-label">
                    <?php if($this->m_data->getRank($this->session->userdata('fx_sess_id')) > 0) { echo 'STAFF'; } else echo 'Player'; ?></span>
                  </p>
                  <p><i class="fas fa-globe"></i> <?= $this->lang->line('panel_location'); ?>: <span class="uk-label"><?= $this->user_model->getLocation($this->session->userdata('fx_sess_id')); ?></span></p>
                  <p><i class="fas fa-gamepad"></i> <?= $this->lang->line('panel_expansion'); ?>: <span class="uk-label"><?= $this->m_general->getExpansionName(); ?></span></p>
                </div>
                <div>
                  <p><i class="far fa-credit-card"></i> <?= $this->lang->line('panel_dp'); ?>: <span class="uk-badge"><?= $this->m_general->getCharDPTotal($this->session->userdata('fx_sess_id')); ?></span></p>
                  <p><i class="fas fa-star"></i> <?= $this->lang->line('panel_vp'); ?>: <span class="uk-badge"><?= $this->m_general->getCharVPTotal($this->session->userdata('fx_sess_id')); ?></span></p>
                  <?php if($this->user_model->getExistInfo()->num_rows()) { ?>
                  <p><i class="far fa-clock"></i> <?= $this->lang->line('panel_member'); ?>: <span class="uk-label"><?= date('Y/m/d',$this->user_model->getDateMember($this->session->userdata('fx_sess_id'))); ?></span></p>
                  <?php } ?>
                </div>
              </div>
              <hr class="uk-divider-icon">
              <div class="uk-grid uk-grid-small uk-child-width-1-1 uk-child-width-1-2@s" data-uk-grid>
                <div>
                  <?php if($this->m_modules->getVote() == '1') { ?>
                  <a href="<?= base_url('vote'); ?>" class="uk-button uk-button-default uk-width-1-1"><i class="fas fa-star"></i> <?= $this->lang->line('button_vote_panel'); ?></a>
                  <?php } else { ?>
                  <button class="uk-button uk-button-default uk-width-1-1 uk-disabled"><i class="fas fa-star"></i> <?= $this->lang->line('button_vote_panel'); ?></button>
                  <?php } ?>
                </div>
                <div>
                  <?php if($this->m_modules->getDonation() == '1') { ?>
                  <a href="<?= base_url('donate'); ?>" class="uk-button uk-button-default uk-width-1-1"><i class="far fa-credit-card"></i> <?= $this->lang->line('button_donate_panel'); ?></a>
                  <?php } else { ?>
                  <button class="uk-button uk-button-default uk-width-1-1 uk-disabled"><i class="far fa-credit-card"></i> <?= $this->lang->line('button_donate_panel'); ?></button>
                  <?php } ?>
                </div>
                <div>
                  <a href="#" class="uk-button uk-button-default uk-width-1-1"><i class="fas fa-ticket-alt"></i> <?= $this->lang->line('button_support'); ?></a>
                </div>
                <div>
                  <?php if($this->user_model->getExistInfo()->num_rows()) { ?>
                  <a href="#" class="uk-button uk-button-default uk-width-1-1" uk-toggle="target: #avatars"><i class="fas fa-camera"></i> <?= $this->lang->line('button_change_avatar'); ?></a>
                  <?php } else { ?>
                  <a href="#" class="uk-button uk-button-default uk-width-1-1" uk-toggle="target: #personalinfo"><i class="far fa-user-circle"></i> <?= $this->lang->line('button_add_personal_info'); ?></a>
                  <?php } ?>
                </div>
                <div>
                  <a href="#" class="uk-button uk-button-default uk-width-1-1" uk-toggle="target: #changePassword"><i class="fas fa-key"></i> <?= $this->lang->line('button_change_password'); ?></a>
                </div>
                <div>
                  <a href="#" class="uk-button uk-button-default uk-width-1-1" uk-toggle="target: #changeEmail"><i class="far fa-envelope"></i> <?= $this->lang->line('button_change_email'); ?></a>
                </div>
              </div>
              <div class="uk-grid uk-child-width-1-1 uk-margin" data-uk-grid>
                <?php foreach ($this->m_data->getRealms()->result() as $charsMultiRealm) { 
                  $multiRealm = $this->m_data->realmConnection($charsMultiRealm->username, $charsMultiRealm->password, $charsMultiRealm->hostname, $charsMultiRealm->char_database);
                ?>
                <div>
                  <h3 class="uk-h3 uk-heading-line"><span><i class="fas fa-server"></i> <?= $this->m_general->getRealmName($charsMultiRealm->realmID); ?> - <?= $this->lang->line('panel_chars_list'); ?></span></h3>
                  <div class="uk-grid uk-grid-small uk-child-width-auto" data-uk-grid>
                    <?php foreach($this->m_characters->getGeneralCharactersSpecifyAcc($multiRealm , $this->session->userdata('fx_sess_id'))->result() as $chars) { ?>
                    <div>
                      <a href="<?= base_url('armory/player/'); ?><?= $chars->guid ?>/<?= $charsMultiRealm->realmID ?>">
                        <img class="uk-border-circle" src="<?= base_url('assets/images/class/'.$this->m_general->getClassIcon($chars->class)); ?>" title="<?= $chars->name ?> (Lvl <?= $chars->level ?>)" width="50" height="50" uk-tooltip>
                      </a>
                    </div>
                    <?php } ?>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="uk-width-1-5@m"></div>
        </div>
      </div>
    </section>
