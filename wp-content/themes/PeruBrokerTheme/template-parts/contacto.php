<!-- Contacto -->
<section class="contacto" id="contacto">
        <div class="content"><!-- INICIO-CONTENT -->
        <div class="row">
            <div class="col-12">
            <?php
                    $nav_menu_locations = get_nav_menu_locations();
                    $menu_id = absint($nav_menu_locations["menu-principal"]);
                    $menu_items = wp_get_nav_menu_items($menu_id);
                    if (!empty($menu_items)) {
                        echo "<h2>".$menu_items[5]->title."</h2>";
                    }
    
                ?>
            </div>
            <div class="col-12 col-lg-6 order-lg-2">
                <!-- <h3>Mapa</h3> -->
                    <!-- <div id="map" class="map"></div> -->
                    <?php mostrar_contacto_mapa(); ?>
                
            </div>
        
            <div class="col-12 col-lg-6 order-lg-1">
                <!-- FORMULARIO -->
                <?php mostrar_contacto_formulario(); ?>
                <!-- FORMULARIO -->

                <!-- <form class="wpcf7-form" action="">
                    <p>
                        <label for="">Nombres *</label>
                        <input type="text">
                    </p>

                    <p>
                        <label for="">Correo / telf *</label>
                        <input type="text">
                    </p>

                    <p>
                        <label for="">Empresa</label>
                        <input type="text">
                    </p>
                    
                    <p>
                        <label for="">Mensaje *</label>
                        <textarea name="" id=""></textarea>
                    </p>
                    <p>
                        <input type="submit" value="Enviar">
                    </p>
                </form> -->
            </div>
        </div>
        </div><!-- FIN-CONTENT -->
    </section>
<!-- Fin Contacto -->