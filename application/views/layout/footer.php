
	<div id="footer" class="footer navbar-fixed-bottom">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
				<?php
					$track = $this->agent->platform() . ' / ';
					$track .= $this->agent->browser() . '(';
					$track .= $this->agent->version() . ') / ';
					$track .= $this->input->ip_address() . ' / ';
					$track .= ' rendered in {elapsed_time} sec /';
					$track .= ' Memory Usage :{memory_usage} ';
					echo $track;
				 ?>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 text-right">
					 <span>Page Loaded <li class="fa fa-clock-o" id='tag_ora' ></li><?php echo date("H:i:s A");?>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>