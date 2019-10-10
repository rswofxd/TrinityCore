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
        plugins: ['advlist autolink autosave link image lists charmap preview hr searchreplace wordcount visualblocks visualchars code fullscreen media table contextmenu directionality emoticons textcolor paste fullpage textcolor colorpicker textpattern'],
        toolbar: 'insert unlink emoticons | undo redo | fontselect fontsizeselect | bold italic | forecolor | bullist numlist outdent indent | link unlink | removeformat'});
    </script>
<?php } ?>

    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-small" data-uk-grid>
          <div class="uk-width-2-3@s">
            <h3 class="uk-h3 uk-text-bold uk-text-uppercase"><i class="fas fa-list"></i> <?= $this->forum_model->getCategoryName($idlink); ?></h3>
          </div>
          <div class="uk-width-1-3@s">
            <?php if($this->m_data->isLogged()) { ?>
            <div class="uk-text-center uk-text-right@s">
              <a href="#" class="uk-button uk-button-default" uk-toggle="target: #newTopic"><i class="fas fa-pencil-alt"></i> <?= $this->lang->line('button_new_topic'); ?></a>
            </div>
            <?php } ?>
          </div>
        </div>
        <p class="uk-text-uppercase uk-text-bold uk-margin-small"><?= $this->lang->line('forum_topic_list'); ?></p>
        <div class="uk-overflow-auto uk-margin-small">
          <table class="uk-table uk-table-hover uk-table-middle">
            <tbody>
              <?php foreach($this->forum_model->getSpecifyCategoryPostsPined($idlink)->result() as $lists) { ?>
              <tr>
                <td class="uk-table-shrink uk-table-link">
                  <a href="<?= base_url('forums/topic/'.$lists->id); ?>" class="topic-forum-staff">
                    <span uk-icon="icon: bolt;ratio: 1.5"></span>
                  </a>
                </td>
                <td class="uk-table-expand uk-table-link uk-text-break">
                  <a href="<?= base_url('forums/topic/'.$lists->id); ?>" class="uk-link-reset">
                    <?= $lists->title; ?>
                  </a>
                </td>
                <td class="uk-width-small uk-text-center">
                  <span uk-icon="icon: commenting; ratio: 0.9"></span>&nbsp;<?= $this->forum_model->getComments($lists->id)->num_rows(); ?>
                </td>
                <td class="uk-width-small uk-text-center">
                  <?php if($this->m_data->getRank($lists->author) > 0) { ?>
                  <span class="topic-forum-staff"><?= $this->m_data->getUsernameID($lists->author); ?></span>
                  <?php } else { ?>
                  <span class="topic-forum-member"><?= $this->m_data->getUsernameID($lists->author); ?></span>
                  <?php } ?>
                </td>
                <td class="uk-width-small uk-text-center uk-text-meta"><?= date('d-m-Y', $lists->date); ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="uk-overflow-auto uk-margin-small">
          <table class="uk-table uk-table-divider uk-table-hover uk-table-middle">
            <tbody>
              <?php foreach($this->forum_model->getSpecifyCategoryPosts($idlink)->result() as $lists) { ?>
              <tr>
                <td class="uk-table-shrink uk-table-link">
                  <a href="<?= base_url('forums/topic/'.$lists->id); ?>">
                    <span uk-icon="icon: comments"></span>
                  </a>
                </td>
                <td class="uk-table-expand uk-table-link uk-text-break">
                  <a href="<?= base_url('forums/topic/'.$lists->id); ?>" class="uk-link-reset">
                    <?= $lists->title; ?>
                  </a>
                </td>
                <td class="uk-width-small uk-text-center">
                  <span uk-icon="icon: commenting; ratio: 0.9"></span>&nbsp;<?= $this->forum_model->getComments($lists->id)->num_rows(); ?>
                </td>
                <td class="uk-width-small uk-text-center">
                  <?php if($this->m_data->getRank($lists->author) > 0) { ?>
                  <span class="topic-forum-staff"><?= $this->m_data->getUsernameID($lists->author); ?></span>
                  <?php } else { ?>
                  <span class="topic-forum-member"><?= $this->m_data->getUsernameID($lists->author); ?></span>
                  <?php } ?>
                </td>
                <td class="uk-width-small uk-text-center uk-text-meta"><?= date('d-m-Y', $lists->date); ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
