<?php snippet('header') ?>
  <main class="main-event" data-year="<?= $page->year()->value() ?>" data-slug="<?= $page->slug() ?>">
    <article class="event-detail">
      <header>
        <h2><?= $page->year()->html() ?></h2>
        <h1><?= $page->title()->html() ?></h1>
      </header>
      
      <?php if($page->introduction()->isNotEmpty()): ?>
        <div class="session-introduction">
          <h3>L’édito</h3>
          <div class="session-introduction-text">
            <?= $page->introduction_text()->kt()?>
          </div>
        </div>
      <?php endif ?>

      <?php if($page->text()->isNotEmpty()): ?>
        <div class="session-text">
        <h3>Le programme</h3>
          <div class="session-text-text">
            <?= $page->text_text()->kt()?>
          </div>
        </div>
      <?php endif ?>

      <?php if($page->details()->isNotEmpty()) :?>
        <aside class="event-details">
          <?= $page->details()->kt()?>
        </aside>
      <?php endif ?>
    
    </article>

    <?php foreach($page->children()->listed()->template("story") as $story):?>
      <?php snippet("story", ["story"=>$story]) ?>
    <?php endforeach ?>


    <?php
    $gallery = $page->gallery()->filter(function($image) use($page){
      return $image != $page->cover()->toFile();
    })->sortBy('sort')->toFiles();
     if($gallery->count()) :?>
      <h3><b>Le programme en images</b></h3>
      <div class="gallery">
        
        <?php foreach($gallery as $image) : ?>     
        <figure class="<?= $image->layout() ?>">
          <a href="<?= $image->url() ?>">
            <img loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>" src="<?= $image->thumb('default')->url()?>" alt="<?= $image->alt()?>" srcset="<?= $image->srcset('default')?>">
          </a>
          <?php if($image->caption()->isNotEmpty()) :?>
            <figcaption>
              <?= $image->caption()->kt()?>
            </figcaption>
          <?php endif ?>
        </figure>
        <?php endforeach ?>
      </div>
    <?php endif ?>

  </main>
<?php snippet('footer') ?>
