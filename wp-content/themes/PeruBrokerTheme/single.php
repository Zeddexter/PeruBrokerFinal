
<style>

</style>
    <?php get_header(); ?>

    <style>
        header .menu{
        top:"40px"!important;
        }
    </style>
    
<div class="row" >
        <div class="col">
            <section class="hero" style="background-color:rgba(23, 41, 131,1); height: 155px;">
                        <div class="idioma">
                            <?php if ( function_exists ( 'wpm_language_switcher' ) ) wpm_language_switcher (); ?>
                        </div>

                        <div class="btn-up">
                            <img class="icon-up" src="<?php echo get_template_directory_uri(); ?>/img/up.svg">
                        </div>
            </section>
        </div>
</div>
<!-- FIN HERO --> 



<section class="page-noticia" >
    <div class="content">
    
    
    <div class="row" >
        <div class="col-12 col-lg-7 col-xl-8">
            

            <?php while(have_posts()): the_post(); ?>
            <?php
                get_template_part('template-parts/loop','detalle');
            ?>
            <?php endwhile; ?>
        </div>    
    

<!-- </div> -->

        <div class="col-12 col-lg-5 col-xl-4">
            <div class="contenido-otras-noticias">
                <h3>Otras noticias</h3>
                <?php 
                $args = array(
                    //  'post_type' => 'gymfitness_clases',
                        'posts_per_page' =>10,   //-1 te trae todos
                        'orderby' => 'title',
                        'order' => 'DESC'
                );
                $clases = new WP_Query($args);
                while ($clases->have_posts() ): $clases -> the_post(); ?>
            
                
            
                <div class="item-otras-noticias">
                    
                    <div class="row">
                        <div class="col-5">
                            <div class="img-otras-noticias">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="title">
                                <h4><a href="<?php the_permalink(); ?>"> <?php the_title();?> </a></h4>
                            </div>
                            <div class="extracto">
                                <p><?php echo get_the_excerpt(get_the_ID());?></p>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>  <!--FIN col -->
        </div>
    </div><!--FIN ROW -->
</section>

<?php get_footer();?>