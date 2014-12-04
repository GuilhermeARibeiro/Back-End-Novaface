<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-11-28 22:27:26
         compiled from "/var/www/ccrdesenhos2/view/home/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22453583454790afee6e691-67676232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '510090f0eff9131e310d3230e3d79cb76541113a' => 
    array (
      0 => '/var/www/ccrdesenhos2/view/home/index.tpl',
      1 => 1417220843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22453583454790afee6e691-67676232',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54790aff0055f3_33024035',
  'variables' => 
  array (
    'titulo' => 0,
    'HTTP' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54790aff0055f3_33024035')) {function content_54790aff0055f3_33024035($_smarty_tpl) {?><?php echo header('Content-Type: text/html; charset=utf-8');?>

<html>
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>
<link href="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<?php echo '<script'; ?>
 type='text/javascript' src="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/js/jquery-2.0.3.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/js/ajax.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/js/wiki.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/js/ie10-viewport-bug-workaround.js"><?php echo '</script'; ?>
>

<link href="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/css/justified-nav.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/js/ie-emulation-modes-warning.js"><?php echo '</script'; ?>
>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <?php echo '<script'; ?>
 src="js/html5shiv.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="js/respond.js"><?php echo '</script'; ?>
>
<![endif]-->

</head>
<body>

    <div class="container">
    <div class="login"><button class="btn btn-primary"><span class="glyphicon glyphicon-user"> Login</span></button></div>
      <div class="masthead">
        <h3 class="text-muted">CCR Desenhos</h3>

        <div role="navigation">
          <ul class="nav nav-justified">
            <li class="active"><a href="index.php?classe=Home&metodo=index">Home</a></li>
            <li><a href="galeria.php">Galeria</a></li>
            <li><a href="#">Contato</a></li>
            <li><a href="#">Trabalhe Conosco</a></li>
            <li><a href="#">Sobre</a></li>
          </ul>
        </div>
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Faça seu pedido!</h1>
        <p class="lead">É facil e rapido .</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Cadastre-se ja !</a></p>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Ultimos <span class="text-muted">Desenhos.</span></h2>
          <p class="lead">Ichigo do desenho Bleach.</p>
          <p><a class="btn btn-primary" href="#" role="button">Ver Desenhos »</a></p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" alt="500x500" src="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/imagens/fundo0.jpg" data-holder-rendered="true">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive" alt="500x500" src="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/imagens/fundo4.jpg" data-holder-rendered="true">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          <p><a class="btn btn-primary" href="#" role="button">Ver Retratos 3D »</a></p>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          <p><a class="btn btn-primary" href="#" role="button">Ver Retratos »</a></p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" alt="500x500" src="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/imagens/fundo10.jpg" data-holder-rendered="true">
        </div>
      </div>

      <!-- Example row of columns -->
     <!--  <div class="row" >
        <div class="col-lg-4">
          <h2>Desenhos 3D!</h2>
          <p class="text-danger">Desenho 3D.</p>
          <p>Pode ser feito um retrato 3D com qualquer foto. </p>
          <p><a class="btn btn-primary" href="#" role="button">Ver Desenhos 3D »</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Retratos</h2>
          <p>Aceitamos pedidos de retratos.</p>
          <p><a class="btn btn-primary" href="#" role="button">Ver Retratos »</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Paisagens</h2>
          <p>Paisagens de diversos lugares.</p>
          <p><a class="btn btn-primary" href="#" role="button">Ver Paisagens »</a></p>
        </div>
      </div> -->

      <!-- Site footer -->
      <footer class="footer">
       <a href="http://facebook.com" class="btn btn-social-icon btn-facebook">
    <i class="fa fa-facebook"></i></a>
    <a class="btn btn-social-icon btn-flickr"><i class="fa fa-flickr"></i></a>
    <a class="btn btn-social-icon btn-foursquare"><i class="fa fa-foursquare"></i></a>
    <a class="btn btn-social-icon btn-google-plus"><i class="fa fa-google-plus"></i></a>
    <a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
    <a class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
    <a class="btn btn-social-icon btn-tumblr"><i class="fa fa-tumblr"></i></a>
    <a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
        <p class="text-center">© CCR DESENHOS 2014</p>
        <a href="#" class="back-to-top"><p class="text-right"><button class="btn btn-primary"><span class="glyphicon glyphicon-chevron-up"></span></button></p></a>
      </footer>

    </div> <!-- /container --> 
</body>
</html><?php }} ?>
