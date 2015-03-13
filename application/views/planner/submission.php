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
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading clearfix">
				<h5 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-calendar fa-lg fa-fw"></i>Target Penyerahan Perbulan</h5>
				<div class="input-group input-group-sm" style="max-width:400px; float: right;">
					<span class="input-group-addon input-group-addon-primary">Tahun:</span>
					<select id="year" class="selectpicker form-control" data-live-search="true" title="Pilih Tahun ...">
						<option>Pilih Tahun</option>
						<option>2015</option>
						<option>2016</option>
						<option>2017</option>
						<option>2018</option>
						<option>2019</option>
						</select>
					<span class="input-group-addon">Pecahan:</span>
					<select id="denomID" class="selectpicker form-control" data-live-search="true" title="Pilih Pecahan ...">
						<option>Pilih Pecahan</option>
						<option>T</option>
						<option>U</option>
						<option>V</option>
						<option>W</option>
						<option>X</option>
						<option>Y</option>
						</select>
				</div>
			</div>
			<div class="panel-body">
				<p>
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
		</div>
	</div>
</div>
<script src="<?php echo base_url("assets/js/jquery.dataTables.js"); ?>" ></script>
<script src="<?php echo base_url("assets/js/dataTables.bootstrap.js"); ?>" ></script>
<script>
	$(document).ready(function() {
		var table = $('#plan-table').DataTable();
	}); 
</script>