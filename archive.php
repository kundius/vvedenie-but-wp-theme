<!DOCTYPE html>
<html class="no-js" <?php language_attributes()?> itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head')?>
  </head>
  <body <?php body_class()?>>
    <?php wp_body_open()?>

    <div class="page-wrapper">
      <?php get_template_part('partials/header') ?>
      <?php get_template_part('partials/page-breadcrumbs') ?>

      <div class="page-headline">
        <div class="ui-container">
          <h1 class="page-headline__title page-headline__title_normal"><?php single_cat_title() ?></h1>
        </div>
      </div>

      <div class="page-body">
        <div class="ui-container">
          <?php if (have_posts()): ?>
          <div class="archive-grid">
            <?php while (have_posts()): ?>
            <?php the_post()?>
            <div class="blog-list__item">
              <article class="blog-card">
                <figure class="blog-card__image">
                  <img src="<?php the_post_thumbnail_url('theme-medium')?>" alt="<?php the_title()?>" />
                </figure>
                <div class="blog-card__title">
                  <a href="<?php the_permalink()?>">
                    <?php the_title() ?>
                  </a>
                </div>
                <div class="blog-card__date">
                  <?php echo get_the_date('d.m.Y') ?>
                </div>
                <div class="blog-card__description">
                  <?php echo \DomenART\Theme\Services\Theme::cut_string(get_the_excerpt(), 180, ' «...»') ?>
                </div>
              </article>
            </div>
            <?php endwhile?>
            <?php wp_reset_postdata()?>
          </div>

          <?php the_posts_pagination(['prev_text' => '', 'next_text' => ''])?>
          <?php else: ?>
            <p>Извините, ничего не найдено.</p>
          <?php endif?>
        </div>
      </div>

      <?php get_template_part('partials/footer')?>
    </div>
  </body>
</html>
