<?php if(isset($_POST['donateNow'])) {
    $this->donate_model->getDonate($_POST['donateNow']);
} ?>

    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <h3 class="uk-h3 uk-text-bold uk-text-uppercase"><i class="fab fa-cc-paypal"></i> Donations</h3>
        <div class="uk-grid-small uk-grid-match uk-child-width-1-1 uk-child-width-1-4@s uk-flex-center" uk-grid>
          <?php foreach($this->donate_model->getDonations()->result() as $donateList) { ?>
          <div>
            <div class="uk-transition-toggle" tabindex="0">
              <div class="uk-card uk-card-body uk-card-donate uk-text-center uk-transition-scale-up uk-transition-opaque">
                <i class="fab fa-paypal fa-3x"></i>
                <p>
                  <span class="uk-h2"><span class="uk-text-bold"><?= $donateList->name ?></span><br>
                  <sup><?= $this->config->item('currencySymbol'); ?></sup><?= $donateList->price ?></span>
                </p>
                <p>
                  <span class="uk-h5"><span uk-icon="icon: plus-circle"></span> Get <span class="uk-text-bold"><?= $donateList->points ?></span> <?= $this->lang->line('panel_dp') ?></span>
                </p>
                <form action="" method="post" accept-charset="utf-8">
                  <div class="uk-margin">
                    <button class="uk-button uk-button-secondary" type="submit" value="<?= $donateList->id ?>" name="donateNow"><i class="fas fa-donate"></i> <?= $this->lang->line('button_donate'); ?></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
