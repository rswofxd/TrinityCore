    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <h3 class="uk-h3 uk-text-bold uk-text-uppercase"><i class="far fa-question-circle"></i> <?= $this->lang->line('nav_faq'); ?></h3>
        <?php if($this->faq_model->getAll()->num_rows()) { ?>
        <div uk-grid>
          <div class="uk-width-1-6@m">
            <ul class="uk-tab-right" uk-tab="connect: #component-tab-right; animation: uk-animation-fade; toggle: > *">
              <?php foreach($this->faq_model->getFaqType() as $type) { ?>
              <li><a href="#"><?= $type->title ?></a></li>
              <?php } ?>
            </ul>
          </div>
          <div class="uk-width-expand@m">
            <ul id="component-tab-right" class="uk-switcher">
              <?php foreach($this->faq_model->getFaqType() as $type) { ?>
              <li>
                <ul uk-accordion="multiple: true">
                  <?php foreach($this->faq_model->getFaqList($type->id) as $list) { ?>
                  <li>
                    <a class="uk-accordion-title" href="#"><i class="fas fa-info-circle"></i> <?= $list->title ?></a>
                    <div class="uk-accordion-content">
                      <?= $list->description ?>
                    </div>
                  </li>
                  <?php } ?>
                </ul>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <?php } else { ?>
        <div class="uk-alert-warning" uk-alert>
          <p class="uk-text-center"><i class="fas fa-exclamation-triangle"></i> <?= $this->lang->line('faq_not_found'); ?></p>
        </div>
        <?php } ?>
      </div>
    </section>
