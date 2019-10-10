    <section class="uk-section footer-section">
      <div class="uk-container uk-text-center">
        <p class="uk-margin-small">Copyright <i class="far fa-copyright"></i> <?= date('Y'); ?> <span class="uk-text-bold"><?= $this->config->item('ProjectName'); ?></span>. <?= $this->lang->line('footer_rights'); ?></p>
        <span class="uk-text-small">World of Warcraft® and Blizzard Entertainment® are all trademarks or registered trademarks of Blizzard Entertainment in the United States and/or other countries. These terms and all related materials, logos, and images are copyright © Blizzard Entertainment. This site is in no way associated with or endorsed by Blizzard Entertainment®.</span>
        <p class="uk-h6 uk-text-bold uk-text-uppercase uk-margin-small">Proudly powered by <a target="_blank" href="https://gitlab.com/ProjectCMS/BlizzCMS">BlizzCMS</a></p>
        <div class="uk-visible@m uk-light">
          <a target="_blank" href="<?= $this->config->item('social_facebook'); ?>" class="uk-icon-button uk-margin-small-right"><i class="fab fa-facebook-f"></i></a>
          <a target="_blank" href="<?= $this->config->item('social_twitter'); ?>" class="uk-icon-button uk-margin-small-right"><i class="fab fa-twitter"></i></a>
          <a target="_blank" href="<?= $this->config->item('social_youtube'); ?>" class="uk-icon-button"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
    </section>
  </body>
</html>
