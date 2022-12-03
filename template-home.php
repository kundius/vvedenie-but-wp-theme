<?php
/*
Template Name: Главная
*/
$post_news = new WP_Query([
	'posts_per_page' => 3,
  'post_type' => 'post',
  'order' => 'DESC',
  'orderby' => 'date',
  'cat' => 5,
]);
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes();?> itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head');?>
  </head>
  <body <?php body_class();?>>
    <?php wp_body_open();?>

    <div class="ui-wrapper">
      <?php get_template_part('partials/header');?>

      <?php if ($intro = get_field('intro')): ?>
      <section class="intro">
        <div class="intro__content">
          <?php if ($intro['name']): ?>
          <div class="intro__name">
            <?php echo $intro['name'] ?>
          </div>
          <?php endif; ?>
          <?php if ($intro['description']): ?>
          <div class="intro__description">
            <?php echo $intro['description'] ?>
          </div>
          <?php endif; ?>
          <?php if ($intro['link']): ?>
          <div class="intro__link">
            <a href="<?php echo $intro['link'] ?>"  class="ui-button-primary">Узнать больше</a>
          </div>
          <?php endif; ?>
        </div>
      </section>
      <?php endif; ?>

      <?php if ($about = get_field('about')): ?>
      <section class="about">
        <div class="ui-container">
          <div class="about-layout">
            <div class="about-layout__text">
              <?php if ($about['name']): ?>
              <div class="about__name">
                <?php echo $about['name'] ?>
              </div>
              <?php endif; ?>
              <?php if ($about['description']): ?>
              <div class="about__description">
                <?php echo $about['description'] ?>
              </div>
              <?php endif; ?>
            </div>
            <?php if ($about['image']): ?>
            <div class="about-layout__image">
              <img class="about__image" src="<?php echo $about['image']['url'] ?>" alt="">
            </div>
            <?php endif; ?>
          </div>
        </div>
      </section>
      <?php endif; ?>

      <?php if ($gallery = get_field('gallery')): ?>
      <section class="gallery">
        <div class="ui-container">
          <div class="gallery-headline">
            <?php if ($gallery['title']): ?>
            <div class="gallery-headline__title">
              <?php echo $gallery['title'] ?>
            </div>
            <?php endif; ?>
            <?php if ($gallery['description']): ?>
            <div class="gallery-headline__description">
              <?php echo $gallery['description'] ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <?php if (count($gallery['images']) > 0): ?>
        <div class="swiper gallery-swiper">
          <div class="swiper-wrapper">
            <?php foreach ($gallery['images'] as $image): ?>
            <div class="swiper-slide">
              <img class="gallery-swiper__image" src="<?php echo $image['sizes']['theme-medium'] ?>" alt="">
            </div>
            <?php endforeach; ?>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
        <?php endif; ?>
      </section>
      <?php endif; ?>

      <?php if ($clergy = get_field('clergy')): ?>
      <section class="clergy">
        <div class="ui-container">
          <div class="clergy-headline">
            <?php if ($clergy['title']): ?>
            <div class="clergy-headline__title">
              <?php echo $clergy['title'] ?>
            </div>
            <?php endif; ?>
            <?php if ($clergy['description']): ?>
            <div class="clergy-headline__description">
              <?php echo $clergy['description'] ?>
            </div>
            <?php endif; ?>
          </div>
          <?php if (count($clergy['items']) > 0): ?>
          <div class="swiper clergy-swiper">
            <div class="swiper-wrapper">
              <?php foreach ($clergy['items'] as $item): ?>
              <div class="swiper-slide">
                <div class="clergy-item">
                  <div class="clergy-item__image">
                    <img src="<?php echo $item['image']['sizes']['thumbnail'] ?>" alt="">
                  </div>
                  <div class="clergy-item__description">
                    <?php echo $item['description'] ?>
                  </div>
                  <div class="clergy-item__name">
                    <?php echo $item['name'] ?>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <div class="swiper-button-next clergy-swiper-button-next"></div>
            <div class="swiper-button-prev clergy-swiper-button-prev"></div>
          </div>
          <?php endif; ?>
        </div>
      </section>
      <?php endif; ?>

      <?php if (($blog = get_field('blog')) && $post_news->have_posts()): ?>
      <section class="blog">
        <div class="ui-container">
          <div class="blog-headline">
            <?php if ($blog['title']): ?>
            <div class="blog-headline__title">
              <?php echo $blog['title'] ?>
            </div>
            <?php endif; ?>
            <?php if ($blog['description']): ?>
            <div class="blog-headline__description">
              <?php echo $blog['description'] ?>
            </div>
            <?php endif; ?>
          </div>

          <div class="blog__list">
            <div class="blog-list">
              <?php while ($post_news->have_posts()): ?>
              <?php $post_news->the_post()?>
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
              <?php wp_reset_postdata() ?>
            </div>
          </div>

          <div class="blog__more">
            <a href="<?php echo $blog['link'] ?>" class="ui-button-primary">Смотреть все</a>
          </div>
        </div>
      </section>
      <?php endif; ?>

      <?php if ($calendar = get_field('calendar')): ?>
      <section class="calendar">
        <div class="ui-container">
          <div class="calendar-headline">
            <?php if ($calendar['title']): ?>
            <div class="calendar-headline__title">
              <?php echo $calendar['title'] ?>
            </div>
            <?php endif; ?>
            <?php if ($calendar['description']): ?>
            <div class="calendar-headline__description">
              <?php echo $calendar['description'] ?>
            </div>
            <?php endif; ?>
          </div>

          <?php if ($calendar['widget']): ?>
          <div class="calendar__widget">
            <?php echo $calendar['widget'] ?>
          </div>
          <?php endif; ?>
        </div>
      </section>
      <?php endif; ?>

      <?php get_template_part('partials/footer');?>
    </div>
  </body>
</html>
