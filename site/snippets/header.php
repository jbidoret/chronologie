<!DOCTYPE html>
<html lang="<?php echo $kirby->language() ?? 'fr' ?>">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <script>document.getElementsByTagName('html')[0].className = 'js'</script>
  
  <?php snippet("header.metas") ?>

  <?= css("assets/css/index.css") ?>

</head>
<body
   data-slug="<?= $page->slug() ?>"
   data-login="<?php e($kirby->user(), 'true', 'false') ?>"
   data-template="<?php echo $page->template() ?>"
   data-intended-template="<?php echo $page->intendedTemplate() ?>">

  <header id="header">
    <h1><a href="<?= $site->url() ?>"><?= $site->title() ?></a></h1>
    
    <nav>
      <ul>
      <?php foreach ($site->children()->listed() as $p): ?>
        <li <?php e($p->isOpen(), 'class="open"') ?>>
          <a href="<?= $p->url() ?>"><?= $p->title() ?></a>
        </li>
      <?php endforeach ?>
      </ul>
      <?php if ($page->intendedTemplate() == "session"):  ?>
        <ul>
        <?php foreach ($page->siblings()->listed() as $sub): ?>
          <li <?php e($sub->isOpen(), 'class="open"') ?>>
            <a href="<?= $sub->url() ?>"><?= $sub->year() ?></a>
          </li>
        <?php endforeach ?>
        </ul>
      <?php endif ?>
    </nav>

  </header>