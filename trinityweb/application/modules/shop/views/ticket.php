<?php if($this->m_permissions->getIsAdmin($this->session->userdata('fx_sess_id'))) { ?>
    <script src="<?= base_url(); ?>core/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({
        selector: '.tinyeditor',
        language: '<?= $this->config->item('tinymce_language'); ?>',
        menubar: false,
        plugins: ['advlist autolink autosave link image lists charmap preview hr searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media table contextmenu directionality emoticons textcolor paste fullpage textcolor colorpicker textpattern'],
        toolbar: 'insert unlink emoticons | undo redo | formatselect fontselect fontsizeselect | bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | blockquote | removeformat'});
    </script>
<?php } else { ?>
    <script src="<?= base_url(); ?>core/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({
        selector: '.tinyeditor',
        language: '<?= $this->config->item('tinymce_language'); ?>',
        menubar: false,
        plugins: ['advlist autolink autosave link lists charmap preview hr searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime contextmenu directionality emoticons textcolor paste fullpage textcolor colorpicker textpattern'],
        toolbar: 'emoticons | undo redo | fontselect fontsizeselect | bold italic | forecolor | bullist numlist outdent indent | link unlink | removeformat'});
    </script>
<?php } ?>

    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-small" data-uk-grid>
          <div class="uk-width-expand">
            <h3 class="uk-h3 uk-text-bold uk-text-uppercase"><i class="fas fa-question-circle"></i> <?= $this->lang->line('store_support'); ?></h3>
            <p class="uk-text-uppercase uk-text-bold"><?= $this->lang->line('store_support_description'); ?></p>
          </div>
          <div class="uk-width-auto">
            <?php if ($this->m_data->isLogged()) { ?>
            <div class="uk-text-center uk-text-right@s">
              <a href="#" class="uk-button uk-button-default" uk-toggle="target: #newTicket"><i class="fas fa-pencil-alt"></i> <?= $this->lang->line('button_create_ticket'); ?></a>
            </div>
            <?php } ?>
          </div>
        </div>
        <div class="uk-overflow-auto uk-width-1-1 uk-margin-small">
          <table class="uk-table uk-table-divider">
            <thead>
              <tr>
                <th><i class="fas fa-book"></i> <?= $this->lang->line('column_id'); ?></th>
                <th class="uk-text-center"><i class="fas fa-bookmark"></i> <?= $this->lang->line('form_title'); ?></th>
                <th class="uk-text-center"><i class="far fa-clock"></i> <?= $this->lang->line('column_date'); ?></th>
                <th class="uk-text-center"><i class="fas fa-info-circle"></i> <?= $this->lang->line('column_status'); ?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="uk-table-link">
                  <a href="" class="uk-link-reset"><span class="uk-light">1</span></a>
                </td>
                <td class="uk-table-link uk-text-center">
                  <a href="" class="uk-link-reset"><span class="uk-light">test</span></a>
                </td>
                <td class="uk-text-center">
                  <span class="uk-light">01-02-2018</span>
                </td>
                <td class="uk-text-center">
                  <span class="uk-label">Open</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div> 
      </div>
    </section>
