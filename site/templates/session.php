<?php snippet('header') ?>
  <main class="main-session" data-year="<?= $page->year()->value() ?>" data-slug="<?= $page->slug() ?>">
    
    <?php snippet("prevnext")?>

    <article class="session-detail">

      <header class="session-header">
        <h3><?= $page->year()->html() ?></h3>
        <h1><?= $page->title()->html() ?></h1>
        <?php if ($page->subtitle()->isNotEmpty()) :?>
          <div class="session-subtitle">
            <?= $page->subtitle()->kti()?>
        </div>
        <?php endif ?>
      </header>

      <?php if ($page->introduction_text()->isNotEmpty()): ?>
        <div class="session-introduction">
          <h2>L’édito</h2>
          <div class="session-introduction-text main-text"">
            <?= $page->introduction_text()->kt()?>
          </div>
        </div>
      <?php endif ?>

      <?php if ($page->text()->isNotEmpty()): ?>
        <div class="session-text">
          <h2>Le programme</h2>
          <div class="session-text-text main-text">
            <?= $page->text()->kt()?>
          </div>
        </div>
      <?php endif ?>

      <?php if ($page->details()->isNotEmpty()) :?>
        <aside class="session-aside main-text">
          <?= $page->details()->kt()?>
        </aside>
      <?php endif ?>

      <?php
      $contexts = $page->children()->listed()->template("context");
      if ($contexts->count()): ?>
        <aside class="session-aside">
          <h2>Pendant ce temps</h2>
          <?php foreach ($contexts as $context) :?>
            <?php snippet("context", ["context"=>$context]) ?>
          <?php endforeach ?>
        </aside>
      <?php endif ?>
    
      <?php if ($page->lecturers()->isNotEmpty()) :?>
        <aside class="session-lecturers main-text">
          <p>Intervenants : </p>
          <ul>
          <?php foreach ($page->lecturers()->split() as $lecturer): ?>
            <li><a href="<?= page("recherche")->url(['params' => ["tag"=> urlencode($lecturer) ]]) ?>"><?= $lecturer ?></a></li><?php endforeach ?>
          </ul>
        </aside>
      <?php endif ?>
    
    </article>

    <?php foreach ($page->children()->listed()->template("story") as $story):?>
      <?php snippet("story", ["story"=>$story]) ?>
    <?php endforeach ?>

  

    <?php
    $gallery = $page->gallery()->filter(function ($image) use ($page) {
        return $image != $page->cover()->toFile();
    })->sortBy('sort')->toFiles();
     if ($gallery->count()) :?>
      <div class="session-gallery">
        <h3><?= $page->year() ?> — <?= r($page->gallery_title()->isNotEmpty(), $page->gallery_title(), "le programme en images") ?></h3>
        <div class="gallery">
          <?php foreach ($gallery as $image) : ?>     
          <figure class="<?= $image->layout() ?>">
            <a href="<?= $image->url() ?>" class="glightbox">
              <img loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>" src="<?= $image->thumb('default')->url()?>" alt="<?= $image->alt()?>" srcset="<?= $image->srcset('default')?>">
            </a>
            <?php if ($image->caption()->isNotEmpty()) :?>
              <figcaption>
                <?= $image->caption()->kt()?>
              </figcaption>
            <?php endif ?>
          </figure>
          <?php endforeach ?>
        </div>
      </div>
    <?php endif ?>

    <?php snippet("prevnext")?>

  </main>
<?php snippet('footer') ?>
