<?php
$this->load->view('partials/head', ['title' => 'Add Trip']);
$this->load->view('partials/nav');
$this->load->view('partials/foot');
if(!empty(validation_errors())){
	$display = '';
} else {
	$display = 'none';
}
?>
<div class="container">
	<div style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title">Add Trip</div>
			</div>  
			<div class="panel-body" >
				<form class="form-horizontal" role="form" action="/travels/create" method="post">
					<div id="signupalert" style="display:<?=$display?>" class="alert alert-danger">
						<p><?=validation_errors()?></p>
						<span></span>
					</div>
					<div class="form-group">
						<label for="destination" class="col-md-3 control-label">Destination</label>
						<div class="col-md-9">
							<input required type="text" class="form-control" name="destination" placeholder="Where are you going?">
						</div>
					</div>
					<div class="form-group">
						<label for="description" class="col-md-3 control-label">Description</label>
						<div class="col-md-9">
							<textarea required class="form-control textarea" name="description" placeholder="What do you plan on doing?"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="start_date" class="col-md-3 control-label">Travel Start Date</label>
						<div class="col-md-9">
							<input required type="date" class="form-control" name="start_date" placeholder="Start Date">
						</div>
					</div>
					<div class="form-group">
						<label for="end_date" class="col-md-3 control-label">Travel End Date</label>
						<div class="col-md-9">
							<input required type="date" class="form-control" name="end_date" placeholder="End Date">
						</div>
					</div>
					<div class="form-group">                                     
						<div class="col-md-offset-3 col-md-9">
							<input id="btn-signup" type="submit" class="btn btn-info" value="Add">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>