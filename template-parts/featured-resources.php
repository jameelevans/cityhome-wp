<div class="row__large-4">
  <article class="card">
      <header class="card__thumb">
        <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
      </header>
      <div class="card__body">
        <div class="card__category">
          <?php
            $category = get_the_category();
            echo $category[0]->cat_name;
          ?>
        </div>
        <div class="card__title">
          <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
        </div>
      </div>
    </article>
</div>
