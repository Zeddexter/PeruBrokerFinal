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
        </div><!-- FIN-CONTENT -->
    </section>
<!-- FIN Sección NOSOTROS -->   

