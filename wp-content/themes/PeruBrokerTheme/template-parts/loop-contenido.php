
<div class="col-sm-12 col-md-4">
    <div class="item-noticia">
        <a href="<?php the_permalink(); ?>" class="item">
            
            <div class="img-noticia">
                <?php the_post_thumbnail('thumbnail'); ?>
            </div>
            <div class="titulo-noticia">
                <h4><?php the_title();?></h4>
            </div>
            <div class="extracto">
                <p>
                    <?php echo get_the_excerpt('20'); ?>
                </p>
            </div>
        </a>
    </div>
</div>



