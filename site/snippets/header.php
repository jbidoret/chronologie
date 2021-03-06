<!DOCTYPE html>
<html lang="<?php echo $kirby->language() ?? 'fr' ?>">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <script>document.getElementsByTagName('html')[0].className = 'js'</script>
  
  <?php snippet("header.metas") ?>
  
  <?= css("assets/fonts/fonts.css") ?>
  <?= css(["assets/css/index.css", "@auto"]) ?>
  <?= css("assets/glightbox/glightbox.min.css") ?>
</head>
<body
   data-slug="<?= $page->slug() ?>"
   data-login="<?php e($kirby->user(), 'true', 'false') ?>"
   data-template="<?php echo $page->template() ?>"
   data-intended-template="<?php echo $page->intendedTemplate() ?>">

  <header id="header">
    <div class="max">
      <h1><a href="<?= $site->url() ?>"><?= $site->title() ?></a></h1>
      
      <nav id="nav">
        <ul class="decades dropdown">
        <?php foreach ($site->children()->listed() as $p): ?>
          <li <?php e($p->isOpen(), 'class="selected"') ?>><a href="<?= $p->url() ?>"><?= $p->title() ?></a></li>
        <?php endforeach ?>
        </ul>
        <?php if ($page->intendedTemplate() == "session"):  ?>
          <ul class="years dropdown">
          <?php foreach ($page->siblings()->listed() as $sub): ?>
            <li <?php e($sub->isOpen(), 'class="selected"') ?>><a href="<?= $sub->url() ?>"><?= $sub->year() ?></a></li>
          <?php endforeach ?>
          </ul>
        <?php endif ?>
        <div id="search-bar">
          
          <button type="button" id="search-navbutton" class="search-button">
            <svg viewBox="0 0 24 24" sizes="" class="search-icon"><path fill="#000000" d="M17.121 15l5.598 5.597a.5.5 0 010 .707l-1.415 1.415a.5.5 0 01-.707 0L15 17.12 17.121 15z"></path><path fill="#16161d" fill-rule="evenodd" d="M10.5 19a8.5 8.5 0 100-17 8.5 8.5 0 000 17zm0-2.75a5.75 5.75 0 100-11.5 5.75 5.75 0 000 11.5z" clip-rule="evenodd"></path></svg>
          </button>
          <form action="<?= page("recherche")->url()?>" class="search-form">
            <input type="search" name="q" id="search-input" class="search-input"  value="<?php if(isset($query)) {
                echo html($query);
            } ?>">
            <button type="submit" class="search-button" id="search-button" >
              <svg viewBox="0 0 24 24" sizes="" class="search-icon"><path fill="#000000" d="M17.121 15l5.598 5.597a.5.5 0 010 .707l-1.415 1.415a.5.5 0 01-.707 0L15 17.12 17.121 15z"></path><path fill="#16161d" fill-rule="evenodd" d="M10.5 19a8.5 8.5 0 100-17 8.5 8.5 0 000 17zm0-2.75a5.75 5.75 0 100-11.5 5.75 5.75 0 000 11.5z" clip-rule="evenodd"></path></svg>
            </button>
          </form>
          </div>    
      </nav>
    </div>

  </header>
  <div id="search-overlay"></div>