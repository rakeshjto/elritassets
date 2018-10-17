<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php echo $title; ?></title>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/edak.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.2.0.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>


		<?php 
			if( isset($scripts) ){
				foreach ($scripts as $script) {
					echo '<script type="text/javascript" src="'. base_url() . 'assets/js/'. $script .'.js"></script>';
				}
			}

		 ?>

	</head>

	<body>

