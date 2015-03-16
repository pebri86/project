<!-- DataTables CSS -->
<link href="<?php echo base_url("assets/css/dataTables.bootstrap.css"); ?>" rel="stylesheet">
<div class="row">
	<div class="col-lg-12">
		<h1 class="content-header">Daftar Target Penyerahan</h1>
		<hr />
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 id="dialog-title" class="modal-title">Target Penyerahan</h4>
			</div>
			<div class="modal-body">
				<span id="message"></span>
				<form class="form custom-form" role="form" method="post" action="<?php echo base_url("index.php/submission/update"); ?>">
					<div class="row">
						<div class="col-md-6">
							<a class="badge pull-right" >Target Information</a>
							<hr />
							<div class="form-group form-group-sm">
								<label for="year">Tahun </label>
								<input type="text" class="form-control" id="year" readonly="">
							</div>
							<div class="form-group form-group-sm">
								<label for="order">No. Order </label>
								<input type="text" class="form-control" id="order" >
							</div>
							<div class="form-group form-group-sm">
								<label for="denom">Pecahan </label>
								<input type="text" class="form-control" id="denom" readonly="">
							</div>
							<div class="form-group form-group-sm">
								<label for="month">Bulan </label>
								<input type="text" class="form-control" id="month" readonly="">
							</div>
						</div>
						<div class="col-md-6">
							<a class="badge pull-right" >Target Amounts</a>
							<hr />
							<div class="form-group form-group-sm">
								<label for="m1">Minggu 1 </label>
								<input type="number" class="form-control" value="0" onkeyup="calcAmount()" id="m1" >
							</div>
							<div class="form-group form-group-sm">
								<label for="m1">Minggu 2 </label>
								<input type="number" class="form-control" value="0" onkeyup="calcAmount()" id="m2" >
							</div>
							<div class="form-group form-group-sm">
								<label for="m1">Minggu 3 </label>
								<input type="number" class="form-control" value="0" onkeyup="calcAmount()" id="m3" >
							</div>
							<div class="form-group form-group-sm">
								<label for="m1">Minggu 4 </label>
								<input type="number" class="form-control" value="0" onkeyup="calcAmount()" id="m4" >
							</div>
							<div class="form-group form-group-sm">
								<label for="amnth">Jumlah </label>
								<input type="number" class="form-control" id="amnth" readonly="">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary pull-right">
							<i class"fa fa-send fa-fw"></i>Submit
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-danger">
			<!--
			<div class="panel-heading">
			<h6 class="panel-title"><i class="fa fa-search fa-lg fa-fw"></i>Filter</h6>
			</div>
			-->
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<div class="input-group input-group-sm input-group-filter">
							<input type="text" id="year" class="form-control" placeholder="Tahun">
							<span class="input-group-btn">
								<div class="btn-group">
									<button id="btnYearSearch" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-caret-down fa-fw"></i>
									</button>
									<ul class="dropdown-menu pull-right" role="menu">
										<?php
										$currentYear = date('Y');
										foreach (range($currentYear - 2, $currentYear + 5) as $value) {
											echo "<li><a onclick=\"getYear(this.innerHTML)\">" . $value . "</a></li>\n ";

										}
										?>
									</ul>
								</div> </span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input-group input-group-sm input-group-filter">
							<input type="text" id="denomId" class="form-control" placeholder="Pecahan">
							<span class="input-group-btn">
								<div class="btn-group">
									<button id="btnDenomSearch" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-caret-down fa-fw"></i>
									</button>
									<ul class="dropdown-menu pull-right" role="menu">
										<li>
											<a href="#">T</a>
										</li>
										<li>
											<a href="#">U</a>
										</li>
										<li>
											<a href="#">V</a>
										</li>
										<li>
											<a href="#">W</a>
										</li>
										<li>
											<a href="#">X</a>
										</li>
										<li>
											<a href="#">Y</a>
										</li>
									</ul>
								</div> </span>
						</div>
					</div>
				</div>
				<div class ="row" style="margin-top: 10px;">
					<div class="col-md-2">
						<button class="btn btn-primary btn-sm">
							<i class="fa fa-search fa-fw"></i> Query
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading clearfix">
				<h5 class="panel-title"><i class="fa fa-calendar fa-lg fa-fw"></i>Target Penyerahan Perbulan</h5>
			</div>
			<div class="panel-body">
				<div role="tabpanel">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<a href="#list" aria-controls="list" role="tab" data-toggle="tab">List</a>
						</li>
						<li role="presentation">
							<a href="#history" aria-controls="history" role="tab" data-toggle="tab">History</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="list">
							<p style="margin-top: 10px;">
								<a id="addBtn" class="btn btn-primary btn-sm"><i class="fa  fa-plus-circle"></i> Tambah data</a>
							</p>

							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover" id="plan-table">
									<thead>
										<tr>
											<th>No. Order</th>
											<th>Bulan</th>
											<th>Minggu 1</th>
											<th>Minggu 2</th>
											<th>Minggu 3</th>
											<th>Minggu 4</th>
											<th>Jumlah</th>
											<th>Action</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="history">
							<div class="table-responsive" style="margin-top: 10px;">
								<table class="table table-striped table-bordered table-hover" id="history-table">
									<thead>
										<tr>
											<th>Date</th>
											<th>User</th>
											<th>Changes</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url("assets/js/jquery.dataTables.js"); ?>" ></script>
<script src="<?php echo base_url("assets/js/dataTables.bootstrap.js"); ?>" ></script>
<script>
	var ptable = $('#plan-table').DataTable();
	var histtable = $('#history-table').DataTable();

	function getYear(text) {
		textYear = document.getElementById("year");
		textYear.value = text;
	};

	$('#addBtn').click(function() {
		$('#myModal').modal('show');
	}); 
</script>
