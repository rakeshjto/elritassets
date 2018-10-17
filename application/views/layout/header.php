<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	if( $this->agent->browser() == 'Internet Explorer' && $this->agent->version() < 10  ) {
		redirect(base_url() . 'home/ie/');
	}
?>
   
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel='icon' type='image/gif' href="<?php echo base_url(); ?>assets/img/computer.jpg">
		<title><?php echo $title; ?></title>
			
			<!--Jquery -->
			<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.0.min.js"></script>

			<!--Data Tables -->
			<script src="<?php echo base_url(); ?>assets/DataTables/media/js/jquery.dataTables.min.js"></script> 
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/media/jquery.dataTables.min.css" />
			
			<!--w3.css  -->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/w3.css" />
			
			<!--Bootstrap -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />

			<!--Font-Awesome -->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
			
			<!--Google Icons -->
			<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

			<!--jQUERY UI -->
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css" />

			<!--Custom CSS-->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap_custom.css" />
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css" />

			<script src="<?php echo base_url(); ?>assets/js/hover_dropdown.js"></script>

			
			<!--Dynamic CSS & JS-->
			<?php 
			if( isset($styles) ){ //Check Whether $styles is set in the Calling Controller
				foreach ($styles as $style) {
					echo '<link rel="stylesheet" type="text/css" href="'. base_url().'assets/css/'.$style.'.css" />'; // To add a Corresponding Style Sheet as per the Calling Controller For Eg:jquery.tagit in act method under Letter.php Controller
				}
			}

		 	?>
				 <script type="text/javascript">
				 	var base_url = <?php echo '"'.base_url().'";'; ?>
				 </script>

				<?php 
					if( isset($scripts) ){
						foreach ($scripts as $script) {
							echo '<script type="text/javascript" src="'. base_url() . 'assets/js/'. $script .'.js"></script>';
						}
					}

				 ?>		
 </head>
 <body>

