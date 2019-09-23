
<div class="hero">
<h1><?php the_title();?></h1>
        <div class="contenido-hero">
            <?php the_post_thumbnail('thumbnail'); ?>
        </div>
   </div>
       <div class="seccion contenedor">
    <main class="contenido-principal">
        <?php the_content();?>
    </main>
</div>



