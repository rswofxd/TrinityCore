    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <h4 class="uk-h4 uk-text-bold uk-text-uppercase uk-margin-small"><i class="ra ra-clockwork"></i> <?= $this->lang->line('nav_changelogs'); ?></h4>
        <?php if($this->changelogs_model->getAll()->num_rows()) { ?>
        <article class="uk-article">
          <h1 class="uk-h1"><?= $this->changelogs_model->getChanglogTitle($idlink); ?></h1>
          <p class="uk-article-meta"><?= $this->lang->line('news_article_published'); ?> | <i class="far fa-clock"></i> <?= date('jS \of F Y', $this->changelogs_model->getChanglogDate($idlink)); ?></p>
          <div class="image-post uk-margin-small" style="background-image: url(<?= base_url('assets/images/changelogs/'.$this->changelogs_model->getChanglogImage($idlink)); ?>);"></div>
          <?= $this->changelogs_model->getChanglogDesc($idlink); ?>
        </article>
        <?php } else { ?>
        <div class="uk-alert-warning" uk-alert>
          <p class="uk-text-center"><i class="fas fa-exclamation-triangle"></i> <?= $this->lang->line('changelog_not_found'); ?></p>
        </div>
        <?php } ?>
      </div>
    </section>
