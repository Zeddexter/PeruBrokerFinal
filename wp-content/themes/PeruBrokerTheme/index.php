
<?php get_header(); ?>
<!-- HERO -->
<div class="row">
        <div class="col">
            <section class="hero">
                
                <div class="img-hero" style= "background-image: url(<?php mostrar_imagen_principal(); ?>)">
                    <!-- <video src="img/portada 1 animación.mp4" autoplay loop type="video/mp4" poster="img/portada_1.jpg" ></video>  -->
                </div>

                <div class="idioma">
                    <?php if ( function_exists ( 'wpm_language_switcher' ) ) wpm_language_switcher (); ?>
                </div>

                <div class="mensaje-principal">
                    <?php mostrar_mensaje_principal(); ?>
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

<?php get_template_part('template-parts/nosotros');?>
<?php //get_template_part('template-parts/staff');?>
<?php get_template_part('template-parts/servicios');?>
<?php get_template_part('template-parts/productos');?>
<?php //get_template_part('template-parts/clientes');?>
<?php get_template_part('template-parts/reportes');?>



<section class="noticias">
    <div class="content">
        <div class="row">
            <div class="col-12">
            <?php 
                if (wpm_get_language() == 'en')
                { 
                    echo " <h2>News</h2>";
                }
                else
                {
                    echo " <h2>Noticias</h2>";
                }
            ?>
               
            </div>
        </div>
        <div class="row">
                <?php
                while(have_posts()): the_post(); ?>
            
                <?php
                get_template_part('template-parts/loop','contenido');
                ?> 
            
                <?php endwhile; ?>
        </div> 
    </div>
</section>


<?php get_template_part('template-parts/contacto');?>  
          
<?php get_footer();?>