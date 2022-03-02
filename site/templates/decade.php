<?php snippet('header') ?>
  <main class="decade" data-slug="<?= $page->slug() ?>">
    
    <article class="decade-detail">
      <header class="max decade-header">
        <h2 class="decade-title">
          <a href="<?= $page->url() ?>" class="decade-link">
            <?= preg_replace('/–(\w+)?/i', '<br>↪', $page->title()->value()) ?>
            <!-- <?= preg_replace('/–(\w+)?/i', '<br>', $page->title()->value()) ?> -->
          </a>
        </h2>
        <div class="decade-intro">
          <?php if($page->subtitle()->isNotEmpty()): ?>
            <h3 class="decade-subtitle">
            <a href="<?= $page->url() ?>" class="decade-link"><?= $page->subtitle() ?></a>
            </h3>
          <?php endif ?>
          <?php if($page->introduction()->isNotEmpty()): ?>
            <?= $page->introduction()->kt() ?>
          <?php else :?>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?</p>
          <?php endif ?>
          
        </div>
      </header>
    </article>
    
    <section class="decade-sessions" id="decade-sessions" data-decade="<?= $page->slug() ?>">
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
