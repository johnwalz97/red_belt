<?php
$this->load->view('partials/head', ['title' => 'Travel Dashboard']);
$this->load->view('partials/nav');
$this->load->view('partials/foot');
?>
<h2>How are you doing today, <?=$this->session->userdata('user')['first_name']." ".$this->session->userdata('user')['last_name']?></h2>
<div class="container">
	<h3>Your Trip Schedules:</h3>
	<table class="table">
		<tr>
			<th>Destination</th>
			<th>Travel Start Date</th>
			<th>Travel End Date</th>
			<th>Plan</th>
		</tr>
	<?php
		foreach($travels as $trip){?>
			<tr>
				<td><a href="/travels/destination/<?=$trip['id']?>"><?=$trip['destination']?></a></td>
				<td><?=$trip['start_date']?></td>
				<td><?=$trip['end_date']?></td>
				<td><?=$trip['plan']?></td>
			</tr>
	<?php } ?>
	</table>
</div>

<div class="container">
	<h3>Other User's Travel Plans:</h3>
	<table class="table">
		<tr>
			<th>Name</th>
			<th>Destination</th>
			<th>Travel Start Date</th>
			<th>Travel End Date</th>
			<th>Do You Want To Join?</th>
		</tr>
	<?php
		foreach($other_travels as $trip){?>
			<tr>
				<td><?=$trip['user']['first_name']?> <?=$trip['user']['last_name']?></td>
				<td><a href="/travels/destination/<?=$trip['id']?>"><?=$trip['destination']?></a></td>
				<td><?=$trip['start_date']?></td>
				<td><?=$trip['end_date']?></td>
				<td><a href="/travels/join/<?=$trip['id']?>">Join This Trip!</a></td>
			</tr>
	<?php } ?>
	</table>
	<a href="/travels/add">Add Travel Plan</a>
</div>