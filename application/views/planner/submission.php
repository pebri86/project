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
						<div class="col-md-7">
							<a class="badge pull-right" >Target Information</a>
							<hr />
							<div class="form-group form-group-sm">
								<label for="year">Tahun </label>
								<input type="text" class="form-control" id="yearm" readonly="">
							</div>
							<div class="form-group form-group-sm">
								<label for="order">No. Order </label>
								<input type="text" class="form-control" id="order" >
							</div>
							<div class="form-group form-group-sm">
								<label for="denom">Pecahan </label>
								<input type="text" class="form-control" id="denom-v" readonly="">
								<input type="hidden" id="denom">
							</div>
							<div class="form-group form-group-sm">
								<label for="month">Bulan </label>
								<input type="text" class="form-control" id="month-v" readonly="">
								<input type="hidden" id="month">
							</div>
						</div>
						<div class="col-md-5">
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
				<span id="errMsg"></span>
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
							<input type="hidden" id="denomId">
							<input type="text" id="denomCode" class="form-control" placeholder="Pecahan">
							<span class="input-group-btn">
								<div class="btn-group">
									<button id="btnDenomSearch" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-caret-down fa-fw"></i>
									</button>
									<ul class="dropdown-menu pull-right" role="menu">
										<?php
										foreach ($denom_list as $denom_code) {
											echo "<li><a id=\"" . $denom_code -> DenomID . "\" onclick=\"getDenom(this.id,this.innerHTML)\">" . $denom_code -> DenomCode . "</a></li>\n";
										}
										?>
									</ul>
								</div> </span>
						</div>
					</div>
				</div>
				<div class ="row" style="margin-top: 10px;">
					<div class="col-md-2">
						<button id="queryBtn" class="btn btn-primary btn-sm">
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
								<a id="editBtn" class="btn btn-primary btn-sm"><i class="fa  fa-edit"></i> Edit</a>
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
											<th>DenomID</th>
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
<script language="JavaScript">
	var year = $('#year').val();
	var denom = $('#denomId').val();
	var ptable;
	if(year != "" && denom != ""){
		ptable = $('#plan-table').dataTable({
				"bProcessing": true,
            	"bServerSide": false,
            	"sAjaxSource": "<?php echo base_url('index.php/submission/datatable'); ?>/"+year+"/"+denom,
            	"columns" : [{
			"data" : "OrderNo"
		}, {
			"data" : "Mnth",
			"render": 	function ( data, type, row ) {
                    		return getMonthName(data);
        				}								
		}, {
			"data" : "M1"
		}, {
			"data" : "M2"
		}, {
			"data" : "M3"
		}, {
			"data" : "M4"
		}, {
			"data" : "Amnth"
		}, {
			"data" : "SubmissionPlanID",
			"visible" : false
		}, {
			"data" : "DenomID",
			"visible" : false
		}]
		});
	}else{
		ptable = $('#plan-table').dataTable({
		"bProcessing": true,
        "bServerSide": false,
        "columns" : [{
			"data" : "OrderNo"
		}, {
			"data" : "Mnth",
			"render": 	function ( data, type, row ) {
                    		return getMonthName(data);
                    }
		}, {
			"data" : "M1"
		}, {
			"data" : "M2"
		}, {
			"data" : "M3"
		}, {
			"data" : "M4"
		}, {
			"data" : "Amnth"
		}, {
			"data" : "SubmissionPlanID",
			"visible" : false
		}, {
			"data" : "DenomID",
			"visible" : false
		}]
	});
	}

	var histtable = $('#history-table').dataTable();
	
	$('body').on("click", '#plan-table tbody tr', function() {
		if ($(this).hasClass('active'))
			$(this).removeClass('active');
		else {
			$(this).siblings('.active').removeClass('active');
			$(this).addClass('active');
		}
	});
	
	$('#editBtn').click(function() {
		var rowData = ptable.api().row('.active').data();
		$('#month').val(rowData.Mnth);
		$('#month-v').val(getMonthName(rowData.Mnth));
		$('#yearm').val($('#year').val());
		$('#denom').val($('#denomId').val());
		$('#denom-v').val($('#denomCode').val());
		$('#myModal').modal('show');
	});
	
	getMonthName = function (v) {
    	var n = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    	return n[v]
	}

	function getYear(text) {
		textYear = document.getElementById("year");
		textYear.value = text;
	};

	function getDenom(id, text) {
		textDenomCode = document.getElementById("denomCode");
		textDenomID = document.getElementById("denomId");
		textDenomCode.value = text;
		textDenomID.value = id;
	};

	$('#addBtn').click(function() {
		$('#myModal').modal('show');
	});
	
	
	
	$('#queryBtn').click(function(){
		year = $('#year').val();
		denom = $('#denomId').val();
		if(year == "" && denom == ""){
			$('#errMsg').html('<div class="alert alert-danger" role="alert"><strong>Error!</strong> Filter tahun dan pecahan tidak boleh kosong.</div>');
		}else{
			var oSettings = ptable.fnSettings();
			oSettings.sAjaxSource  = "<?php echo base_url('index.php/submission/datatable'); ?>/"+year+"/"+denom;
			ptable.api().ajax.reload();
			alert('success');
			$('#errMsg').html('');
		}
	});

	function calcAmount() {
		var m1_val = parseInt(document.getElementById("m1").value);
		var m2_val = parseInt(document.getElementById("m2").value);
		var m3_val = parseInt(document.getElementById("m3").value);
		var m4_val = parseInt(document.getElementById("m4").value);
		var amnth_val = document.getElementById("amnth");
		amnth_val.value = m1_val + m2_val + m3_val + m4_val;
	};
</script>
