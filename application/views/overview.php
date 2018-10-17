<?php
	echo '<div class="container" id="show">';
	include 'navbar.php';
	echo '<h2>' .$title. '</h2>';
	//print_r($get_overview);
	?>
	<div class="form-group">
	  <label for="sel1">Select Dropdown:</label>
	  <select class="form-control" id="sel1">
		<option value='#'>Select Dropdown</option>
		<option value='Status'>Status Wise</option>
		<option value='Serial'>Series Wise</option>
		<option value='Make'>Make Wise</option>
		<option value='OSV'>OS Version Wise</option>
		<option value='X86_64'>OS Architecture Wise</option>
		<option value='Edak_User'>Edak User Wise</option>		
		<option value='Location'>Location Wise</option>
		<option value='Ass_HRNo'>Assets Vs Users in a Division</option>
		<option value='FI_ITM'>Router Vs Fusion MAC Comparision</option>
		<option value='FI_ITM'>FI Vs IT_Master Data</option>
		<option value='FI_ITM'>FI Vs Belarc Data</option>
	  </select>
	</div>
	<div class="row">
		<div class="col-md-2">
		<table class="table table-striped table-bordered table-hover table-condensed">
			<thead>
			  <tr>
				<th>Sno</th>
				<th>
				<?php echo $report_item. "</th>"; 
				if($report_item=="Edak_User"){
					echo "<th>Incharge Name</th>";	
					} 	
				?>
				<th>Total</th>
			  </tr>
			</thead>
			<tbody>
			<?php 
			  $sn=1;
			  $cnt=0;
			  foreach($get_overview as $overview)
			  {
				echo "<tr>";
					echo "<td>" .$sn. "</td>";
					echo "<td>" .$overview['report_item']. "</td>";
					if($report_item=="Edak_User"){
					echo "<td>" .$overview['incharge_name']. "</td>";	
					} 					
					echo "<td>" .$overview['CNT']. "</td>";
				echo "</tr>";
				$sn++;
				$cnt= $cnt+$overview['CNT'];
				}
				echo "<tfoot><tr>";
				if($report_item=="Edak_User"){
					echo "<th colspan='3'>Total</th>";
				}
				else{
					echo "<th colspan='2'>Total</th>";
				}
					echo "<th>" .$cnt. "</th>"; 
				echo "</tfoot></tr>";
					?>
			</tbody>
		</table>	
	</div>
	</div>

<!--
AJAX PLEASE WAIT PICTURE
-->