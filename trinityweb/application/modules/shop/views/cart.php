<?php if (isset($_POST['buyNowGetItem'])) {
    $charselect = $_POST['charSelects'];

    $method = $_GET['tp'];
    $price = $this->shop_model->getPriceType($idlink, $_GET['tp']);
    $result_explode = explode('|', $charselect);

    $soapUser = $this->m_data->getRealm($result_explode[0])->row_array()['console_username'];
    $soapPass = $this->m_data->getRealm($result_explode[0])->row_array()['console_password'];
    $soapHost = $this->m_data->getRealm($result_explode[0])->row_array()['console_hostname'];
    $soapPort = $this->m_data->getRealm($result_explode[0])->row_array()['console_port'];
    $soap_uri = $this->m_data->getRealm($result_explode[0])->row_array()['emulator'];

    $this->shop_model->insertHistory(
        $idlink, 
        $this->shop_model->getItem($idlink), 
        $this->session->userdata('fx_sess_id'), 
        $result_explode[1], 
        $method,
        $price,
        $soapUser, 
        $soapPass, 
        $soapHost, 
        $soapPort, 
        $soap_uri,
        $result_explode[0]);
} ?>

    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <h3 class="uk-h3 uk-text-bold uk-text-uppercase"><i class="fas fa-shopping-bag"></i> <?= $this->lang->line('nav_cart'); ?></h3>
        <div class="uk-grid uk-grid-small" data-uk-grid>
          <div class="uk-width-1-6@m"></div>
          <div class="uk-width-2-3@m">
            <div class="uk-grid uk-grid-small" data-uk-grid>
              <div class="uk-width-1-3@m">
                <div class="uk-flex-center uk-text-center">
                  <p><a rel="item=<?= $this->shop_model->getItem($idlink); ?>" class="uk-link-reset"><span class="uk-text-large uk-text-capitalize uk-text-break"><?= $this->shop_model->getName($idlink); ?></span></a></p>
                  <a rel="item=<?= $this->shop_model->getItem($idlink); ?>">
                    <img class="uk-border-rounded wow-icon-border" src="//wow.zamimg.com/images/wow/icons/large/<?= $this->shop_model->getIcon($idlink) ?>.jpg" />
                  </a>
                  <p>
                    <span class="uk-text-bold uk-margin-small-right"><i class="fas fa-coins"></i> <?=$this->lang->line('store_item_price');?>:</span>
                    <?php if($_GET['tp'] == "dp"): ?>
                    <img class="uk-border-circle" src="<?= base_url('assets/images/dp.jpg'); ?>" title="<?=$this->lang->line('panel_dp');?>" width="30px" height="30px" uk-tooltip="pos: bottom">
                    <?php else: ?>
                    <img class="uk-border-circle" src="<?= base_url('assets/images/vp.jpg'); ?>" title="<?=$this->lang->line('panel_vp');?>" width="30px" height="30px" uk-tooltip="pos: bottom">
                    <?php endif; ?>
                    <span class="uk-badge"><?= $this->shop_model->getPriceType($idlink, $_GET['tp']); ?></span>
                  </p>
                </div>
              </div>
              <div class="uk-width-expand@m">
                <form action="" method="post" accept-charset="utf-8">
                  <div class="uk-margin-small uk-light">
                    <label class="uk-form-label uk-text-uppercase"><i class="fas fa-list-ul"></i> <?=$this->lang->line('store_select_character');?></label>
                    <div class="uk-form-controls">
                      <select class="uk-select uk-width-1-1" name="charSelects">
                        <?php foreach ($this->m_data->getRealms()->result() as $charsMultiRealm) { 
                          $multiRealm = $this->m_data->realmConnection($charsMultiRealm->username, $charsMultiRealm->password, $charsMultiRealm->hostname, $charsMultiRealm->char_database);
                        ?>
                          <?php foreach($this->m_characters->getGeneralCharactersSpecifyAcc($multiRealm ,$this->session->userdata('fx_sess_id'))->result() as $listchar) { ?>
                          <option value="<?= $charsMultiRealm->id ?>|<?= $listchar->guid ?>"><?= $listchar->name ?> - <?= $this->m_general->getRealmName($charsMultiRealm->realmID); ?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="uk-margin-small">
                    <?php if ($_GET['tp'] == "dp")
                      $qqs = $this->m_general->getCharDPTotal($this->session->userdata('fx_sess_id'));
                    else
                      $qqs = $this->m_general->getCharVPTotal($this->session->userdata('fx_sess_id'));
                    ?>
                    <?php if ($qqs >= $this->shop_model->getPriceType($idlink, $_GET['tp'])) { ?>
                    <button type="submit" name="buyNowGetItem" class="uk-button uk-button-primary uk-width-1-1" title="<?= $this->lang->line('button_buy'); ?>"><i class="fas fa-shopping-cart"></i> <?= $this->lang->line('button_buy'); ?></button>
                    <?php } else { ?>
                    <div class="uk-alert-warning" uk-alert><p><i class="fas fa-exclamation-triangle"></i> <?=$this->lang->line('points_insuff');?></p></div>
                    <?php } ?>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="uk-width-1-6@m"></div>
        </div>
      </div>
    </section>
