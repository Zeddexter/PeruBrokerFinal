<!--IMPRIMO LA NOTICIA PRINCIPAL -->
<h2><?php the_title();?></h2>
    <div class="img-page-noticia">
        <?php the_post_thumbnail('large'); ?>
    </div>
    
    <div class="contenido-principal-page-noticia">
        <?php the_content();?>
    </div>






