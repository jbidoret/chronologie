<?php snippet('header') ?>

<main id="home">

  <?php if ($page->text()->isNotEmpty()): ?>
    <section class="home-intro">
      <div class="max">
        <?= $page->text()->kt() ?>
      </div>
    </section>
  <?php endif ?>
    
  <div class="decades">
    <?php
    $decades = $site->children()->listed()->template('decade');
    foreach ($decades as $decade): ?>
      <section class="decade" id="decade-<?= $decade->slug() ?>">
        <header class="max decade-header">
          <h2 class="decade-title">
            <a href="<?= $decade->url() ?>" class="decade-link">
              <?= preg_replace('/–(\w+)?/i', '<br>↪', $decade->title()->value()) ?>
              <!-- <?= preg_replace('/–(\w+)?/i', '<br>', $decade->title()->value()) ?> -->
            </a>
          </h2>
          <div class="decade-intro">
            <?php if($decade->subtitle()->isNotEmpty()): ?>
              <h3 class="decade-subtitle">
              <a href="<?= $decade->url() ?>" class="decade-link"><?= $decade->subtitle() ?></a>
              </h3>
            <?php endif ?>
            <?php if($decade->introduction()->isNotEmpty()): ?>
              <?= $decade->introduction()->kt() ?>
            <?php else :?>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?</p>
            <?php endif ?>
            
          </div>
          <a class="decade-button decade-link" href="<?= $decade->url() ?>">ouvrir</a>
        </header>
        <div id="decade-<?= $decade->slug() ?>-content" class="decade-content"></div>
      </section>
    <?php endforeach ?>
  </div>

</main>

<?php snippet('footer') ?>
