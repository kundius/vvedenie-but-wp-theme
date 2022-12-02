<section class="header">
  <div class="ui-container header__container">
    
    <button class="header__toggle">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <div class="header__logo">
      <a href="/">
        vvedenie-but.ru
        <!-- <img src="<?php bloginfo('template_url') ?>/dist/images/logo.png" alt="<?php bloginfo('name') ?>" /> -->
      </a>
    </div>

    <?php wp_nav_menu([
      'container' => false,
      'theme_location' => 'menu-main',
      'menu_class' => 'header__menu'
    ]); ?>
  </div>
</section>
