    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <h3 class="uk-h3 uk-text-bold uk-text-uppercase"><i class="fas fa-star"></i> Vote</h3>
        <div class="uk-grid uk-grid-small uk-child-width-1-1 uk-child-width-1-4@s uk-child-width-1-5@m" data-uk-grid>
         <?php foreach ($voteList as $key => $voteList): ?>
          <div>
            <div class="uk-card uk-card-vote uk-card-body uk-text-center">
              <img src="<?= $voteList->image ?>">
              <div class="uk-card-badge uk-label" uk-tooltip="<?= $this->lang->line('panel_vp'); ?>"><?= $voteList->points ?></div>
                <h5 class="uk-h5 uk-text-uppercase uk-text-bold uk-margin-remove-bottom uk-margin-small-top">Next vote in:</h5>
                <div class="uk-grid-collapse uk-child-width-auto uk-flex-center uk-margin-small-bottom" uk-grid uk-countdown="date: <?= date('c', $this->fxvote->getTimeLogExpired($voteList->id, $this->session->userdata('fx_sess_id'))) ?>">
                  <div>
                    <div class="uk-countdown-number uk-countdown-days"></div>
                  </div>
                  <div class="uk-countdown-separator">:</div>
                  <div>
                    <div class="uk-countdown-number uk-countdown-hours"></div>
                  </div>
                  <div class="uk-countdown-separator">:</div>
                  <div>
                    <div class="uk-countdown-number uk-countdown-minutes"></div>
                  </div>
                  <div class="uk-countdown-separator">:</div>
                  <div>
                    <div class="uk-countdown-number uk-countdown-seconds"></div>
                  </div>
                </div>
                <?= form_open(base_url('vote/votenow/'.$voteList->id)); ?>
                  <button class="uk-button uk-button-default"><i class="fas fa-vote-yea"></i> <?= $this->lang->line('nav_vote'); ?></button>
                <?= form_close(); ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
