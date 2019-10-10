    <section class="uk-section uk-padding-remove slider-section">
      <div class="uk-background-secondary uk-background-cover forum-header">
        <div class="uk-container">
          <div class="uk-space-xlarge"></div>
          <h3 class="uk-h3 uk-text-uppercase"><i class="far fa-comments fa-lg"></i> <?= $this->lang->line('forum_welcome'); ?></h3>
          <div class="uk-space-xlarge"></div>
        </div>
      </div>
    </section>
    <section class="uk-section uk-section-xsmall default-section" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <?php foreach($this->forum_model->getCategory() as $categorys) { ?>
        <?php if($this->forum_model->getCategoryRows($categorys->id)) { ?>
        <h4 class="uk-h4 uk-margin-small uk-text-uppercase uk-text-break"><i class="far fa-bookmark"></i> <?= $categorys->categoryName ?></h4>
        <?php } ?>
        <div class="uk-grid uk-grid-small uk-width-1-1 uk-child-width-1-3@m" uk-scrollspy="cls: uk-animation-fade" data-uk-grid>
          <?php foreach($this->forum_model->getCategoryForums($categorys->id) as $sections) { ?>
          <?php if ($sections->type == 1 || $sections->type == 3) { ?>
          <div>
            <a href="<?= base_url('forums/category/'.$sections->id) ;?>">
              <div class="uk-card uk-card-forum uk-card-hover">
                <div class="uk-card-body">
                  <div class="uk-grid uk-grid-small" data-uk-grid>
                    <div class="uk-width-auto">
                      <i class="card-icon" style="background-image: url('<?= base_url('assets/images/forums/'.$sections->icon); ?>')"></i>
                    </div>
                    <div class="uk-width-expand">
                      <h4 class="uk-h4 uk-margin-remove uk-text-break"><?= $sections->name ?></h4>
                      <p class="uk-margin-remove uk-text-break"><?= $sections->description ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <?php } else if($sections->type == 2) { ?>
          <?php if($this->m_data->isLogged()) { ?>
          <?php if($this->m_data->getRank($this->session->userdata('fx_sess_id')) > 0) { ?>
          <div>
            <a target="_blank" href="<?= base_url('forums/category/'.$sections->id) ;?>">
              <div class="uk-card uk-card-forum uk-card-hover">
                <div class="uk-card-body">
                  <div class="uk-grid uk-grid-small" data-uk-grid>
                    <div class="uk-width-auto">
                      <i class="card-icon" style="background-image: url('<?= base_url('assets/images/forums/'.$sections->icon); ?>')"></i>
                    </div>
                    <div class="uk-width-expand">
                      <h4 class="uk-h4 uk-margin-remove uk-text-break"><?= $sections->name ?></h4>
                      <p class="uk-margin-remove uk-text-break"><?= $sections->description ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>
          <?php } ?>
          <?php } ?>
          <?php } ?>
        </div>
        <div class="uk-space-large"></div>
        <?php } ?>
      </div>
    </section>
