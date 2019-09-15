<!-- SECCIÓN CLIENTES -->
<section class="clientes" id="clientes">
        <div class="content"><!-- INICIO-CONTENT -->
        <div class="row">
            <div class="col">
            <?php
                    $nav_menu_locations = get_nav_menu_locations();
                    $menu_id = absint($nav_menu_locations["menu-principal"]);
                    $menu_items = wp_get_nav_menu_items($menu_id);
                    if (!empty($menu_items)) {
                        echo "<h2>".$menu_items[3]->title."</h2>";
                    }
                ?>
                <div class="content-item-clientes swiper-container">
                        <div class="swiper-wrapper">
                            <?php mostrar_clientes(); ?>
                        </div>
                </div>
            </div>
        </div> 
        </div>
    </section>
<!-- FIN SECCIÓN CLIENTES -->