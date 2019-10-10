<?php if (isset($_POST['button_editTopic'])) {
    $title = $_POST['edittopic_title'];
    $description = $_POST['edittopic_description'];

    if (isset($_POST['check_highl']) && $_POST['check_highl'] == '1')
        $highl = '1'; else $highl = '0';

    if (isset($_POST['check_lock']) && $_POST['check_lock'] == '1')
        $lock = '1'; else $lock = '0';

    $this->forum_model->updateTopic($idlink, $title, $description, $lock, $highl);
} ?>

<?php if(isset($_POST['button_addcommentary'])) {
    $commentary = $_POST['reply_comment'];

    if (!is_null($commentary) && 
        !empty($commentary) && 
        $commentary != '' && 
        $commentary != ' ') {
            $idsession = $this->session->userdata('fx_sess_id');
            $this->forum_model->insertComment($commentary, $idlink, $idsession);
        }
} ?>

<?php if(isset($_POST['button_removecomment'])) {
    $this->forum_model->removeComment($_POST['button_removecomment'], $idlink);
} ?>

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
          <div class="uk-width-2-3@s">
            <h3 class="uk-h3 uk-text-bold uk-text-uppercase"><span uk-icon="icon: comments; ratio: 1.5"></span>&nbsp;<?= $this->forum_model->getSpecifyPostName($idlink); ?></h3>
          </div>
          <div class="uk-width-1-3@s">
            <?php if($this->m_data->isLogged()) { ?>
            <?php if($this->forum_model->getSpecifyPostAuthor($idlink) == $this->session->userdata('fx_sess_id')) { ?>
            <div class="uk-text-center uk-text-right@s">
              <a href="#" class="uk-button uk-button-default" uk-toggle="target: #editTopic"><i class="far fa-edit"></i> <?= $this->lang->line('button_edit_topic'); ?></a>
            </div>
            <?php } ?>
            <?php } ?>
          </div>
        </div>
        <div class="uk-grid uk-grid-medium uk-grid-divider uk-child-width-1-1" data-uk-grid>
          <div>
            <div class="uk-grid uk-grid-medium" data-uk-grid>
              <div class="uk-width-auto">
                  <?php if($this->m_data->getRank($this->forum_model->getSpecifyPostAuthor($idlink)) > 0) { ?>
                  <div class="topic-author topic-staff-author">
                  <?php } else { ?>
                  <div class="topic-author">
                  <?php } ?>
                    <div class="topic-author-avatar">
                      <?php if($this->m_general->getUserInfoGeneral($this->forum_model->getSpecifyPostAuthor($idlink))->num_rows()) { ?>
                      <img src="<?= base_url('assets/images/profiles/').$this->m_data->getNameAvatar($this->m_data->getImageProfile($this->forum_model->getSpecifyPostAuthor($idlink))); ?>" alt="" />
                      <?php } else { ?>
                      <img src="<?= base_url('assets/images/profiles/default.png'); ?>" alt="" />
                      <?php } ?>
                    </div>
                    <div class="topic-author-details">
                      <p class="uk-margin-small-bottom"><?= $this->m_data->getUsernameID($this->forum_model->getSpecifyPostAuthor($idlink)); ?></p>
                      <p class="uk-margin-remove uk-text-meta"><?= $this->forum_model->getCountPostAuthor($this->forum_model->getSpecifyPostAuthor($idlink)); ?> <?= $this->lang->line('forum_post_count'); ?></span>
                      <?php if($this->m_data->getRank($this->forum_model->getSpecifyPostAuthor($idlink)) > 0) { ?>
                      <p class="uk-margin-remove staff-rank">STAFF</p>
                      <?php } ?>
                    </div>
                  </div>
              </div>
              <div class="uk-width-expand">
                <p class="uk-text-meta uk-margin-small"><?= date('F d Y - H:i A', $this->forum_model->getSpecifyPostDate($idlink)); ?></p>
                <?php if($this->m_data->getRank($this->forum_model->getSpecifyPostAuthor($idlink)) > 0) { ?>
                <div class="uk-text-break" style="color: #<?= $this->config->item('staff_forum_color'); ?>;">
                  <?= $this->forum_model->getSpecifyPostContent($idlink); ?>
                </div>
                <?php } else { ?>
                <div class="uk-text-break" style="color: white;">
                  <?= $this->forum_model->getSpecifyPostContent($idlink); ?>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <?php foreach ($this->forum_model->getComments($idlink)->result() as $commentss) { ?>
          <div>
            <div class="uk-grid uk-grid-medium" data-uk-grid>
              <div class="uk-width-auto">
                <?php if($this->m_data->getRank($commentss->author) > 0) { ?>
                <div class="topic-author topic-staff-author">
                <?php } else { ?>
                <div class="topic-author">
                <?php } ?>
                <div class="topic-author-avatar">
                  <?php if($this->m_general->getUserInfoGeneral($commentss->author)->num_rows()) { ?>
                  <img src="<?= base_url('assets/images/profiles/'.$this->m_data->getNameAvatar($this->m_data->getImageProfile($commentss->author))); ?>" alt="" />
                  <?php } else { ?>
                  <img src="<?= base_url('assets/images/profiles/default.png'); ?>" alt="" />
                  <?php } ?>
                </div>
                <div class="topic-author-details">
                  <p class="uk-margin-small-bottom"><?= $this->m_data->getUsernameID($commentss->author); ?></p>
                  <p class="uk-margin-remove uk-text-meta"><?= $this->forum_model->getCountPostAuthor($commentss->author); ?> <?= $this->lang->line('forum_post_count'); ?></p>
                  <?php if($this->m_data->getRank($commentss->author) > 0) { ?>
                  <p class="uk-margin-remove staff-rank">STAFF</p>
                  <?php } ?>
                </div>
                </div>
              </div>
              <div class="uk-width-expand">
                <p class="uk-text-meta uk-margin-small"><?= date('F d Y - H:i A', $commentss->date); ?></p>
              <?php if($this->m_data->getRank($commentss->author) > 0) { ?>
              <div class="uk-text-break" style="color: #<?= $this->config->item('staff_forum_color'); ?>;">
              <?php } else { ?>
              <div class="uk-text-break" style="color: white;">
              <?php } ?>
                <?= $commentss->commentary ?>
              </div>
              <?php if($this->m_data->getRank($this->session->userdata('fx_sess_id')) > 0 || $this->session->userdata('fx_sess_id') == $commentss->author && $this->m_data->getTimestamp() < strtotime('+30 minutes', $commentss->date)) { ?>
                <form action="" method="post" accept-charset="utf-8">
                  <div class="uk-margin-small-top uk-margin-remove-bottom">
                    <button name="button_removecomment" type="submit" value="<?= $commentss->id ?>" class="uk-button uk-button-danger uk-button-small"><i class="fas fa-eraser"></i> <?= $this->lang->line('button_remove'); ?></button>
                  </div>
                </form>
              <?php } ?>
              </div>
            </div>
          </div>
          <?php } ?>
          <?php if(!$this->m_data->isLogged() && $this->forum_model->getTopicLocked($idlink) == 0) { ?>
          <div>
            <!-- isn't login -->
            <div class="glass-box">
              <h1 class="glass-box-title uk-text-center"><span uk-icon="icon: comment; ratio: 2"></span> <?= $this->lang->line('forum_comment_header'); ?></h1>
              <div class="glass-box-container">
                <p class="uk-margin-small"><?= $this->lang->line('forum_comment_locked'); ?></p>
                <a href="<?= base_url('login'); ?>" class="uk-button uk-button-default uk-width-1-2 uk-width-1-4@m"><i class="fas fa-sign-in-alt"></i> <?= $this->lang->line('button_login'); ?></a>
              </div>
            </div>
          </div>
          <?php } ?>
          <?php if($this->forum_model->getTopicLocked($idlink) == 1) { ?>
          <div>
            <!-- locked -->
            <div class="glass-box">
              <h1 class="glass-box-title uk-text-center"><span uk-icon="icon: lock; ratio: 2"></span> <?= $this->lang->line('forum_not_authorized'); ?></h1>
              <div class="glass-box-container">
                <p class="uk-margin-small"><?= $this->lang->line('forum_topic_locked'); ?></p>
              </div>
            </div>
          </div>
          <?php } ?>
          <?php if($this->m_data->isLogged() && $this->forum_model->getTopicLocked($idlink) == 0) { ?>
          <div>
            <!-- comment login -->
            <div class="glass-box">
              <h1 class="glass-box-title uk-text-center"><span uk-icon="icon: comment; ratio: 2"></span> <?= $this->lang->line('forum_comment_header'); ?></h1>
              <form class="glass-box-editor" method="post" action="" data-post-form="true" accept-charset="utf-8">
                <textarea class="uk-textarea tinyeditor" tabindex="1" spellcheck="true" name="reply_comment" rows="10" cols="80"></textarea>
                <div class="uk-margin-small">
                  <button class="uk-button uk-button-default uk-width-1-1" type="submit" name="button_addcommentary" id="submit-button"><i class="fas fa-reply"></i> <?= $this->lang->line('button_add_reply'); ?></button>
                </div>
              </form>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
