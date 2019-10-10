    <section class="uk-section uk-section-small" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <h3 class="uk-h3 uk-text-bold uk-text-uppercase"><i class="ra ra-axe"></i> <?=$this->lang->line('nav_pvp_statistics');?></h3>
        <span class="uk-label uk-text-bold uk-label-danger"><?=$this->lang->line('pvp_top');?></span>
        <ul uk-tab="connect: #pvpstatistics; animation: uk-animation-fade; toggle: > *">
          <?php foreach ($this->m_data->getRealms()->result() as $charsMultiRealm):
            $multiRealm = $this->m_data->realmConnection($charsMultiRealm->username, $charsMultiRealm->password, $charsMultiRealm->hostname, $charsMultiRealm->char_database);
          ?>
            <li><a class="uk-text-bold"><span uk-icon="icon: server"></span> <?= $this->m_general->getRealmName($charsMultiRealm->realmID); ?></a></li>
          <?php endforeach ?>
        </ul>
        <ul id="pvpstatistics" class="uk-switcher">
          <?php foreach ($this->m_data->getRealms()->result() as $charsMultiRealm):
            $multiRealm = $this->m_data->realmConnection($charsMultiRealm->username, $charsMultiRealm->password, $charsMultiRealm->hostname, $charsMultiRealm->char_database);
          ?>
            <li>
              <div class="uk-overflow-auto uk-width-1-1 uk-margin">
                <table class="uk-table uk-table-divider">
                  <thead>
                    <tr>
                      <th class="uk-width-small"><i class="fas fa-user"></i> <?=$this->lang->line('column_name');?></th>
                      <th class="uk-width-small uk-text-center"><i class="fas fa-flag"></i> <?=$this->lang->line('column_faction');?></th>
                      <th class="uk-width-small uk-text-center"><i class="fas fa-info-circle"></i> <?=$this->lang->line('column_total_kills');?></th>
                      <th class="uk-width-small uk-text-center"><i class="fas fa-crosshairs"></i> <?=$this->lang->line('column_today_kills');?></th>
                      <th class="uk-width-small uk-text-center"><i class="fas fa-crosshairs"></i> <?=$this->lang->line('column_yersterday_kills');?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($this->pvp_model->getTop20PVP($multiRealm)->result() as $tops): ?>
                      <tr>
                        <td><img class="uk-border-circle" src="<?= base_url('assets/images/races/'.$this->m_general->getRaceIcon($tops->race)) ?>" title="<?= $tops->name ?>"  width="30px" height="30px" uk-tooltip="pos: bottom"> <?= $tops->name ?></td>
                        <td class="uk-text-center"><img class="uk-border-circle" src="<?= base_url(); ?>assets/images/factions/<?= $this->m_general->getFaction($tops->race) ?>.png"></td>
                        <td class="uk-text-center"><?= $tops->totalKills ?></td>
                        <td class="uk-text-center"><?= $tops->todayKills ?></td>
                        <td class="uk-text-center"><?= $tops->yesterdayKills ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
    </section>
