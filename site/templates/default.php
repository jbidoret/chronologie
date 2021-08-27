<?php snippet('header') ?>
  <main class="main-event" data-year="<?= $page->year()->value() ?>" data-slug="<?= $page->slug() ?>">
    <article class="event-detail <?= $page->theme()->fromAutoID()->slug() ?>">
      <header>
        <h2><?= $page->year()->html() ?></h2>
        <h1><?= $page->title()->html() ?></h1>
      </header>

      
      <div class="event-text">
        <h3>L’édito</h3>
        <?php if($page->introduction_text()->isNotEmpty()) :?>
          <div class="introduction">
            <?= $page->introduction_text()->kt()?>
          </div>
        <?php endif ?>

      </div>

      <div class="event-text event-program">

        <h3>Le programme</h3>
        <?php if($page->programme()->isNotEmpty()) :?>
          <div class="programme">
            <?= $page->programme()->kt()?>
          </div>
        <?php endif ?>

      
      </div>

      <div class="event-text">

        
        <?php if($page->text()->isNotEmpty()) :?>
          <div class="text">
            <?= $page->text()->kt()?>
          </div>
        <?php endif ?>

      
      </div>

      <?php if($page->details()->isNotEmpty()) :?>
        <aside class="event-details">
          <?= $page->details()->kt()?>
        </aside>
      <?php endif ?>
    
    </article>

    <div class="pastilla">
      <audio src="<?= url("assets/pastilla.mp3")?>" ></audio>
    </div>


    <?php
    $gallery = $page->gallery()->filter(function($image) use($page){
      return $image != $page->cover()->toFile();
    })->sortBy('sort')->toFiles();
     if($gallery->count()) :?>
      <h3><b>Les scans du programme</b></h3>
      <div class="gallery">
        
        <?php foreach($gallery as $image) : ?>     
        <figure class="<?= $image->layout() ?>">
          <a href="<?= $image->url() ?>">
            <img loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>" src="<?= $image->thumb('listitem')->url()?>" alt="<?= $image->alt()?>" srcset="<?= $image->srcset('default')?>">
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
