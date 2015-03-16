<div class="row">
	<div class="col-lg-12">
		<h1 class="content-header">Entry Rencana Target Penyerahan</h1>
		<hr />
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h5 class="panel-title"><i class="fa fa-edit fa-lg fa-fw"></i>Target Penyerahan</h5>
			</div>
			<div class="panel-body">
				<form class="form custom-form" role="form">
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
					<div class="row">
						<div class="col-md-12">
							<hr>
							<button type="submit" class="btn btn-primary pull-right">
								<i class"fa fa-send fa-fw"></i>Submit
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<script language="JavaScript">
	function calcAmount(){
		var m1_val = parseInt(document.getElementById("m1").value);
		var m2_val = parseInt(document.getElementById("m2").value);
		var m3_val = parseInt(document.getElementById("m3").value);
		var m4_val = parseInt(document.getElementById("m4").value);
		var amnth_val = document.getElementById("amnth");
		amnth_val.value = m1_val + m2_val + m3_val + m4_val;
	}
</script>