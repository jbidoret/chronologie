<?php snippet('header') ?>
  <main>
    <article>
      <h1 class="h1"><?= $page->title()->html() ?></h1>
      <div class="text">
        <?= $page->text()->kt() ?>
      </div>
    </article>
  </main>
<?php snippet('footer') ?>
