<!DOCTYPE html>
<html class="no-js" <?php language_attributes() ?> itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head') ?>
  </head>
  <body <?php body_class('page-404-body') ?>>
    <?php wp_body_open() ?>
  
    <div class="page-404-main">
      <div class="ui-container">
        <div class="page-404-header">
          <div class="page-404-header__logo">
            <a href="/">
              <img src="<?php bloginfo('template_url') ?>/dist/images/logo-white.png" alt="<?php bloginfo('name') ?>" />
            </a>
          </div>
          <div class="page-404-header__desc">
            Аренда опалубки для<br /> коттеджного/загородного строительства
          </div>
        </div>
        <div class="page-404-code">
          <div class="page-404-code__number">404</div>
          <div class="page-404-code__desc">Страница не&nbsp;найдена</div>
        </div>
        <div class="page-404-desc">
          Возможно, она была перемещена или удалена.<br />
          Вы можете попробовать ещё раз с <a href="/">главной</a>, ознакомиться с <a href="<?php the_permalink(52) ?>">видами опалубки</a>  или  <a data-hystmodal="#feedback">сообщить нам о своей проблеме</a>.
        </div>
        <div class="page-404-phone">
          <div class="page-404-phone__label">Звоните:</div>
          <a href="tel:<?php the_field('theme_phone', 'options') ?>" class="page-404-phone__number">
            <?php the_field('theme_phone', 'options') ?>
          </a>
        </div>
      </div>
    </div>

    <?php get_template_part('partials/modals') ?>

    <?php wp_footer() ?>
  </body>
</html>
