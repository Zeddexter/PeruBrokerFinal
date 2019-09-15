<!-- SECCION SERVICIOS -->
<section class="servicios" id="servicios" >
        <div class="content"><!-- INICIO-CONTENT -->

            <div class="row">
                <div class="col">
                <?php
                    $nav_menu_locations = get_nav_menu_locations();
                    $menu_id = absint($nav_menu_locations["menu-principal"]);
                    $menu_items = wp_get_nav_menu_items($menu_id);
                    if (!empty($menu_items)) {
                        echo "<h2>".$menu_items[2]->title."</h2>";
                    }
                ?>
                </div>
            </div>
                    <?php mostrar_servicios(); ?>
              
        </div><!-- FIN-CONTENT -->
</section>
<!-- FIN SERVICIOS -->