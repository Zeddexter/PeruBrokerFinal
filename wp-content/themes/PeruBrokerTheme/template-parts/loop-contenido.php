
<div class="col col-md-4">
    <div class="item-noticia">
        <a href="<?php the_permalink(); ?>" class="item">
            <h4><?php the_title();?></h4>
            <div class="contenido-hero">
                <?php the_post_thumbnail('thumbnail'); ?>
            </div>
            <div class="extracto">
                <?php echo get_the_excerpt('20'); ?>
            </div>
        </a>
    </div>
</div>



