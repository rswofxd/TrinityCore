    <section class="uk-section slider-section">
      <div class="uk-container">
        <div uk-slider>
          <div class="uk-position-relative uk-visible-toggle uk-light">
            <ul class="uk-slider-items uk-child-width-1-4@s uk-grid uk-grid-medium">
              <?php if ($this->news_model->getNewsTopsList()->num_rows()) { ?>
              <?php foreach($this->news_model->getNewsTopsList()->result() as $listTop) { ?>
                <li>
                  <a href="<?= base_url('news/'.$listTop->id_new); ?>">
                    <div class="uk-card uk-card-default uk-card-hover">
                      <div class="uk-card-media-top">
                        <img src="<?= base_url('assets/images/news/'); ?><?= $this->news_model->getNewImage($listTop->id_new); ?>" alt="<?= $this->news_model->getNewTitle($listTop->id_new); ?>">
                      </div>
                      <div class="uk-card-body">
                        <h5 class="uk-h5 uk-text-uppercase uk-text-bold"><?= $this->news_model->getNewTitle($listTop->id_new); ?></h5>
                      </div>
                    </div>
                  </a>
                </li>
              <?php } ?>
              <?php } ?>
            </ul>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
          </div>
        </div>
      </div>
    </section>
    <section class="uk-section uk-section-xsmall default-section" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <h3 class="uk-h3 uk-text-bold"><?= $this->lang->line('news_recent_list'); ?></h3>
        <?php if ($this->news_model->getNewsList()->num_rows()) { ?>
        <div class="uk-grid uk-grid-small uk-child-width-1-1" data-uk-grid>
          <?php foreach($this->news_model->getNewsList()->result() as $list) { ?>
          <div>
            <a href="<?= base_url('news/'.$list->id); ?>">
              <div class="uk-card uk-card-default uk-card-hover card-article">
                <div class="uk-card-body">
                  <div class="uk-grid uk-grid-medium" data-uk-grid>
                    <div class="uk-width-2-5 uk-width-1-4@s">
                      <div class="image-card uk-margin-small" style="background-image: url(<?= base_url('assets/images/news/'.$list->image); ?>);"></div>
                    </div>
                    <div class="uk-width-3-5 uk-width-3-4@s">
                      <h4 class="uk-h4 uk-text-uppercase uk-margin-small uk-text-break"><?= $list->title ?></h4>
                      <p class="uk-margin-small uk-visible@s"><?= mb_substr(ucfirst(strtolower(strip_tags($list->description))), 0, 260, "UTF-8").' ...'; ?></p>
                      <p><i class="far fa-calendar-alt"></i> <?= date('Y-m-d', $list->date); ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
      </div>
    </section>
