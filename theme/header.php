<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title><?php wp_title(); ?></title>
	<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="<?php echo get_stylesheet_uri(); ?>" type="text/css" rel="stylesheet">
	<?php wp_head(); ?>
    <script src="http://localhost:35729/livereload.js"></script>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<header class="site-header">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<h1 class="logo">
							<a href="<?php echo home_url(); ?>">
								<img src="" alt="">
							</a>
						</h1>
					</div>
					<div class="col-sm-10">
						<nav>
							<?php wp_nav_menu(array('container' => '')); ?>
						</nav>
					</div>
				</div>
			</div>
		</header>