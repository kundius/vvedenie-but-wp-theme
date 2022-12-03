<?php
global $post;

$excerpt = null;
$content = null;

if (strpos($post->post_content, '<!--more-->')) {
    $content_parts = get_extended($post->post_content);
    $excerpt = apply_filters('the_content', $content_parts['main']);
    $content = apply_filters('the_content', $content_parts['extended']);
} else {
    $content = apply_filters('the_content', $post->post_content);
}
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes()?> itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head')?>
  </head>
  <body <?php body_class()?>>
    <?php wp_body_open()?>

    <div class="single-wrapper">
      <?php get_template_part('partials/header') ?>
      <?php get_template_part('partials/page-breadcrumbs') ?>

      <div class="single-body">
        <div class="ui-container">
          <div class="single-headline">
            <div class="single-headline__date">
              <?php echo get_the_date('d.m.Y') ?>
            </div>

            <h1 class="single-headline__title"><?php the_title()?></h1>
          </div>

            <div class="single-main">
              <?php if (has_post_thumbnail()): ?>
                <figure class="single-thumbnail">
                  <div class="single-thumbnail__image">
                    <?php the_post_thumbnail('full')?>
                  </div>
                  <?php if ($caption = get_the_post_thumbnail_caption()): ?>
                  <div class="single-thumbnail__caption">
                    <?php echo $caption ?>
                  </div>
                  <?php endif?>
                </figure>
              <?php endif?>

              <?php if ($excerpt): ?>
              <div class="single-main__excerpt ui-content">
                <?php echo $excerpt ?>
              </div>
              <?php endif?>

              <div class="single-meta">
                <div class="single-meta__tags">
                  <?php the_tags('')?>
                </div>
                <div class="single-meta__share">
                  <div class="ya-share2" data-curtain data-shape="round" data-services="vkontakte,odnoklassniki,telegram"></div>
                </div>
              </div>

              <div class="single-main__content ui-content">
                <?php echo $content ?>
              </div>

              <div class="single-meta">
                <div class="single-meta__tags">
                  <?php the_tags('')?>
                </div>
                <div class="single-meta__share">
                  <div class="ya-share2" data-curtain data-shape="round" data-services="vkontakte,odnoklassniki,telegram"></div>
                </div>
              </div>
            </div>
          </div>

          <?php if ($see_also = get_field('post_see-also')): ?>
          <div class="see-also">
            <div class="see-also__title">Читайте также:</div>
            <div class="see-also__grid">
              <?php foreach ($see_also as $item): ?>
              <div class="see-also__grid-cell">
                <article class="blog-card">
                  <figure class="blog-card__image">
                    <img src="<?php echo get_the_post_thumbnail_url($item->ID, 'theme-medium') ?>" alt="<?php echo get_the_title($item->ID) ?>" />
                  </figure>
                  <div class="blog-card__title">
                    <a href="<?php the_permalink($item->ID) ?>"><?php echo get_the_title($item->ID) ?></a>
                  </div>
                  <div class="blog-card__date">
                    <?php echo get_the_date('d.m.Y', $item->ID) ?>
                  </div>
                  <div class="blog-card__description">
                    <?php echo \DomenART\Theme\Services\Theme::cut_string(get_the_excerpt($item->ID), 180, ' «...»') ?>
                  </div>
                </article>
              </div>
              <?php endforeach ?>
            </div>
          </div>
          <?php endif?>
        </div>
      </div>

      <script src="https://yastatic.net/share2/share.js"></script>

      <?php get_template_part('partials/footer')?>
    </div>
  </body>
</html>
