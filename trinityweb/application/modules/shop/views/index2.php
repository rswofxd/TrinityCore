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
        <div class="uk-overflow-auto uk-width-1-1">
          <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
            <thead>
              <tr>
                <th class="uk-width-small"><i class="fas fa-book"></i> <?=$this->lang->line('column_icon');?></th>
                <th class="uk-width-medium uk-text-center"><i class="fas fa-info-circle"></i> <?=$this->lang->line('store_item_name');?></th>
                <th class="uk-width-medium uk-text-center"><i class="fas fa-cart-plus"></i> <?=$this->lang->line('store_item_price');?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($this->shop_model->getShopGeneral($idlink)->result() as $itemsG) { ?>
              <tr>
                <td class="uk-table-link">
                  <a rel="item=<?= $itemsG->itemid ?>&amp;domain=<?= $this->config->item('wowhead_tooltip'); ?>" class="uk-link-reset">
                    <img width="50" height="50" class="uk-border-rounded" src="//wow.zamimg.com/images/wow/icons/large/<?= $itemsG->iconname ?>.jpg" />
                  </a>
                </td>
                <td class="uk-table-link uk-text-center"><a rel="item=<?= $itemsG->itemid ?>&amp;domain=<?= $this->config->item('wowhead_tooltip'); ?>" class="uk-link-reset"><?= $itemsG->name ?></a></td>
                <td class="uk-text-center">
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
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
