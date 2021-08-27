<?php snippet('header') ?>

<main id="home">

  <?php if ($page->text()->isNotEmpty()): ?>
    <div class="home-intro">
      <?= $page->text()->kt() ?>
    </div>
  <?php endif ?>
    
  <section class="decades">
    <ul>
      <?php
      $decades = $site->children()->listed()->template('decade');
      foreach ($decades as $decade): ?>
        <li>
          <a href="<?= $decade->url() ?>">
            <?php if ($decade->cover()->isNotEmpty()) :?>
            <figure class="decade-cover">
              <?php $image = $decade->cover()->toFile() ?>
              <img loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>" src="<?= $image->thumb('default')->url()?>" alt="<?= $image->alt()?>" >
            </figure>
            <?php endif ?>
            <?= $decade->title() ?>
          </a>
        </li>
      <?php endforeach ?>
    </ul>
  </section>

</main>

<?php snippet('footer') ?>
