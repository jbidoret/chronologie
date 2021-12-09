<article class="session">
  <p class="session-year"><?= $session->year() ?></p>
  <a href="<?= $session->url() ?>" class="session-link">
    <h3><?= $session->title() ?></h3>
    <?php if ($session->subtitle()->isNotEmpty()) :?>
      <div class="session-subtitle">
        <?= $session->subtitle()->kti()?>
      </div>
    <?php endif ?>
    <?php if ($session->cover()->isNotEmpty()) :?>
    <figure class="session-cover">
      <?php $image = $session->cover()->toFile() ?>
      <img loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>" src="<?= $image->thumb('cover')->url()?>" alt="<?= $image->alt()?>" >
    </figure>
    <?php endif ?>
    <?php if ($session->introduction()->isNotEmpty()) :?>
      <div class="session-introduction">
        <?= $session->introduction()->excerpt(200, false, " […]")?>
      </div>
    <?php endif ?>
  </a>
<?php
$contexts = $session->children()->listed()->template("context");
if ($contexts->count()): ?>
  <aside class="session-aside">
    <?php foreach ($contexts as $context) :?>
      <?php snippet("context", ["context"=>$context]) ?>
    <?php endforeach ?>
  </aside>
<?php endif ?>
</article>