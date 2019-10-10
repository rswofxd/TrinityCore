      <section class="uk-section uk-section-xsmall" data-uk-height-viewport="expand: true">
        <div class="uk-container uk-container-expand">
          <?php if(isset($_GET['generated'])) {
            $generated = $_GET['generated'];
          } else { 
            $generated = 'Nothing';
          }?>
          <div class="uk-grid uk-grid-small uk-margin-small" data-uk-grid>
            <div class="uk-width-1-3 uk-inline">
              <button class="uk-button uk-button-primary uk-width-1-1 uk-disabled">Your ID is: <span class="uk-text-bold"><?= $generated ?></span></button>
            </div>
            <div class="uk-width-2-3 uk-inline">
              <input class="uk-input" type="text" name="example-input1-group2" placeholder="<?= base_url('api/getchar?guid=100000&id='.$generated); ?>" disabled>
            </div>
          </div>
          <div class="uk-card uk-card-default">
            <div class="uk-card-header">
              <div class="uk-grid uk-grid-small">
                <div class="uk-width-auto">
                  <h4 class="uk-h4"><span data-uk-icon="icon: code"></span> API</h4>
                </div>
                <div class="uk-width-expand uk-text-right">
                  <a href="javascript:void(0)" class="uk-icon-button" uk-icon="icon: cog" uk-toggle="target: #newApi"></a>
                </div>
              </div>
            </div>
            <div class="uk-card-body">
              <div class="uk-grid uk-grid-small" data-uk-grid>
                <div class="uk-width-auto@m">
                  <ul class="uk-tab-left" uk-tab="connect: #api-component; animation: uk-animation-fade; toggle: > *">
                    <li class="uk-width-1-2 uk-width-1-1@m"><a href="#"><i class="fas fa-gamepad"></i> Principal</a></li>
                    <li class="uk-width-1-2 uk-width-1-1@m"><a href="#"><i class="far fa-user-circle"></i> Internal</a></li>
                    <li class="uk-width-1-2 uk-width-1-1@m"><a href="#"><i class="fas fa-tasks"></i> Skins</a></li>
                    <li class="uk-width-1-2 uk-width-1-1@m"><a href="#"><i class="fas fa-crosshairs"></i> Kills</a></li>
                    <li class="uk-width-1-2 uk-width-1-1@m"><a href="#"><i class="fas fa-male"></i> Personal</a></li>
                    <li class="uk-width-1-2 uk-width-1-1@m"><a href="#"><i class="fas fa-street-view"></i> Position</a></li>
                    <li class="uk-width-1-2 uk-width-1-1@m"><a href="#"><i class="far fa-clock"></i> Times</a></li>
                    <li class="uk-width-1-2 uk-width-1-1@m"><a href="#"><i class="fas fa-sign-in-alt"></i> Logins</a></li>
                    <li class="uk-width-1-2 uk-width-1-1@m"><a href="#"><i class="fas fa-chart-area"></i> Points</a></li>
                  </ul>
                </div>
                <div class="uk-width-expand@m">
                  <ul id="api-component" class="uk-switcher">
                    <li>
                      <h4 class="uk-h4 uk-text-warning uk-text-uppercase uk-text-bold">char_principal</h4>
                      <div class="uk-grid uk-grid-small uk-child-width-1-2 uk-child-width-1-4@m uk-margin-small" data-uk-grid>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharAccount</li>
                            <li>CharName</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharClass</li>
                            <li>CharRace</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharGender</li>
                            <li>CharLevel</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharOnline</li>
                            <li>CharMoney</li>
                          </ul>
                        </div>
                      </div>
                      <p>Send specific parameters in the URL to obtain different values, 
                        <a href="#" uk-toggle="target: #tg-parameters; animation: uk-animation-fade">PARAMETERS.</a>
                        <div id="tg-parameters" class="uk-card uk-card-secondary uk-card-body uk-margin-small">
                          <strong>api_username</strong>, Returns the name of the account<br>
                          <strong>api_class</strong>, Returns the name of the class<br>
                          <strong>api_race</strong>, Returns the name of the race<br>
                          <strong>api_gender</strong>, Returns the name of the gender
                        </div>
                        Find examples for this 
                        <a href="#" uk-toggle="target: #tg-example; animation: uk-animation-fade">Examples</a>
                        <div id="tg-example" class="uk-card uk-card-secondary uk-card-body uk-margin-small">
                          <strong>api_username</strong> api.com/api/getchar/guid=1&id=1
                          <strong>&api_username</strong>
                          <strong>Multiple</strong> <strong>&api_username&api_class&api_gender</strong>
                        </div>
                        The first two parameters should always be guid = <strong>ID</strong> & id = <strong>IDTOKEN</strong>
                      </p>
                    </li>
                    <li>
                      <h4 class="uk-h4 uk-text-warning uk-text-uppercase uk-text-bold">char_internal</h4>
                      <div class="uk-grid uk-grid-small uk-child-width-1-2 uk-child-width-1-4@m uk-margin-small" data-uk-grid>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharXP</li>
                            <li>CharBankSlot</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharFlags</li>
                            <li>CharInstance</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharTitle</li>
                            <li>CharKnowTitle</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharLatency</li>
                          </ul>
                        </div>
                      </div>
                      <p class="uk-text-bold">It has no parameters</p>
                    </li>
                    <li>
                      <h4 class="uk-h4 uk-text-warning uk-text-uppercase uk-text-bold">char_skins</h4>
                      <div class="uk-grid uk-grid-small uk-child-width-1-2 uk-child-width-1-4@m uk-margin-small" data-uk-grid>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharSkin</li>
                            <li>CharFace</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharHairStyle</li>
                            <li>CharHairColor</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharFacilStyle</li>
                          </ul>
                        </div>
                      </div>
                      <p class="uk-text-bold">It has no parameters</p>
                    </li>
                    <li>
                      <h4 class="uk-h4 uk-text-warning uk-text-uppercase uk-text-bold">char_kills</h4>
                      <div class="uk-grid uk-grid-small uk-child-width-1-2 uk-child-width-1-4@m uk-margin-small" data-uk-grid>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharTotalKills</li>
                            <li>CharTodayKills</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharYesterdayKills</li>
                          </ul>
                        </div>
                      </div>
                      <p class="uk-text-bold">It has no parameters</p>
                    </li>
                    <li>
                      <h4 class="uk-h4 uk-text-warning uk-text-uppercase uk-text-bold">char_personal</h4>
                      <div class="uk-grid uk-grid-small uk-child-width-1-2 uk-child-width-1-4@m uk-margin-small" data-uk-grid>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharHealth</li>
                            <li>CharPower1</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharPower2</li>
                            <li>CharPower3</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharPower4</li>
                            <li>CharPower5</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharPower6</li>
                            <li>CharPower7</li>
                          </ul>
                        </div>
                      </div>
                      <p class="uk-text-bold">It has no parameters</p>
                    </li>
                    <li>
                      <h4 class="uk-h4 uk-text-warning uk-text-uppercase uk-text-bold">char_position</h4>
                      <div class="uk-grid uk-grid-small uk-child-width-1-2 uk-child-width-1-4@m uk-margin-small" data-uk-grid>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharPositionX</li>
                            <li>CharPositionY</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharPositionZ</li>
                            <li>CharPositionO</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharPositionMap</li>
                            <li>CharPositionZone</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharTaxiMask</li>
                            <li>CharExploreZones</li>
                          </ul>
                        </div>
                      </div>
                      <p class="uk-text-bold">It has no parameters</p>
                    </li>
                    <li>
                      <h4 class="uk-h4 uk-text-warning uk-text-uppercase uk-text-bold">char_times</h4>
                      <div class="uk-grid uk-grid-small uk-child-width-1-2 uk-child-width-1-4@m uk-margin-small" data-uk-grid>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharTotalTime</li>
                            <li>CharLevelTime</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharLogoutTime</li>
                            <li>CharDeathExpTime</li>
                          </ul>
                        </div>
                      </div>
                      <p class="uk-text-bold">It has no parameters</p>
                    </li>
                    <li>
                      <h4 class="uk-h4 uk-text-warning uk-text-uppercase uk-text-bold">char_times</h4>
                      <div class="uk-grid uk-grid-small uk-child-width-1-2 uk-child-width-1-4@m uk-margin-small" data-uk-grid>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharLoginAt</li>
                          </ul>
                        </div>
                      </div>
                      <ul uk-accordion>
                        <li>
                          <a class="uk-accordion-title uk-text-warning uk-text-uppercase" href="#">char_logins</a>
                          <div class="uk-accordion-content">
                            <p><i class="fas fa-chevron-right"></i> CharLoginAt</p>
                          </div>
                        </li>
                      </ul>
                      <p class="uk-text-bold">It has no parameters</p>
                    </li>
                    <li>
                      <h4 class="uk-h4 uk-text-warning uk-text-uppercase uk-text-bold">char_points</h4>
                      <div class="uk-grid uk-grid-small uk-child-width-1-2 uk-child-width-1-4@m uk-margin-small" data-uk-grid>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharTotalArena</li>
                            <li>CharTotalHonor</li>
                          </ul>
                        </div>
                        <div>
                          <ul class="uk-list uk-list-bullet">
                            <li>CharTodayHonor</li>
                            <li>CharYesterdayHonor</li>
                          </ul>
                        </div>
                      </div>
                      <p class="uk-text-bold">It has no parameters</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
