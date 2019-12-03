<!-- FOOTER -->
<footer>
        <div class="row">
            <div class="col">
                    <!-- <div class="copy">
                        <p>Copyright <?php echo date("Y") ?></p>
                    </div>
                    <div class="create">
                        <p>create by <a href="https://www.facebook.com/cyberzsoft/" target="_blan">CyberzSoft</a></p>
                    </div> -->
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
                <?php //the_content(); ?>
            </div>
            <div class="row">
            <div class="col-md-6">
                <div class="content-info">
                    <p class="direccion" ><?php the_field('direccion');?></p>
                    <p class="telefono"><?php the_field('telefono');?></p>
                    <p class="correo"><?php the_field('correo');?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-info">
                    <p class="fax"><?php the_field('fax');?></p>
                    <p class="facebook"><a href="<?php the_field('link_facebook');?>"><?php the_field('nombre_facebook');?></a></p>
                </div>
            </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?> 
            </div>
        </div>
        <br><br> <br>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>