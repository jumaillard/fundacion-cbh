<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fundacioncbh
 */

?>

	<footer id="colophon" class="container-fluid py-3">
		<div class="row text-center">
			<div class="col-12">
				<span class="logo-footer"><?php the_custom_logo(); ?></span>
			</div>
			<div class="col-12">
				<a href="https://web.facebook.com/CallejerosBuscanHogar/?locale=es_LA&_rdc=1&_rdr" target="_blank"><i class="bi bi-facebook fs-1"></i></a>
				<a href="https://www.instagram.com/fundacioncbh/" target="_blank"><i class="bi bi-instagram fs-1 px-5"></i></a>
				<a href="https://www.tiktok.com/@fundacioncbh" target="_blank"><i class="bi bi-tiktok fs-1"></i></a>
			</div>
			<div class="col-12">
				<p class="fw-semibold">contacto@fundacioncbh.cl</p>
			</div>
			<div class="col-12">
				<p>Obtén información sobre la Ley de Tenencia Responsable de Mascotas y Animales de Compañía haciendo clic <a class="aqui" href="">aquí</a></p>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
