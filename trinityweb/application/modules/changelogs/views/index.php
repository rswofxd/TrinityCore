    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <h3 class="uk-h3 uk-text-bold uk-text-uppercase"><i class="ra ra-clockwork"></i> <?= $this->lang->line('nav_changelogs'); ?></h3>
        <?php if($this->changelogs_model->getAll()->num_rows()) { ?>
        <h5 class="uk-h5 uk-text-uppercase"><?= $this->lang->line('changelogs_recent_article'); ?></h5>
        <a href="<?= base_url('changelogs/'.$this->changelogs_model->getLastID()); ?>">
          <div class="uk-card uk-card-default uk-card-hover card-article">
            <div class="uk-card-body">
              <div class="uk-grid uk-grid-medium" data-uk-grid>
                <div class="uk-width-2-5 uk-width-1-4@s">
                  <div class="image-card uk-margin-small" style="background-image: url(<?= base_url('assets/images/changelogs/'.$this->changelogs_model->getChanglogImage($this->changelogs_model->getLastID())); ?>);"></div>
                </div>
                <div class="uk-width-3-5 uk-width-3-4@s">
                  <h4 class="uk-h4 uk-text-uppercase uk-margin-small uk-text-break"><?= $this->changelogs_model->getChanglogTitle($this->changelogs_model->getLastID()); ?></h4>
                  <div class="uk-margin-smal uk-visible@s"><?= substr(ucfirst(strtolower(strip_tags($this->changelogs_model->getChanglogDesc($this->changelogs_model->getLastID())))), 0, 260).' ...'; ?></div>
                  <p class="uk-text-small uk-margin-small"><i class="far fa-clock"></i> <?= date('d-m-Y', $this->changelogs_model->getChanglogDate($this->changelogs_model->getLastID())); ?></p>
                </div>
              </div>
            </div>
          </div>
        </a>
        <h5 class="uk-h5 uk-text-uppercase"><i class="fas fa-spinner fa-pulse"></i> <?= $this->lang->line('changelogs_list'); ?></h5>
        <div uk-slider>
          <div class="uk-position-relative uk-visible-toggle uk-light">
            <ul class="uk-slider-items uk-child-width-1-4@s uk-grid uk-grid-medium">
              <?php foreach($this->changelogs_model->getChangelogs()->result() as $changelogsList) { ?>
                <li>
                  <a href="<?= base_url('changelogs/'.$changelogsList->id); ?>">
                    <div class="uk-card uk-card-default uk-card-hover">
                      <div class="uk-card-media-top">
                        <img src="<?= base_url('assets/images/changelogs/'.$changelogsList->image); ?>" alt="<?= $changelogsList->title ?>">
                      </div>
                      <div class="uk-card-body">
                        <h5 class="uk-h5 uk-text-uppercase uk-text-bold uk-margin-small"><?= $changelogsList->title ?></h5>
                        <p class="uk-text-small uk-margin-small"><i class="far fa-clock"></i> <?= date('d-m-Y', $changelogsList->date); ?></p>
                      </div>
                    </div>
                  </a>
                </li>
              <?php } ?>
            </ul>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
          </div>
        </div>
        <?php } else { ?>
        <div class="uk-alert-warning" uk-alert>
          <p class="uk-text-center"><i class="fas fa-exclamation-triangle"></i> <?= $this->lang->line('changelog_not_found'); ?></p>
        </div>
        <?php } ?>
      </div>
    </section>
