<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'ILS';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Contabilidad</title>


<?= $this->Html->meta(array(
	'charset' => "utf-8")
); 
?>

<?= $this->Html->meta(array(
	'http-equiv' => "X-UA-Compatible", 
	'content' => 'IE=edge')
); 
?>

<?= $this->Html->meta(
    'description',
    'Course Project'
);
?>
<?= $this->Html->meta(
    'viewport',
    'width=device-width, initial-scale=1'
);
?>




    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('fontawesome-all.css') ?>
    <?= $this->Html->css('news_styles.css') ?>
    <?= $this->Html->css('news_responsive.css') ?>

   	<?= $this->Html->script('jquery-3.2.1.min.js') ?>
	<?= $this->Html->script('popper.js') ?>
	<?= $this->Html->script('bootstrap.min.js') ?>
	<?= $this->Html->script('TweenMax.min.js') ?>
	<?= $this->Html->script('TimelineMax.min.js') ?>
	<?= $this->Html->script('ScrollMagic.min.js') ?>
	<?= $this->Html->script('animation.gsap.min.js') ?>
	<?= $this->Html->script('ScrollToPlugin.min.js') ?>
	<?= $this->Html->script('jquery.scrollTo.min.js') ?>
	<?= $this->Html->script('easing.js') ?>
	<?= $this->Html->script('news_custom.js') ?>

</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<?= $this->Html->image('logo.png', ['alt' => 'logo']) ?>
					<span> </span>
				</div>
			</div>

			<!-- Main Navigation -->
<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
						<li class="main_nav_item"><?php echo $this->Html->link(__('Inicio'), ['controller' => 'Pages','action' => 'index']) ?> </li>


						<li class="main_nav_item"><?php echo $this->Html->link(__('Quienes Somos'), ['controller' => 'Pages','action' => 'about']) ?></li>
						<li class="main_nav_item dropbtn"><a href="#">programas profesionales</a>
					    	<div class="dropdown-content">
					     		<?php echo $this->Html->link(__('Computacion e Informática'), ['controller' => 'Pages','action' => 'computacion']) ?>
					     		<?php echo $this->Html->link(__('Contabilidad'), ['controller' => 'Pages','action' => 'contabilidad']) ?>
					      		<?php echo $this->Html->link(__('Administración'), ['controller' => 'Pages','action' => 'administracion']) ?>
					    	</div>
						</li>

						
							<?php if (is_null($this->request->session()->read('Auth.User'))) { ?>
								<li class="main_nav_item">
								<?php echo $this->Html->link(__('Login'), ['controller' => 'Users','action' => 'login', '_full'=>true]); ?> </li>
							<?php
							}
							else { ?>
								<li class="main_nav_item">
								<?php echo $this->Html->link(__('Intranet'), ['controller' => 'Users','action' => 'view',$current_user['id'], '_full'=>true]); ?> </li>
							


								<li class="main_nav_item">
								<?php echo $this->Html->link($current_user['name'].' '.__('(Logout)'), ['controller' => 'Users','action' => 'logout', '_full'=>true]); ?> </li>
							<?php
							}
						?>
						
					</ul>
				</div>
			</nav>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			<?= $this->Html->image('phone-call.svg', ['alt' => 'logo']) ?>
			<span>+(054)211-936</span>
		</div>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas trans_200">Menu</i>
		</div>

	</header>
	
		<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><?php echo $this->Html->link(__('Inicio'), ['controller' => 'Pages','action' => 'index']) ?></li>
					<li class="menu_item menu_mm"><?php echo $this->Html->link(__('Quienes Somos'), ['controller' => 'Pages','action' => 'about']) ?></li>
					<li class="menu_item menu_mm"><a href="#">Programas Profesionales</a></li>
					<li class="menu_item menu_mm"><?php echo $this->Html->link(__('Computacion e Informática'), ['controller' => 'Pages','action' => 'computacion']) ?></li>
					<li class="menu_item menu_mm"><?php echo $this->Html->link(__('Contabilidad'), ['controller' => 'Pages','action' => 'contabilidad']) ?></li>
					<li class="menu_item menu_mm"><?php echo $this->Html->link(__('Administración'), ['controller' => 'Pages','action' => 'administracion']) ?></li>

					<?php if (is_null($this->request->session()->read('Auth.User'))) { ?>
						<li class="menu_item menu_mm">
						<?php echo $this->Html->link(__('Login'), ['controller' => 'Users','action' => 'login', '_full'=>true]); ?> </li>
					<?php
					}
					else { ?>
						<li class="menu_item menu_mm">
						<?php echo $this->Html->link(__('Intranet'), ['controller' => 'Users','action' => 'view', $current_user['id'],  '_full'=>true]); ?> </li>

						<li class="menu_item menu_mm">
						<?php echo $this->Html->link($current_user['name'].' '.__('(Logout)'), ['controller' => 'Users','action' => 'logout', '_full'=>true]); ?> </li>
					<?php
					}
					?>
				</ul>

				<div class="menu_copyright menu_mm">
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | ILS <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://www.youtube.com/SkyFk" target="_blank">Fk</a>
				</div>
			</div>

		</div>

	</div>
	<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(<?php echo $this->Url->image('news_background.jpg') ?>)"></div>
		</div>
		<div class="home_content">
			<h1>CONTABILIDAD</h1>
		</div>
	</div>

	<!-- News -->


	<div class="news">
		<div class="container">
			<div class="news_post_text">
				<h3>Contabilidad es la ciencia social que se encarga de estudiar, medir, analizar y registrar el patrimonio de las organizaciones, empresas e individuos, con el fin de servir en la toma de decisiones y control, presentando la información, previamente registrada, de manera sistemática y útil para las distintas partes interesadas.</h3>
			</div>
		</div>
	</div>

	<div class="news">
		<div class="container">
			<div class="row">
				
				<!-- News Column -->

				<div class="col">
					
					<div class="news_posts">
						<!-- News Post -->
						<div class="news_post">
							<div class="news_post_image">
								<?= $this->Html->image('c111.jpg', ['alt' => 'logo']) ?>
							</div>
							<div class="news_post_top d-flex flex-column flex-sm-row">

								<div class="news_post_title_container">
									
										<div class="elements_title">¿POR QUE ESTUDIAR CONTABILIDAD Y FINANZAS EN ILS?</div>
									

								</div>
							</div>
							<div class="news_post_text">
								<h4>FORMACIÓN INTEGRAL</h4>

								 <p>Cursos especializados de carrera desde el primer ciclo con enseñanza práctica y certificaciones modulares y progresivas, que te permitirá trabajar desde los primeros ciclos.</p>

								<h4>CARRERA ACREDITADA</h4>

								<p>Carrera de Contabilidad acreditada en calidad académica por Sineace.</p>

								<h4>CONTINUIDAD UNIVERSITARIA</h4>

								<p>Podrás convalidar y continuar tu carrera en las universidades más prestigiosas del país y del extranjero. Además podrás realizar intercambios estudiantiles con instituciones de otros países.</p>

								<h4>SIMULADORES ESPECIALIZADOS</h4>

								<p>Contamos con simuladores empresariales como MixPro, BandPro y Concar para el desarrollo de proyectos de negocio, análisis de información y toma de decisiones.</p>

								<h4>CENTRO DE EMPRENDIMIENTO E INNOVACIÓN</h4>

								<p>Programa que permite recibir capacitación, asesoría y mentoría con expertos para que puedas validar y llevar al mercado empresarial tus proyectos.</p>

								<h4>CURSOS ESPECIALIZADOS</h4>

								<p>Cursos especializados de carrera desde el primer ciclo con enseñanza práctica y certificaciones modulares y progresivas, que te permitirán trabajar desde los primeros ciclos.</p>

								<h4>CONVENIOS LABORALES</h4>

								<p>Convenios laborales con empresas públicas y privadas del país que te permiten acceder a prácticas pre profesionales desde los primeros ciclos, logrando un mayor número de horas prácticas para tu titulación profesional.</p>

								<h4>DESCUENTOS</h4>

								<p>Podrás acceder al descuento de 50% para el programa del idioma inglés en nuestro Centro de Idiomas.</p>
							</div>

						</div>

						<!-- News Post -->
						<div class="news_post">
							<div class="news_post_image">
								<?= $this->Html->image('c222.jpg', ['alt' => 'logo']) ?>
							</div>
							<div class="news_post_top d-flex flex-column flex-sm-row">

								<div class="news_post_title_container">
									
										<div class="elements_title">TÍTULOS Y CERTIFICACIONES</div>
									

								</div>
							</div>
							<div class="news_post_text">
								<h4>TITULO A NOMBRE DE LA NACIÓN</h4>

								 <p>Profesional Técnico en Administración de Empresas.</p>



								<h4>CERTIFICACIONES MODULARES</h4>
								<h4><h4>MODULO I.</h4>

								    <p>Gestor Contable Administrativo.</p>

								<h4>MODULO II.</h4>

								    <p>Gestor Informativo Contable.</p>

								<h4>MODULO III.</h4>

								    <p>Analista Contable.</p>
							</div>
							



						</div>

						
					</div>



				</div>

				<!-- Sidebar Column -->

				<div class="col">

					<div class="news_posts">
						<!-- News Post -->
						<div class="news_post">
							
							<div class="news_post_top d-flex flex-column flex-sm-row">

								<div class="news_post_title_container">
									
										<div class="elements_title">PERFIL COMO ALUMNO</div>
									

								</div>
							</div>
							<div class="news_post_text">
								
								

			    				<p>Como profesional de Contabilidad de ILS, obtendrás las herramientas necesarias para ser innovador, con capacidad de analizar, investigar, y organizar las actividades contables, financieras y tributarias de las empresas que sirven para la toma de decisiones. Estarás en la capacidad de conocer y comprender el área de contabilidad y finanzas en entornos legales y económicos, registrarás movimientos de ingresos y egresos de acuerdo a las normas y políticas organizacionales.</p>
		    					<p>Recibirás una formación integral con visión de negocio y estarás capacitado para dirigir de manera eficiente cualquier organización con responsabilidad y ética profesional.</p>
		    					<p>Como Contador de ILS, serás emprendedor, con la capacidad de desempeñarte en cualquier organización así como formar tu propia empresa. Te desenvolverás eficazmente y te será fácil trabajar en equipo, tomando en cuenta la importancia del servicio al cliente.</p>
							</div>

						</div>

						<!-- News Post -->
						<div class="news_post">
							<div class="news_post_image">
								<?= $this->Html->image('c333.jpg', ['alt' => 'logo']) ?>
							</div>

							<div class="news_post_text">
									<h4>Podrás trabajar en:</h4>

	   		 						<p>Empresas del sector público y privado, entidades bancarias y financieras, pymes, cajas, empresas internacionales, organizaciones no gubernamentales (ONGs), asociaciones civiles, instituciones educativas, empresas de asesoría y consultoría empresarial, comerciales e industriales, seguros, telefonía, entre otras.</p>

									<h4>Puestos de trabajo en las áreas de:</h4>

	    								<p>Administración, finanzas, control y presupuesto, servicios bancarios, servicios financieros, créditos y cobranzas, recuperaciones, inteligencia comercial, facturación, compensaciones, logística, tesorería.</p>
	    								
	    								<p>Gestión de tu propia empresa.</p>


	    					</div>
						</div>

						<!-- News Post -->
						<div class="news_post">
							<div class="news_post_image">
								<?= $this->Html->image('c444.jpg', ['alt' => 'logo']) ?>
							</div>

							<div class="news_post_top d-flex flex-column flex-sm-row">

								<div class="news_post_title_container">
									<div class="elements_title">CONVENIOS INSTITUCIONALES</div>
								</div>
							</div>								
							<div class="news_post_text">
									

	   		 						<p>UTP Arequipa
										<p>Universidad Científica del Sur
										<p>Universidad Privada Sise

							</div>


						</div>

						<div class="news_post">
							<div class="news_post_image">
								<?= $this->Html->image('c555.jpg', ['alt' => 'logo']) ?>
							</div>	
						</div>	
					</div>

				</div>
					
			</div>
		</div>
	</div>

		<!-- Footer -->

<footer class="footer">
		<div class="container">
			
			<!-- Newsletter -->

			<div class="newsletter">
				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>Suscríbete a nuestro Newsletter</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col text-center">
						<div class="newsletter_form_container mx-auto">
							<form action="post">
								<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
									<input id="newsletter_email" class="newsletter_email" type="email" placeholder="Email" required="required" data-error="Valid email is required.">
									<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Subscribete</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>

			<!-- Footer Content -->

			<div class="footer_content">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-3 footer_col">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<?= $this->Html->image('logo.png') ?>
								<span> </span>
							</div>
						</div>

						<p class="footer_about_text"></p>

					</div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Menu</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><?php echo $this->Html->link(__('Inicio'), ['controller' => 'Pages','action' => 'index']) ?></li>
								<li class="footer_list_item"><?php echo $this->Html->link(__('Quienes Somos'), ['controller' => 'Pages','action' => 'about']) ?></li>
								<li class="footer_list_item"><?php echo $this->Html->link(__('Intranet'), ['controller' => 'Users','action' => 'view', $current_user['id'], '_full'=>true]); ?></li>

							</ul>
						</div>
					</div>

					<!-- Footer Column - Usefull Links -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Programas Profesionales</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_list_item"><?php echo $this->Html->link(__('Computacion e Informática'), ['controller' => 'Pages','action' => 'computacion']) ?></li>
								<li class="footer_list_item"><?php echo $this->Html->link(__('Contabilidad'), ['controller' => 'Pages','action' => 'contabilidad']) ?></li>
								<li class="footer_list_item"><?php echo $this->Html->link(__('Administración'), ['controller' => 'Pages','action' => 'administracion']) ?></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column - Contact -->

					<div class="col-lg-3 footer_col">
						<div class="footer_column_title">Contacto</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<?= $this->Html->image('placeholder.svg') ?>
									</div>
									Av. Independencia 339
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<?= $this->Html->image('smartphone.svg') ?>
									</div>
									(054)211-936
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<?= $this->Html->image('envelope.svg') ?>
									</div>
									informes@ils.edu.pe
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<!-- Footer Copyright -->

			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<div class="footer_copyright">
					<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | ILS <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://www.youtube.com/SkyFk" target="_blank">Fk</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
				</div>
				<div class="footer_social ml-sm-auto">
					<ul class="menu_social">
						<li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item"><a href="https://www.facebook.com/pg/SiseArequipa"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>
			</div>

		</div>
	</footer>

</div>


</body>
</html>