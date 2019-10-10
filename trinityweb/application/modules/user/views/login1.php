    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-medium" data-uk-grid>
          <div class="uk-width-1-6@s uk-width-1-3@m"></div>
          <div class="uk-width-2-3@s uk-width-1-3@m">
            <h2 class="uk-h2 uk-text-center"><i class="fas fa-sign-in-alt"></i> <?= $this->lang->line('button_login'); ?></h2>
            <p class="uk-text-center"><?= $this->lang->line('login_description'); ?></p>
            <?= form_open('', 'id="logForm" onsubmit="LogForm(event)"'); ?>
            <div class="uk-margin" uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-inline; delay: 300; repeat: true">
              <div class="uk-form-controls uk-light">
                <div class="uk-inline uk-width-1-1">
                  <span class="uk-form-icon" uk-icon="icon: user"></span>
                  <input class="uk-input" id="log_username" type="text" placeholder="<?= $this->lang->line('form_username'); ?>" required>
                </div>
              </div>
            </div>
            <div class="uk-margin" uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-inline; delay: 300; repeat: true">
              <div class="uk-form-controls uk-light">
                <div class="uk-inline uk-width-1-1">
                  <span class="uk-form-icon" uk-icon="icon: lock"></span>
                  <input class="uk-input" id="log_password" type="password" placeholder="<?= $this->lang->line('form_password'); ?>" required>
                </div>
              </div>
            </div>
            <div class="uk-margin">
              <button class="uk-button uk-button-default uk-width-1-1" id="button_login" type="submit"><i class="fas fa-sign-in-alt"></i> <?= $this->lang->line('button_login'); ?></button>
            </div>
            <?= form_close(); ?>
            <hr>
            <a href="<?= base_url('register'); ?>" class="uk-button uk-button-secondary uk-width-1-1" name="<?= $this->lang->line('no_account'); ?>"><i class="fas fa-user-plus"></i> <?= $this->lang->line('button_account_create'); ?></a>
          </div>
          <div class="uk-width-1-6@s uk-width-1-3@m"></div>
        </div>
      </div>
    </section>

    <script>
      function LogForm(e) {
        e.preventDefault();

        var username = $('#log_username').val();
        var password = $('#log_password').val();
        if(username == ''){
          $.amaran({
            'theme': 'awesome error',
            'content': {
              title: '<?= $this->lang->line('notify_title_warning'); ?>',
              message: '<?= $this->lang->line('notify_username_empty'); ?>',
              info: '',
              icon: 'fas fa-times-circle'
            },
            'delay': 5000,
            'position': 'top right',
            'inEffect': 'slideRight',
            'outEffect': 'slideRight'
          });
          return false;
        }
        if(password == ''){
          $.amaran({
            'theme': 'awesome error',
            'content': {
              title: '<?= $this->lang->line('notify_title_warning'); ?>',
              message: '<?= $this->lang->line('notify_password_empty'); ?>',
              info: '',
              icon: 'fas fa-times-circle'
            },
            'delay': 5000,
            'position': 'top right',
            'inEffect': 'slideRight',
            'outEffect': 'slideRight'
          });
          return false;
        }
        $.ajax({
          url:"<?= base_url('user/verify1'); ?>",
          method:"POST",
          data:{username, password},
          dataType:"text",
          beforeSend: function(){
            $.amaran({
              'theme': 'awesome info',
              'content': {
                title: '<?= $this->lang->line('notify_title_info'); ?>',
                message: '<?= $this->lang->line('notify_checking'); ?>',
                info: '',
                icon: 'fas fa-sign-in-alt'
              },
              'delay': 5000,
              'position': 'top right',
              'inEffect': 'slideRight',
              'outEffect': 'slideRight'
            });
          },
          success:function(response){
            if(!response)
              alert(response);

            if (response == 'userErr') {
              $.amaran({
                'theme': 'awesome error',
                'content': {
                  title: '<?= $this->lang->line('notify_title_error'); ?>',
                  message: '<?= $this->lang->line('notify_wrong_user'); ?>',
                  info: '',
                  icon: 'fas fa-times-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
              $('#logForm')[0].reset();
              return false;
            }

            if (response) {
              $.amaran({
                'theme': 'awesome ok',
                  'content': {
                  title: '<?= $this->lang->line('notify_title_success'); ?>',
                  message: '<?= $this->lang->line('notify_connecting'); ?>',
                  info: '',
                  icon: 'fas fa-check-circle'
                },
                'delay': 5000,
                'position': 'top right',
                'inEffect': 'slideRight',
                'outEffect': 'slideRight'
              });
            }
            $('#logForm')[0].reset();
            window.location.replace("<?= base_url(); ?>");
          }
        });
      }
    </script>
