<?php
function mostrar_imagen_principal(){ ?>
        <?php 
            $args = array(
                    'post_type' => 'broker-imagen',
                    'posts_per_page' => 1,
                    'orderby' => 'ID',
                    'order' => 'ASC'
            );  
            $clases = new WP_Query($args);
            while ($clases->have_posts() ): $clases -> the_post();
        ?>
            <?php the_post_thumbnail_url(); ?>
        <?php endwhile; wp_reset_postdata(); ?> 
<?php
}
?>

<?php
function mostrar_mensaje_principal(){ ?>
        <?php 
            $args = array(
                    'post_type' => 'broker-imagen',
                    'posts_per_page' => 1,
                    'orderby' => 'ID',
                    'order' => 'DESC'
            );  
            $clases = new WP_Query($args);
            while ($clases->have_posts() ): $clases -> the_post();
        ?>
            <?php the_content(); ?>
        <?php endwhile; wp_reset_postdata(); ?> 
<?php
}
?>


<?php /***   SECCION DE NOSOTROS   ***/ ?>
<?php
function broker_lista_titulos_secciones(){ ?>
        <?php 
            $args = array(
                    'post_type' => 'broker_seccion',
                    'posts_per_page' => -1,   //-1 te trae todos
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC'
            );
            $contador =0;
            $clases = new WP_Query($args);
            while ($clases->have_posts() ): $clases -> the_post();
            $contador +=1;
            ?>
            
            <li class="swiper-slide">
                <a href="#item<?php echo $contador;?>" >
                <?php the_title(); ?>
                </a>   
            </li>
        <?php endwhile; wp_reset_postdata(); ?> 
<?php
}
?>

<?php 
function broker_lista_contenido_secciones(){ ?>
    <?php 
            $args = array(
                    'post_type' => 'broker_seccion',
                    'posts_per_page' => -1,   //-1 te trae todos
                     'orderby' => 'meta_value_num',
                    'order' => 'ASC'
            );
            $contador =0;
            $clases = new WP_Query($args);
            while ($clases->have_posts() ): $clases -> the_post();
            $contador +=1;
            ?>
            <div id="item<?php echo $contador;?>" class="item ocultar">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-xl-9">
                        <?php the_content();?>  
                        </div>
                        <div class="col">
                            <figure>
                                <?php the_post_thumbnail('full'); ?>
                            </figure>
                        </div>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?> 
<?php
    }
?>

<?php
function mostrar_staff(){ ?>
        <?php 
            $args = array(
                    'post_type' => 'broker_Staff',
                    'posts_per_page' => -1,   //-1 te trae todos
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC'
            );
            
            $clases = new WP_Query($args);
            while ($clases->have_posts() ): $clases -> the_post();
           
            ?>
            
            <div class="item-staff swiper-slide">
                <figure class="img-staff">
                    <?php the_post_thumbnail('full'); ?>
                </figure>
                <p><?php the_field('nombre') ?></p>
                <span><?php the_field('puesto') ?></span>
            </div>
        <?php endwhile; wp_reset_postdata(); ?> 
<?php
}
?>

<?php /***   SECCION DE SERVICIOS   ***/ ?>


<?php 
function mostrar_servicios(){ ?>
    <?php 
            $args = array(
                    'post_type' => 'broker_servicios',
                    'posts_per_page' => -1,   //-1 te trae todos
                     'orderby' => 'meta_value_num',
                    'order' => 'ASC'
            );
           
            $clases = new WP_Query($args);
            while ($clases->have_posts() ): $clases -> the_post();
            
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_content();?>  </p>
                            
                    <figure class="productos">       
                    <img src="<?php the_field('imagen_1'); ?>" alt="">
                    <img src="<?php the_field('imagen_2'); ?>" alt="">
                    <img src="<?php the_field('imagen_3'); ?>" alt="">
                        
                    </figure>    
                </div>
            </div>     
        <?php endwhile; wp_reset_postdata(); ?> 
<?php
    }
?>


<?php 
function mostrar_clientes(){ ?>
    <?php 
            $args = array(
                    'post_type' => 'broker_clientes',
                    'posts_per_page' => -1,   //-1 te trae todos
                     'orderby' => 'meta_value_num',
                    'order' => 'ASC'
            );
           
            $clases = new WP_Query($args);
            while ($clases->have_posts() ): $clases -> the_post();
            
            ?>
            
            <div class="item-clientes swiper-slide">
                <figure class="img-staff">
                    <?php the_post_thumbnail('full'); ?>
                </figure>
                
                <p><?php the_title(); ?></p>
            </div>
        <?php endwhile; wp_reset_postdata(); ?> 
<?php
    }
?>

<?php 
function mostrar_mensaje_reportes(){ ?>
    <?php 
            $args = array(
                    'post_type' => 'seccion_reportes',
                    'posts_per_page' => 1,   //-1 te trae todos
                     'orderby' => 'meta_value_num',
                    'order' => 'ASC'
            );
           
            $clases = new WP_Query($args);
            while ($clases->have_posts() ): $clases -> the_post();
            
            ?>
            <?php the_content(); ?>
            
        <?php endwhile; wp_reset_postdata(); ?> 
<?php
    }
?>

<?php 
function mostrar_imagen_reportes(){ ?>
    <?php 
            $args = array(
                    'post_type' => 'seccion_reportes',
                    'posts_per_page' => 1,   //-1 te trae todos
                     'orderby' => 'meta_value_num',
                    'order' => 'ASC'
            );
           
            $clases = new WP_Query($args);
            while ($clases->have_posts() ): $clases -> the_post();
            
            ?>
            <?php the_post_thumbnail('full'); ?>
            
        <?php endwhile; wp_reset_postdata(); ?> 
<?php
    }
?>

<?php 
function mostrar_contacto_reportes(){ ?>
    <?php 
            $args = array(
                    'post_type' => 'seccion_reportes',
                    'posts_per_page' => 1,   //-1 te trae todos
                     'orderby' => 'meta_value_num',
                    'order' => 'DESC'
            );
           
            $clases = new WP_Query($args);
            while ($clases->have_posts() ): $clases -> the_post();
            
            ?>
            <?php the_content(); ?>
            
        <?php endwhile; wp_reset_postdata(); ?> 
<?php
    }
?>


<?php 
function mostrar_contacto_formulario(){ ?>
    <?php 
            $args = array(
                    'post_type' => 'broker_contacto',
                    'posts_per_page' => 1,
                    'orderby' => 'ID',
                    'order' => 'ASC'
            );
           
            $clases = new WP_Query($args);
            while ($clases->have_posts() ): $clases -> the_post();
            ?>
            <?php the_content(); ?>
        <?php endwhile; wp_reset_postdata(); ?> 
<?php
    }
?>

<?php 
function mostrar_contacto_mapa(){ ?>
    <?php 
            $args = array(
                    'post_type' => 'broker_contacto',
                    'posts_per_page' => 1,
                    'orderby' => 'ID',
                    'order' => 'DESC'
            );
           
            $clases = new WP_Query($args);
            while ($clases->have_posts() ): $clases -> the_post();
            ?>
            <div class="content-mapa">
                <?php the_content(); ?>
            </div>

            <div class="content-info">
                <p class="direccion" ><?php the_field('direccion');?></p>
                <p class="telefono"><?php the_field('telefono');?></p>
                <p class="correo"><?php the_field('correo');?></p>
                <p class="fax"><?php the_field('fax');?></p>
                <p class="facebook"><a href="<?php the_field('link_facebook');?>"><?php the_field('nombre_facebook');?></a></p>
            </div>
        <?php endwhile; wp_reset_postdata(); ?> 
<?php
    }
?>


