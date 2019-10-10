    <section class="uk-section uk-padding-remove slider-section">
      <div class="uk-background-secondary uk-background-cover store-header">
        <div class="uk-container">
          <div class="uk-space-xlarge"></div>
          <h3 class="uk-h3 uk-text-uppercase"><i class="fas fa-shopping-cart fa-lg"></i> <?= $this->lang->line('store_welcome'); ?></h3>
          <div class="uk-space-xlarge"></div>
        </div>
      </div>
    </section>
    <section class="uk-section uk-section-xsmall default-section" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-large" data-uk-grid>
          <div class="uk-width-3-5@m">
            <form method="post" action="">
              <div class="uk-grid-small" uk-grid>
                <div class="uk-inline uk-width-1-3@s">
                  <div class="uk-form-controls uk-light">
                    <select class="uk-select" id="selectCategory">
                      <option value="0"><?= $this->lang->line('store_select_categories'); ?></option>
                      <option value="0"><?= $this->lang->line('store_all_categories'); ?></option>
                      <?php foreach($this->shop_model->getGroups()->result() as $ggroups) { ?>
                        <option value="<?= $ggroups->id ?>"><?= $ggroups->name ?></option>
                      <?php } ?>
                    </select>
                    <script>
                      $('#selectCategory').change(function() {
                        var url = $(this).val(); // get selected value
                        if (url) { // require a URL
                          window.location = "<?= base_url('store/'); ?>"+url; // redirect
                        }
                        return false;
                      });
                    </script>
                  </div>
                </div>
                <div class="uk-inline uk-width-1-3@s"></div>
              </div>
            </form>
          </div>
          <div class="uk-width-2-5@m">
            <div class="uk-grid-small" uk-grid>
              <div class="uk-width-2-5"></div>
              <div class="uk-width-3-5">
                <?php if ($this->m_data->isLogged()) { ?>
                  <img class="uk-border-circle" src="<?= base_url('assets/images/dp.jpg'); ?>" title="<?=$this->lang->line('panel_dp');?>" width="30px" height="30px" uk-tooltip="pos: bottom">
                  <span class="uk-badge"><?= $this->m_general->getCharDPTotal($this->session->userdata('fx_sess_id')); ?></span>
                  <span style="display:inline-block; width: 5px;"></span>
                  <img class="uk-border-circle" src="<?= base_url('assets/images/vp.jpg'); ?>" title="<?=$this->lang->line('panel_vp');?>" width="30px" height="30px" uk-tooltip="pos: bottom">
                  <span class="uk-badge"><?= $this->m_general->getCharVPTotal($this->session->userdata('fx_sess_id')); ?></span>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <?php if(isset($_GET['complete'])): ?>
        <div class="uk-alert-success" uk-alert>
          <a class="uk-alert-close" uk-close></a>
          <p><i class="far fa-check-circle"></i> <?=$this->lang->line('store_success');?></p>
        </div>
        <?php endif; ?>
        <?php if(isset($_GET['error'])): ?>
        <div class="uk-alert-danger" uk-alert>
          <a class="uk-alert-close" uk-close></a>
          <p><i class="fas fa-exclamation-triangle"></i> <?=$this->lang->line('points_insuff');?></p>
        </div>
        <?php endif; ?>
        <div class="uk-grid uk-grid-small uk-grid-match uk-child-width-1-1 uk-child-width-1-4@s uk-child-width-1-5@m" data-uk-grid>
            <?php foreach($this->shop_model->getShopGeneral($idlink)->result() as $itemsG) { ?>
            <div>
              <div class="uk-inline-clip uk-transition-toggle wow-store-margin" tabindex="0">
                <img src="<?= base_url('assets/images/store/'); ?><?= $itemsG->image ?>" class="uk-border-rounded uk-transition-scale-up uk-transition-opaque" alt="">
                <div class="uk-overlay uk-position-bottom-center">
                  <p class="uk-text-center uk-text-break uk-light"><a rel="item=<?= $itemsG->itemid ?>&amp;domain=<?= $this->config->item('wowhead_tooltip'); ?>" class="uk-button uk-button-text"><?= $itemsG->name ?></a></p>
                  <p class="uk-text-center">
                    <?php if(!is_null($itemsG->price_vp) && !empty($itemsG->price_vp) && $itemsG->price_vp != '0') { ?>
                    <a href="<?= base_url(); ?>cart/<?= $itemsG->id; ?>?tp=vp" class="uk-button uk-button-link">
                      <img class="uk-border-circle" src="<?= base_url('assets/images/vp.jpg'); ?>" title="<?=$this->lang->line('panel_vp');?>" width="30px" height="30px" uk-tooltip="pos: bottom">
                    </a>
                    <span class="uk-badge uk-margin-small-right"><?= $itemsG->price_vp ?></span>
                    <?php } ?>
                    <?php if(!is_null($itemsG->price_dp) && !empty($itemsG->price_dp) && $itemsG->price_dp != '0') { ?>
                    <a href="<?= base_url(); ?>cart/<?= $itemsG->id; ?>?tp=dp" class="uk-button uk-button-link">
                      <img class="uk-border-circle" src="<?= base_url('assets/images/dp.jpg'); ?>" title="<?=$this->lang->line('panel_dp');?>" width="30px" height="30px" uk-tooltip="pos: bottom">
                    </a>
                    <span class="uk-badge"><?= $itemsG->price_dp ?></span>
                    <?php } ?>
                  </p>
                </div>
              </div>
            </div>
            <?php } ?>
        </div>
        </div>
      </div>
    </section>
