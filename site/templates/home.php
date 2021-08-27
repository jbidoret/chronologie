<?php snippet('header') ?>

<main id="home">
    
  <section class="decades">
    <ul>
      <?php 
      $decades = $site->children()->listed()->template('decade');
      foreach($decades as $decade): ?>
        <li>
          <a href="<?= $decade->url() ?>"><?= $decade->title() ?></a>
        </li>
      <?php endforeach ?>
    </ul>
  </section>

</main>

<?php snippet('footer') ?>
