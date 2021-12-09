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
        <?php snippet("session", ["session"=>$session]) ?>
      <?php endforeach ?>
    </section>

    <?php foreach ($page->children()->listed()->template("story") as $story):?>
      <?php snippet("story", ["story"=>$story]) ?>
    <?php endforeach ?>

    <nav class="prevnext">
      <?php $decades = $page->siblings($self = true) ?>
      <?php if ($page->hasPrevListed($decades)): $prev = $page->prevListed($decades);?>
        <a href="<?= $prev->url() ?>">← <?= $prev->title() ?></a>
      <?php endif ?>
      <?php if ($page->hasNextListed($decades)): $next = $page->nextListed($decades);?>
        <a href="<?= $next->url() ?>"><?= $next->title() ?> →</a>
      <?php endif ?>
    </nav>

  </main>
<?php snippet('footer') ?>
