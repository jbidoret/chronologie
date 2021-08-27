<?php snippet('header') ?>
  <main class="decade" data-slug="<?= $page->slug() ?>">
    
    <article class="decade-detail">
      <header>
        <h1><?= $page->title()->html() ?></h1>
      </header>
      
      <div class="decade-intro">
        <?php if ($page->introduction()->isNotEmpty()) :?>
          <div class="introduction">
            <?= $page->introduction()->kt()?>
          </div>
        <?php endif ?>
      </div>
    </article>
    
    <section class="sessions">
      <?php foreach ($page->children()->listed()->template("session") as $session) :?>        
        <a href="<?= $session->url() ?>" class="session-link">
          <h3><?= $session->title() ?></h3>
          <?php if ($session->introduction()->isNotEmpty()) :?>
            <div class="session-introduction">
              <?= $session->introduction()->excerpt(200, false, " […]")?>
            </div>
          <?php endif ?>
          <?php if ($session->cover()->isNotEmpty()) :?>
          <figure class="session-cover">
            <?php $image = $session->cover()->toFile() ?>
            <img loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>" src="<?= $image->thumb('default')->url()?>" alt="<?= $image->alt()?>" >
          </figure>
          <?php endif ?>
        </a>
      <?php endforeach ?>
    </section>

    <?php foreach ($page->children()->listed()->template("story") as $story):?>
      <?php snippet("story", ["story"=>$story]) ?>
    <?php endforeach ?>

  </main>
<?php snippet('footer') ?>
