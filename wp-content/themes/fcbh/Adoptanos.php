<?php
/**
 * Template Name: Adoptanos
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fundacioncbh
 */

get_header();
?>

<main id="primary" class="site-main"><?php
// Obtén la cantidad de posts con ciertas categorías
$categorias_contador_adoptados = 'adoptado'; // Ajusta la categoría según tus necesidades
$categorias_contador_fundacion = 'fundacion'; // Ajusta la categoría según tus necesidades

// Contador para categoría "adoptado"
$args_contador_adoptados = array(
    'post_type' => 'animales',
    'tax_query' => array(
        array(
            'taxonomy' => 'categoria-animales',
            'field'    => 'slug',
            'terms'    => $categorias_contador_adoptados,
        ),
    ),
    'posts_per_page' => -1, // -1 para obtener todos los posts
);

$query_contador_adoptados = new WP_Query($args_contador_adoptados);
$total_posts_adoptados = $query_contador_adoptados->found_posts;

// Contador para categoría "fundacion"
$args_contador_fundacion = array(
    'post_type' => 'animales',
    'tax_query' => array(
        array(
            'taxonomy' => 'categoria-animales',
            'field'    => 'slug',
            'terms'    => $categorias_contador_fundacion,
        ),
    ),
    'posts_per_page' => -1, // -1 para obtener todos los posts
);

$query_contador_fundacion = new WP_Query($args_contador_fundacion);
$total_posts_fundacion = $query_contador_fundacion->found_posts;

// Restablece las consultas originales de WordPress
wp_reset_postdata();
?>

<section class="banner-adoptanos p-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2>Nuestra causa</h2>
                <p>Adopta un peludito y cambia vidas. Tu adopción no solo transforma la vida de tu mascota, sino también apoya nuestra misión de rescatar y cuidar a más animales necesitados.</p>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-around">
                <div class="caja-adoptanos">
                    <p class="contador"><?php echo esc_html($total_posts_fundacion); ?></p>
                    <p class="texto-caja-adoptanos">Animales rescatados</p>
                </div>
                <div class="caja-adoptanos">
                    <p class="contador"><?php echo esc_html($total_posts_adoptados); ?></p>
                    <p class="texto-caja-adoptanos">Animales en hogares definitivos</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Obtiene la información de la página actual
$current_page = get_queried_object();

// Inicializa el array para almacenar los enlaces
$links = array();

// Agrega el enlace a la página de inicio
$links[] = '<a href="' . esc_url(home_url('/')) . '" class="links_breadcrumb">Inicio</a>';

// Verifica si estás en una página
if (is_page()) {
    // Agrega el enlace a la página actual al array
    $links[] = '<a href="' . esc_url(get_permalink()) . '" class="links_breadcrumb fw-bold">' . esc_html($current_page->post_title) . '</a>';
}

// Verifica si estás en una categoría
elseif (is_category()) {
    // Obtiene la categoría actual
    $category = get_category(get_query_var('cat'));

    // Agrega el enlace a la categoría actual al array
    $links[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="links_breadcrumb">' . esc_html($category->name) . '</a>';
}

// Verifica si estás en una entrada individual
elseif (is_single()) {
    // Obtiene las categorías de la entrada
    $categories = get_the_category();

    if (!empty($categories)) {
        // Obtiene la primera categoría (puedes ajustar esto según tus necesidades)
        $category = $categories[0];

        // Agrega el enlace a la categoría de la entrada al array
        $links[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="links_breadcrumb">' . esc_html($category->name) . '</a>';
    }

    // Agrega el enlace a la entrada individual al array
    $links[] = '<a href="' . esc_url(get_permalink()) . '" class="links_breadcrumb">' . esc_html(get_the_title()) . '</a>';
}

// Muestra el elemento <p> con los enlaces
echo '<p class="fs-4 ms-5 mt-5">' . implode(' / ', $links) . '</p>';
?>
	<section class="container pt-5 navbar navbar-expand-lg">
			<div
				class="filtros-adoptanos d-flex justify-content-md-around justify-content-around pt-4 pb-3 m-md-auto m-auto">
				<ul class="navbar-nav">
					<li class="nav-item p-2 p-md-5">
						<a href="<?php echo esc_url(add_query_arg('categoria-animales', 'cachorro')); ?>"
							class="nav-link boton-filtro text-center text-white">
							<i class="fa-solid fa-dog pe-3" style="color: #ffffff;"></i>Cachorros
						</a>
					</li>
					<li class="nav-item p-2 p-md-5">
						<a href="<?php echo esc_url(add_query_arg('categoria-animales', 'perro')); ?>"
							class="nav-link boton-filtro text-center text-white">
							<i class="fa-solid fa-dog pe-3" style="color: #ffffff;"></i>Perros
						</a>
					</li>
					<li class="nav-item p-2 p-md-5">
						<a href="<?php echo esc_url(add_query_arg('categoria-animales', 'gato')); ?>"
							class="nav-link boton-filtro text-center text-white">
							<i class="fa-solid fa-cat pe-3" style="color: #ffffff;"></i>Gatos
						</a>
					</li>
					<?php if (isset($_GET['categoria-animales'])): ?>
						<li class="nav-item p-2 p-md-5"><a
								href="<?php echo esc_url(remove_query_arg('categoria-animales')); ?>"
								class="nav-link boton-filtro text-center text-white">Borrar Filtros</a></li>
					<?php endif; ?>
				</ul>
		</div>
	</section>
	<div class="container">
		<div class="row col-md-12 col-10 m-auto m-md-0">
			<?php include get_template_directory() . '/assets/modulos/modulo-animales/loop-animales.php'; ?>
		</div>
	</div>
	<section>
		<div class="container">
			<h3 class="text-center">Antes y después</h3>
			<p class="text-center">De la tristeza a la felicidad: echa un vistazo a cómo nuestras mascotas han
				transformado sus vidas desde que
				fueron rescatadas y adoptadas. Sus historias son un testimonio conmovedor de la importancia de darles
				una
				segunda oportunidad y el poder del amor y cuidado en su recuperación.</p>
		<div class="col-10 col-md-12 offset-2 offset-md-0">
		<?php include get_template_directory() . '/assets/modulos/modulo-antes-despues/loop-antes.php'; ?>
		</div>
		</div>
	</section>				

</main><!-- #main -->

<?php
get_footer();
