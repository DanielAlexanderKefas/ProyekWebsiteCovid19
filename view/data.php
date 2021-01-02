<div class="w3-top">
    <div class="w3-bar w3-white w3-padding w3-card">
        <a href="#home" class="w3-bar-item w3-button w3-hover-white"><img src="view/img/logo.png" class="logo"></a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="home" class="w3-bar-item w3-button">HOME</a>
            <a href="data" class="w3-bar-item w3-button active w3-text-blue">DATA</a>
        </div>
    </div>
</div>

<div class="w3-content w3-padding" style="max-width: 1495px; margin-top: 6px;">
    <div class="w3-container" id="dataAll">
        <div class="w3-center w3-xxlarge w3-border-bottom" style="width: 1300px; margin: auto">
            <h2 style="font-weight: 700;">Overall Cases</h2>
        </div>

        <div class="w3-container" style="width: 1300px; margin:auto;">
            <div class="w3-row">
                <div class="w3-cell-row w3-blue w3-card-4 w3-text-white w3-round-large w3-margin-top w3-margin-bottom">
                    <div class="w3-cell w3-container w3-cell-middle">
                        <p class="w3-large tag" style="font-weight: 500; margin: 0;">Total Confirmed</p>
                        <p class="w3-large tag" style="font-weight: 500; margin: 0;">Last Update : <b><?php echo $count->getDate(); ?></b> </p>
                    </div>
                    <div class="w3-cell w3-container w3-cell-middle">
                        <p class="w3-xxlarge w3-right" style="margin-top: 20px; margin-bottom: 20px;"><?php echo $count->getAll(); ?></p>
                    </div>
                </div>

                <div class="w3-teal 13 m6 w3-card-4 w3-third w3-round-large" style="width: 412px; margin-right: 15px">
                    <div class="w3-cell-middle w3-container w3-padding">
                        <p class="w3-large w3-center" style="font-weight: 500; margin: 0;">Recovered</p>
                        <p class="w3-xxlarge w3-center" style="margin: 0;"><?php echo $count->getRecovered(); ?></p>
                    </div>
                </div>

                <div class="w3-flat-belize-hole 13 m6 w3-card-4 w3-third w3-round-large" style="width: 412px; margin-right: 15px">
                    <div class="w3-cell-middle w3-container w3-padding">
                        <p class="w3-large w3-center" style="font-weight: 500; margin: 0;">Active</p>
                        <p class="w3-xxlarge w3-center" style="margin: 0;"><?php echo $count->getActive(); ?></p>
                    </div>
                </div>

                <div class="w3-dark-grey 13 m6 w3-card-4 w3-third w3-round-large" style="width: 412px;">
                    <div class="w3-cell-middle w3-container w3-padding">
                        <p class="w3-large w3-center" style="font-weight: 500; margin: 0;">Death</p>
                        <p class="w3-xxlarge w3-center" style="margin: 0;"><?php echo $count->getDeath(); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w3-container w3-margin-top" id="stats" style="width: 1300px; margin: auto">

        <div class="w3-center w3-xxlarge w3-border-bottom">
            <h2 style="font-weight: 700;">Statistics</h2>
        </div>

		<div class="w3-container w3-center" style="width: 700px; margin: auto; margin-top: 16px">
			<form method="POST" action="data-filter" id="form-filter">
				<select name="province" id="form-filter" style="height: 28px; margin-right: 16px">
					<?php
						foreach ($provinces as $key => $row) {
							echo "<option value=".strtolower($row -> getProvince()).">".$row -> getProvince()."</option>";
						}
					?>
				</select>
				<input type="date" name="start-date" value="<?php echo $firstCase; ?>" min="<?php echo $firstCase; ?>" style="height: 28px; margin-right: 16px">
				<input type="date" name="end-date" value="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>" style="height: 28px; margin-right: 16px">
				<input type="submit" name="filter" value="Filter" class="w3-flat-belize-hole w3-border-0" style="height: 28px">
			</form>
		</div>
		
		<div class="w3-container w3-center">
			<canvas id="canvas" style="max-width: 1300px; height: 500px; margin: auto"></canvas>
		</div>
		

        <div class="w3-container" style="margin-top: 32px; margin-bottom: 24px">
            <table class="w3-table w3-bordered" style="width: 1000px; margin: auto">
				<tr>
					<th>Province</th>
					<th class="w3-center">Confirmed</th>
					<th class="w3-center">Recovered</th>
					<th class="w3-center">Active</th>
					<th class="w3-center">Death</th>
				</tr>
				<?php 
					foreach ($cases as $key => $row) {
						echo "<tr>";
						echo "<td style='width: 40%'>".$row -> getProvince()."</td>";
						echo "<td class='w3-center'>".$row -> getAll()."</td>";
						echo "<td class='w3-center'>".$row -> getActive()."</td>";
						echo "<td class='w3-center'>".$row -> getRecovered()."</td>";
						echo "<td class='w3-center'>".$row -> getDeath()."</td>";
						echo "</tr>";
					}
				?>
			</table>
        </div>
    </div>
</div>

<script>
		window.onload = function() {
			var ctx = document.getElementById("canvas").getContext("2d");
			new Chart(ctx, myChart);
		};
		
		var confirmed = [
			<?php 
				$num = 0;
				foreach ($cases as $key => $row) {
					if ($num != 0) echo ", ";
					echo $row -> getAll();
					$num++;
				}
			?>
		];
		
		var recovered = [
			<?php 
				$num = 0;
				foreach ($cases as $key => $row) {
					if ($num != 0) echo ", ";
					echo $row -> getRecovered();
					$num++;
				}
			?>
		];
		
		var active = [
			<?php 
				$num = 0;
				foreach ($cases as $key => $row) {
					if ($num != 0) echo ", ";
					echo $row -> getActive();
					$num++;
				}
			?>
		];
		
		var death = [
			<?php 
				$num = 0;
				foreach ($cases as $key => $row) {
					if ($num != 0) echo ", ";
					echo $row -> getDeath();
					$num++;
				}
			?>
		];
		
		var myChart = {
			type: 'line',
			data: {
				datasets: [
					{
						label: "Confirmed",
						borderColor: '#2196F3FF',
						backgroundColor: '#FFFFFF00',
						data: confirmed,
						fill: true, 
					},
					{
						label: "Recovered",
						borderColor: '#009688FF',
						backgroundColor: '#FFFFFF00',
						data: recovered,
						fill: true, 
					},
					{
						label: "Active",
						borderColor: '#2980B9FF',
						backgroundColor: '#FFFFFF00',
						data: active,
						fill: true, 
					},
					{
						label: "Death",
						borderColor: '#616161FF',
						backgroundColor: '#FFFFFF00',
						data: death,
						fill: true, 
					}],
				labels: [
					<?php 
					$num = 0;
					foreach ($cases as $key => $row) {
						if ($num != 0) echo ", ";
						echo "'".$row -> getProvince()."'";
						$num++;
					}
					?>
				],
			},	
			options: {
				scales: {
					xAxes: [{
						offset: true,
						ticks: {
							autoSkip: false
						},
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Province',
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Number of cases',
						}
					}]
				},
				
				title: {
					display: true,
					text:'Chart.js Line Chart'
				},
				
				responsive: true
			}
		};
    </script>