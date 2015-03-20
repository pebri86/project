<!-- DataTables CSS -->
<link href="<?php echo base_url("assets/css/dataTables.bootstrap.css"); ?>" rel="stylesheet">
<div class="row">
	<div class="col-lg-12">
		<h1 class="content-header">Daftar Rencana Produksi per Bulan</h1>
		<hr />
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
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
							<input type="hidden" id="orgCode" class="form-control" placeholder="Bagan" value="<?=$orgCode ?>">
							<input type="text" id="orgName" class="form-control" placeholder="Bagan" value="<?=$orgName ?>">
							<span class="input-group-btn">
								<div class="btn-group">
									<button id="btnSectionSearch" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-caret-down fa-fw"></i>
									</button>
									<ul class="dropdown-menu pull-right" role="menu">
										<?php
										foreach ($bagan_list as $bagan) {
											echo "<li><a id=\"" . $bagan -> OrgCode . "\" onclick=\"getBagan(this.id,this.innerHTML)\">" . $bagan -> OrgName . "</a></li>\n";
										}
										?>
									</ul>
								</div> </span>
						</div>
						<div class="input-group input-group-sm input-group-filter">
							<input type="text" id="ord_submission" class="form-control" placeholder="No. Order Penyerahan">
							<span class="input-group-btn">
								<div class="btn-group">
									<button id="btnSubSearch" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-search fa-fw"></i>
									</button>
									<ul id="orderlist" class="dropdown-menu pull-right" role="menu">

									</ul>
								</div> </span>
						</div>
					</div>
					<div class="col-md-2">
						<button id="queryBtn" class="btn btn-primary btn-sm input-group-filter">
							<i class="fa fa-search fa-fw"></i> Query
						</button>
					</div>
				</div>
			</div>
			<div class ="row"></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h5 class="panel-title"><i class="fa fa-calendar fa-lg fa-fw"></i>Target Rencana Produksi</h5>
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
							<div class="table-responsive" style="margin-top: 10px;">
								<table class="table table-striped table-bordered table-hover" id="plan-table">
									<thead>
										<tr>
											<th>ID</th>
											<th>SubmissionPlanID</th>
											<th>OrgCode</th>
											<th>No. Order</th>
											<th>ID_Pecahan</th>
											<th>Pecahan</th>
											<th>Bulan</th>
											<th>Minggu 1</th>
											<th>Minggu 2</th>
											<th>Minggu 3</th>
											<th>Minggu 4</th>
											<th>Jumlah</th>
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
		var ptable = $('#plan-table').dataTable({
	"bProcessing" : true,
	"bServerSide" : false,
	"order" : [[7, "asc"]],
	"columns" : [{
	"data" : "ProdOrdID",
	"visible" : false
	}, {
	"data" : "SubmissionPlanID",
	"visible" : false
	}, {
	"data" : "OrgCode",
	"visible" : false
	}, {
	"data" : "OrderNo"
	}, {
	"data" : "DenomID",
	"visible" : false
	}, {
	"data" : "DenomCode"
	}, {
	"data" : "Mnth",
	"render" : function(data, type, row) {
	return getMonthName(data);
	}
	}, {
	"data" : "ShtM1"
	}, {
	"data" : "ShtM2"
	}, {
	"data" : "ShtM3"
	}, {
	"data" : "ShtM4"
	}, {
	"data" : "Amnth"
	}]
	});

	var histtable = $('#history-table').DataTable();

	function getYear(text) {
	textYear = document.getElementById("year");
	textYear.value = text;
	update_order_list(text,$('#orgCode').val());
	};

	function getBagan(id, text) {
	textOrgCode = document.getElementById("orgCode");
	textOrgName = document.getElementById("orgName");
	textOrgCode.value = id;
	textOrgName.value = text;
	update_order_list($('#year').val(),id);
	};
	
	function getOrder(text){
		document.getElementById("ord_submission").value = text;
	}

	function update_order_list(txtYear, txtBagan) {
	$.ajax({
	url : "<?php echo base_url('index.php/submission/get_order_list'); ?>
		/"+txtYear+"/"+txtBagan,
		type : "POST",
		dataType : "json",
		success : function(data) {
		$('#orderlist').html('');
		for(x=0;x<data.data.length;x++){
		$('#orderlist').append('<li><a onclick="getOrder(this.innerHTML)">'+ data.data[x].OrderNo+'</a></li>\n');
		}
		}
		});
		}
		
	getMonthName = function (v) {
    	var n = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    	return n[v]
	}
		
	$('#queryBtn').click(function(){
		orgCode = $('#orgCode').val();
		year = $('#year').val();
		ordSub = (($('#ord_submission').val() == '' ) ? "0" : $('#ord_submission').val());
		if(orgCode == "" || year == "" || ordSub == ""){
			$('#errMsg').html('<div class="alert alert-danger" role="alert"><strong>Error!</strong> Filter tidak boleh kosong.</div>');
		}else{
			var oSettings = ptable.fnSettings();
			oSettings.sAjaxSource  = "<?php echo base_url('index.php/production_plan/datatable'); ?>/"+orgCode+"/"+ordSub;
			ptable.api().ajax.reload();
			$('#errMsg').html('');
		}
	});
</script>