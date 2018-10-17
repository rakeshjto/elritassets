<?php
	echo '<div class="container">';
	include 'navbar.php';
	echo '<h2>' .$title. '</h2>';
	?>
	<table class="table table-condensed table-striped table-bordered">
    <thead>
      <tr>
        <th>SNo</th>
		<th>Asset Name</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <?php
	  //print_r($summary);
	  //<i class="material-icons" style="font-size:36px;color:white">laptop</i><i class="material-icons" style="font-size:36px;color:white">scanner</i><i class="material-icons" style="font-size:36px;color:white">router</i><i class="material-icons" style="font-size:36px;color:white">mouse</i><i class="material-icons" style="font-size:36px;color:white">keyboard</i>
	  $sn=1;
	  foreach($summary as $asset){
		echo "<tr>";
		echo "<td>" . $sn . "</td>";
		echo "<td>" . $asset['ASSET_NAME'] . "</td>";
		echo "<td><a href=".base_url()."Home/overview/".$asset['ASSET_NAME']."/STATUS target='_blank'>" . $asset['ASSET_CNT'] . "</a></td>";
		echo "</tr>";
		$sn++;
	  }
     ?>
		<tr>
			<td>5</td>
			<td>UPS</td>
			<td>10</td>
		</tr>
		<tr>
			<td>6</td>
			<td>SWITCHES</td>
			<td>10</td>
		</tr>
		<tr>
			<td>7</td>
			<td>ROUTERS</td>
			<td>10</td>
		</tr>
		<tr>
			<td>8</td>
			<td>MODEMS</td>
			<td>10</td>
		</tr>
    </tbody>
  </table>
	</div>


<!-- 
Computer, Laptops, Printers Icons

-->