<!-- Sección NOSOTROS -->
<section class="nosotros" id="nosotros">
        <div class="content" ><!-- INICIO-CONTENT -->
                <div class="row">
                    <div class="col">
                    <?php
                        $nav_menu_locations = get_nav_menu_locations();
                        $menu_id = absint($nav_menu_locations["menu-principal"]);
                        $menu_items = wp_get_nav_menu_items($menu_id);
                        if (!empty($menu_items)) {
                            echo "<h2>".$menu_items[1]->title."</h2>";
                        }
                    ?>
                        <!-- <h2>Nosotros</h2> -->
                    </div>
                </div>
            <div class="row" data-aos="zoom-in" data-aos-duration="1000">
                <div class="col-sm-12">
                    <div class="swiper-container tabs-buttons">
                        <ul class="swiper-wrapper">
                            <?php broker_lista_titulos_secciones(); ?>
                        </ul>
                    </div>
                      
                    <div class="tabs-content">
                        <div class=" contenido-item">
                            <?php broker_lista_contenido_secciones(); ?>
                        </div>
                    </div> 
                   
                </div>
            </div>
            <?php 
                        $args = array(
                                'post_type' => 'broker_seccion',
                                'posts_per_page' => -1,   //-1 te trae todos
                                'orderby' => 'meta_value_num',
                                'order' => 'ASC'
                        );
                        //$contador =0;
                        $clases = new WP_Query($args);
                        while ($clases->have_posts() ): $clases -> the_post();
                        //$contador +=1;
                        ?>      
                         <figure class="resumen">       
                        <img src="<?php 
                        //the_field('imagen_1');
                        $attachment_id = get_field('img_001');
                        $size = "medium"; // (thumbnail, medium, large, full or custom size)
                        $image = wp_get_attachment_image_src( $attachment_id, $size );
                        echo $image[0];
                        ?>" alt="">
                        <img src="<?php 
                        //the_field('imagen_2');
                        $attachment_id = get_field('img_002');
                        $size = "medium"; // (thumbnail, medium, large, full or custom size)
                        $image = wp_get_attachment_image_src( $attachment_id, $size );
                        echo $image[0];
                        ?>" alt="">
                    </figure>
                <!-- </div>
           </div> -->
        <?php endwhile; wp_reset_postdata(); ?> 


        </div><!-- FIN-CONTENT -->
    </section>
<!-- FIN Sección NOSOTROS -->   

