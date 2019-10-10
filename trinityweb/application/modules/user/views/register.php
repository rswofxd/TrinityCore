    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-small" data-uk-grid>
          <div class="uk-width-1-6@s uk-width-1-3@m"></div>
          <div class="uk-width-2-3@s uk-width-1-3@m">
            <h2 class="uk-h2 uk-text-center"><i class="fas fa-user-plus"></i> <?= $this->lang->line('button_account_create'); ?></h2>
            <p class="uk-text-center"><?= $this->lang->line('register_description'); ?></p>

            <?php if (isset($_POST['button_register']))
            {
              $country = $_POST['reg_country'];
              $username= strtoupper($_POST['reg_username']);
              $email   = strtoupper($_POST['reg_email']);
              $password= strtoupper($_POST['reg_password']);
              $pascword= strtoupper($_POST['reg_pascword']);
              if ($this->m_modules->getCaptcha() == 1)
              {
                $captcha_answer = $this->input->post('g-recaptcha-response');
                $response = $this->recaptcha->verifyResponse($captcha_answer);
                $rr = $response['success'];
              }
              else
              {
                $rr = TRUE;
              }
              if ($rr)
              {
                if ($password == $pascword)
                {
                  if ($this->m_data->getSpecifyAccount($username)->num_rows())
                    echo '<div class="uk-alert-danger" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('account_already_exist').'</p></div>';
                  else if ($this->m_data->getSpecifyEmail($email)->num_rows())
                    echo '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('email_used').'</p></div>';
                  else
                    $this->user_model->insertRegister($username, $email, $password, $country);
                }
                else
                  echo '<div class="uk-alert-warning" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('password_not_match').'</p></div>';
              }
              else
                echo '<div class="uk-alert-danger" uk-alert><a class="uk-alert-close" uk-close></a><p class="uk-text-center"><i class="fas fa-exclamation-circle"></i> '.$this->lang->line('captcha_error').'</p></div>';
            } ?>

            <form action="" method="post" accept-charset="utf-8">
              <div class="uk-margin uk-light">
                <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_user_info'); ?></label>
                <div class="uk-form-controls">
                  <select class="uk-select" name="reg_country">
                    <?php foreach($this->user_model->getCountry()->result() as $countrys) { ?>
                    <option value="<?= $countrys->id; ?>"><?= $countrys->country_name ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="uk-margin uk-light">
                <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('form_login_info'); ?></label>
                <div class="uk-form-controls">
                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: hashtag"></span>
                    <input class="uk-input" type="text" name="reg_username" pattern=".{3,}" required title="3 characters minimum" placeholder="<?= $this->lang->line('form_username'); ?>">
                  </div>
                </div>
              </div>
              <div class="uk-margin uk-light">
                <div class="uk-form-controls">
                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: mail"></span>
                    <input class="uk-input" type="email" name="reg_email" required placeholder="<?= $this->lang->line('form_email'); ?>">
                  </div>
                </div>
              </div>
              <div class="uk-margin uk-light">
                <div class="uk-form-controls">
                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input class="uk-input" type="password" name="reg_password" pattern=".{5,}" required title="5 characters minimum" placeholder="<?= $this->lang->line('form_password'); ?>">
                  </div>
                </div>
              </div>
              <div class="uk-margin uk-light">
                <div class="uk-form-controls">
                  <div class="uk-inline uk-width-1-1">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input class="uk-input" type="password" name="reg_pascword" pattern=".{5,}" required title="5 characters minimum" placeholder="<?= $this->lang->line('form_re_password'); ?>">
                  </div>
                </div>
              </div>
              <?php if($this->m_modules->getCaptcha() == 1) { ?>
              <div class="uk-margin">
                <?= $this->recaptcha->render(); ?>
              </div>
              <?php } ?>
              <button class="uk-button uk-button-default uk-width-1-1" type="submit" name="button_register"><i class="fas fa-user-plus"></i> <?= $this->lang->line('button_register'); ?></button>
            </form>
          </div>
          <div class="uk-width-1-6@s uk-width-1-3@m"></div>
        </div>
      </div>
    </section>
