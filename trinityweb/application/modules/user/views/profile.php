    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-medium" data-uk-grid>
          <div class="uk-width-1-5@m"></div>
          <div class="uk-width-3-5@m">
            <div class="uk-text-center">
              <?php if($this->m_general->getUserInfoGeneral($idlink)->num_rows()) { ?>
              <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/'.$this->m_data->getNameAvatar($this->m_data->getImageProfile($idlink))); ?>" width="120" height="120" alt="" />
              <?php } else { ?>
              <img class="uk-border-circle" src="<?= base_url('assets/images/profiles/default.png'); ?>" width="120" height="120" alt="" />
              <?php } ?>
              <div class="uk-space-small"></div>
              <div class="uk-principal-title"><?= $this->m_data->getUsernameID($idlink); ?></div>
              <div class="uk-space-medium"></div>
            </div>
            <div class="uk-scrollspy-inview uk-animation-slide-bottom" uk-scrollspy-class="">
              <div class="uk-grid uk-child-width-1-1" data-uk-grid>
                <?php foreach ($this->m_data->getRealms()->result() as $charsMultiRealm) { 
                  $multiRealm = $this->m_data->realmConnection($charsMultiRealm->username, $charsMultiRealm->password, $charsMultiRealm->hostname, $charsMultiRealm->char_database);
                ?>
                <div>
                  <h3 class="uk-h3 uk-heading-line"><span><i class="fas fa-server"></i> <?= $this->m_general->getRealmName($charsMultiRealm->realmID); ?> - <?= $this->lang->line('panel_chars_list'); ?></span></h3>
                  <div class="uk-grid uk-grid-small uk-child-width-auto" data-uk-grid>
                    <?php foreach($this->m_characters->getGeneralCharactersSpecifyAcc($multiRealm, $idlink)->result() as $chars) { ?>
                    <div>
                      <a href="<?= base_url('armory/player/'); ?><?= $chars->guid ?>/<?= $charsMultiRealm->realmID ?>">
                        <img class="uk-border-circle" src="<?= base_url('assets/images/class/'.$this->m_general->getClassIcon($chars->class)); ?>" title="<?= $chars->name ?> (Lvl <?= $chars->level ?>)" width="50" height="50" uk-tooltip>
                      </a>
                    </div>
                    <?php } ?>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="uk-width-3-5@m"></div>
        </div>
      </div>
    </section>
