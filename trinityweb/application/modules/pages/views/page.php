    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <h4 class="uk-h4 uk-text-bold uk-text-uppercase uk-margin-small"><i class="fas fa-newspaper"></i> <?=$this->lang->line('nav_news');?></h4>
        <article class="uk-article uk-text-break">
          <h1 class="uk-h1 uk-text-uppercase"><i class="far fa-file-alt"></i> <?= $this->pages_model->getName($idlink) ?></h1>
          <p class="uk-article-meta"><?= $this->lang->line('news_article_published'); ?> | <i class="far fa-clock"></i> <?= date('Y-m-d', $this->pages_model->getDate($idlink)); ?></p>
          <?= $this->pages_model->getDesc($idlink); ?>
        </article>
      </div>
    </section>
