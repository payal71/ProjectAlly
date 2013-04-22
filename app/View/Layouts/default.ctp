<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<?php echo $this->Html->charset(); ?>

<?php echo $this->Html->meta(array('name' => 'X-UA-Compatible', 'content' => 'IE=edge,chrome=1')); ?>

<title><?php echo $title_for_layout; ?></title>

<?php echo $this->Html->meta('keywords',''); ?>
<?php echo $this->Html->meta('description',''); ?>
<?php echo $this->Html->meta(array('name' => 'author', 'content' => 'Hardik Shah')); ?>
<?php echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width')); ?>
<?php echo $this->Html->css('bootstrap.min.css'); ?>
<?php echo $this->Html->css('boot-business.css'); ?>
<?php echo $this->Html->css('font-awesome.css'); ?>
<?php echo $this->Html->css('font-awesome-ie7.css'); ?>
<?php echo $this->Html->css('bootstrap-responsive.min.css'); ?>
<?php echo $this->Html->css('style.css'); ?>
<?php echo $this->Html->css('bootstap-combined-min.css'); ?>
<?php echo $this->Html->script('libs/modernizr-2.5.3-respond-1.1.0.min'); ?>

  <link rel="stylesheet" href="http://blueimp.github.com/Bootstrap-Image-Gallery/css/bootstrap-image-gallery.min.css">
  <link rel="stylesheet" href="<?php echo Router::url('/', true) ?>file_upload/css/jquery.fileupload-ui.css">


<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>
    
</head>
<body>
	<header>
		<?php 
			echo $this->element('home/header'); 
		?>
	</header>

		<div class="content">
			<div class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	<footer>
		<?php 
			echo $this->element('home/footer');			
		?>
	</footer>


<?php echo $this->Html->script(array('libs/bootstrap/bootstrap.min','plugins','script','libs/bootstrap/boot-business')); ?>
<?php echo $this->fetch('script'); ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo Configure::read('ga');?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>