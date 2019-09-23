<?php get_header(); ?>
<div class="row" >
        <div class="col">
            <section class="hero" style="background-color:rgba(23, 41, 131,.9); height: 130px;">
                <div class="idioma">
                    <?php if ( function_exists ( 'wpm_language_switcher' ) ) wpm_language_switcher (); ?>
                </div>

                <div class="btn-up">
                    <img class="icon-up" src="<?php echo get_template_directory_uri(); ?>/img/up.svg">
                </div>
                <!-- <div class="chat">
                    <img class="icon-messenger" src="<?php echo get_template_directory_uri(); ?>/img/messenger.svg" alt="">
                </div> -->
            </section>
        </div>
</div>
<!-- FIN HERO --> 
<div class="row"  >
<div class="col-md-6" style=" display: flex;
  align-items: center;
  justify-content: center;
  margin-left: 40px;
  text-align : justify;">
<!-- <div class="row"  style=" display: flex;
  align-items: center;
  justify-content: center;"> -->
<section class="hero" >
<?php while(have_posts()): the_post(); ?>
<?php
    get_template_part('template-parts/loop','detalle');
?>
<?php endwhile; ?>
</section>
<!-- </div> -->
</div>
<div class="col-md-4" style=" display: flex;
  align-items: center;
  justify-content: center;">
<ul class="lista">
        <?php 
            $args = array(
                  //  'post_type' => 'gymfitness_clases',
                    'posts_per_page' =>10,   //-1 te trae todos
                    'orderby' => 'title',
                    'order' => 'DESC'
            );
            $clases = new WP_Query($args);
            while ($clases->have_posts() ): $clases -> the_post(); ?>
            <li >
            
            <div class="contenido">
            <table><tr><td>
            <?php the_post_thumbnail('thumbnail'); ?>
            <a href="<?php the_permalink(); ?>">
                <h3><?php the_title(); ?></h3>
                </a>
             </td>
            </tr>
            <td><?php the_content();?></td>
            </table>
            </div>
            </li>
        <?php endwhile; wp_reset_postdata(); ?>
   </ul> 

</div>
</div>

<?php get_footer();?>