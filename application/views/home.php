<?php
	echo '<div class="container">';
	echo '<h2>Computers List</h2>';
	echo '<table  class="table table-striped table-bordered" id="computers" name="computers"   style="width:100%">';
        echo '<thead class="bg-primary text-default">';
        echo "<th >Sno</th>";
        echo "<th >Comp Name</th>";
		echo "<th >Edak User Name</th>";
		echo "<th >Windows Username</th>";
		echo "<th >IP Adress</th>";
		echo "<th >Employee Name</th>";
		echo "<th >Designation</th>";
		echo "<th >Division</th>";
		echo "<th >Contact No</th>";
		echo '</thead>'; 
		$sn=1;
		foreach($computers as $computers)
			{
				echo "<tr>";
				echo "<td>" . $sn . "</td>";
				echo "<td>" . $computers['compname'] . "</td>";
				echo "<td>" . $computers['edakname'] . "</td>";
				echo "<td>" . substr($computers['contact'],0,strpos($computers['contact'] , '@')) . "</td>";
				echo "<td>" . $computers['remote_addr'] . "</td>";
				echo "<td>" . $computers['empname'] . "</td>";
				echo "<td>" . $computers['designation'] . "</td>";
				echo "<td>" . $computers['division'] . "</td>";
				echo "<td>" . $computers['mobile'] . "</td>";
				
				echo "</tr>";
				$sn++;
			}
		echo "</table>";
	echo "</div>";
	echo "</div>";
 ?>

