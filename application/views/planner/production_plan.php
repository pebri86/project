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
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 id="dialog-title" class="modal-title"><i class="fa fa-calendar fa-fw"></i><span id="title"></span></h4>
			</div>
			<div class="modal-body">
				<span id="message"></span>
				<div class="row">
					<form class="form custom-form" role="form" id="dialogForm">
						<div class="col-md-4">
							<div class="form-group form-group-sm">
								<label for="year">Tahun </label>
								<input type="text" class="form-control" name="yearm" id="yearm" readonly="">
								<input type="hidden" name="SubmissionPlanID" id="SubmissionPlanID">
								<input type="hidden" name="ProdOrdID" id="ProdOrdID">
							</div>
							<div class="form-group form-group-sm">
								<label for="order">No. Order Penyerahan</label>
								<input type="text" class="form-control" id="SubOrderNo" readonly>
							</div>
							<div class="form-group form-group-sm">
								<label for="order">No. Order</label>
								<input type="text" class="form-control" name="OrderNo" id="OrderNo" >
							</div>
							<div class="form-group form-group-sm">
								<label for="denom">Pecahan </label>
								<input type="text" class="form-control" id="denom-v" readonly="">
								<input type="hidden" name="denom" id="denom">
							</div>
							<div class="form-group form-group-sm">
								<label for="month">Bulan </label>
								<input type="text" class="form-control" id="month-v" readonly="">
								<input type="hidden" id="Mnth">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group form-group-sm">
								<label for="m1">Minggu 1 </label>
								<div class="input-group input-group-sm">
									<input type="number" class="form-control" value="0" onkeyup="calcAmount()" name="ShtM1" id="ShtM1" >
									<span class="input-group-addon">Lembar</span>
								</div>
							</div>
							<div class="form-group form-group-sm">
								<label for="m1">Minggu 2 </label>
								<div class="input-group input-group-sm">
									<input type="number" class="form-control" value="0" onkeyup="calcAmount()" name="ShtM2" id="ShtM2" >
									<span class="input-group-addon">Lembar</span>
								</div>
							</div>
							<div class="form-group form-group-sm">
								<label for="m1">Minggu 3 </label>
								<div class="input-group input-group-sm">
									<input type="number" class="form-control" value="0" onkeyup="calcAmount()" name="ShtM3" id="ShtM3" >
									<span class="input-group-addon">Lembar</span>
								</div>
							</div>
							<div class="form-group form-group-sm">
								<label for="m1">Minggu 4 </label>
								<div class="input-group input-group-sm">
									<input type="number" class="form-control" value="0" onkeyup="calcAmount()" name="ShtM4" id="ShtM4" >
									<span class="input-group-addon">Lembar</span>
								</div>
							</div>
							<div class="form-group form-group-sm">
								<label for="amnth">Jumlah </label>
								<div class="input-group input-group-sm">
									<input type="number" class="form-control" name="ShtAmnth" id="ShtAmnth" readonly="">
									<span class="input-group-addon">Lembar</span>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group form-group-sm">
								<label for="m1">Minggu 1 </label>
								<div class="input-group input-group-sm">
									<input type="number" class="form-control" value="0" name="NoteM1" id="NoteM1" readonly>
									<span class="input-group-addon">Note</span>
								</div>
							</div>
							<div class="form-group form-group-sm">
								<label for="m1">Minggu 2 </label>
								<div class="input-group input-group-sm">
									<input type="number" class="form-control" value="0" name="NoteM2" id="NoteM2" readonly>
									<span class="input-group-addon">Note</span>
								</div>
							</div>
							<div class="form-group form-group-sm">
								<label for="m1">Minggu 3 </label>
								<div class="input-group input-group-sm">
									<input type="number" class="form-control" value="0" name="NoteM3" id="NoteM3" readonly>
									<span class="input-group-addon">Note</span>
								</div>
							</div>
							<div class="form-group form-group-sm">
								<label for="m1">Minggu 4 </label>
								<div class="input-group input-group-sm">
									<input type="number" class="form-control" value="0" name="NoteM4" id="NoteM4" readonly>
									<span class="input-group-addon">Note</span>
								</div>
							</div>
							<div class="form-group form-group-sm">
								<label for="amnth">Jumlah </label>
								<div class="input-group input-group-sm">
									<input type="number" class="form-control" name="NoteAmnth" id="NoteAmnth" readonly="">
									<span class="input-group-addon">Lembar</span>
								</div>
							</div>
							<p class="text-danger">* Semua kolom harus diisi.</p>
						</div>
				</div>
				</form>
				<div class="modal-footer">
					<button id="submitBtn" class="btn btn-primary pull-right">
						<i class"fa fa-send fa-fw"></i>Submit
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!--
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-danger">
			<div class="panel-heading">
			<h6 class="panel-title"><i class="fa fa-search fa-lg fa-fw"></i>Filter</h6>
			</div>
		
			<div class="panel-body">
				
			</div>
			<div class ="row"></div>
		</div>
	</div>
</div>
-->
<div class="row">
	<div class="col-md-12">
		<span id="errMsg"></span>
		<div class="panel panel-info">
			<div class="panel-heading">
				<h5 class="panel-title"><i class="fa fa-calendar fa-lg fa-fw"></i>Target Rencana Produksi</h5>
			</div>
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
								<a id="editBtn" class="btn btn-primary btn-sm"><i class="fa  fa-edit"></i> Edit</a>
							</p>
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
											<th>Note</th>
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
		"order" : [[0, "asc"]],
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
			"data" : "Note",
			"visible" : false
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
			"data" : "ShtAmnth"
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
	};

	function update_order_list(txtYear, txtBagan) {
	$.ajax({
		url : "<?php echo base_url('submission/get_order_list'); ?>/"+txtYear+"/"+txtBagan,
		type : "POST",
		dataType : "json",
		success : function(data) {
			$('#orderlist').html('');
			for(x=0;x<data.data.length;x++){
				$('#orderlist').append('<li><a onclick="getOrder(this.innerHTML)">'+ data.data[x].OrderNo+'</a></li>\n');
			}
		}
		});
	};

	getMonthName = function (v) {
	var n = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	return n[v]
	};

	$('#queryBtn').click(function(){
		orgCode = $('#orgCode').val();
		year = $('#year').val();
		ordSub = (($('#ord_submission').val() == '' ) ? "0" : $('#ord_submission').val());
		if(orgCode == "" || year == "" || ordSub == ""){
			$('#errMsg').html('<div class="alert alert-danger" role="alert"><strong>Error!</strong> Filter tidak boleh kosong.</div>');
		}else{
			var oSettings = ptable.fnSettings();
			oSettings.sAjaxSource  = "<?php echo base_url('production_plan/datatable'); ?>/"+orgCode+"/"+ordSub+"/"+year;
			ptable.api().ajax.reload();
		$('#errMsg').html('');
		}
	});

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
		$('#title').html('Target Rencana Produksi Seksi '+$('#orgName').val());
		$('#ProdOrdID').val(rowData.ProdOrdID);
		$('#month').val(rowData.Mnth);
		$('#month-v').val(getMonthName(rowData.Mnth));
		$('#yearm').val($('#year').val());
		$('#denom').val(rowData.DenomID);
		$('#denom-v').val(rowData.DenomCode);
		$('#OrderNo').val(rowData.OrderNo);
		$('#SubOrderNo').val($('#ord_submission').val());
		$('#ShtM1').val(rowData.ShtM1);
		$('#ShtM2').val(rowData.ShtM2);
		$('#ShtM3').val(rowData.ShtM3);
		$('#ShtM4').val(rowData.ShtM4);
		calcAmount();
		$('#myModal').modal('show');
	});
	
	function calcAmount() {
		var rowData = ptable.api().row('.active').data();
		var sm1_val = parseInt(document.getElementById("ShtM1").value);
		var sm2_val = parseInt(document.getElementById("ShtM2").value);
		var sm3_val = parseInt(document.getElementById("ShtM3").value);
		var sm4_val = parseInt(document.getElementById("ShtM4").value);
		document.getElementById("ShtAmnth").value = sm1_val + sm2_val + sm3_val + sm4_val;
		document.getElementById("NoteM1").value = sm1_val * parseInt(rowData.Note);
		document.getElementById("NoteM2").value = sm2_val * parseInt(rowData.Note);
		document.getElementById("NoteM3").value = sm3_val * parseInt(rowData.Note);
		document.getElementById("NoteM4").value = sm4_val * parseInt(rowData.Note);
		var nm1_val = parseInt(document.getElementById("NoteM1").value);
		var nm2_val = parseInt(document.getElementById("NoteM2").value);
		var nm3_val = parseInt(document.getElementById("NoteM3").value);
		var nm4_val = parseInt(document.getElementById("NoteM4").value);
		document.getElementById("NoteAmnth").value = nm1_val + nm2_val + nm3_val + nm4_val;		
	};
	
	$('#submitBtn').click(function() {		
		orgCode = $('#orgCode').val();
		var st_process = '<div class="alert alert-success" role="alert"><i class="fa fa-spinner fa-spin"></i> Request sedang diproses...</div>';
		var st_success = '<div class="alert alert-success" role="alert"><strong>Success!</strong> berhasil diproses.</div>';
		var st_error = '<div class="alert alert-danger" role="alert"><strong>Perhatian!</strong> terjadi kesalahan.</div>';
		$.ajax({
				url : "<?php echo base_url('production_plan/update_data'); ?>/"+orgCode,
				type : "POST",
				data: $('#dialogForm').serialize(),
				dataType : "json",
				success : function(data) {
					if (data.error == false) {		
						ptable.api().ajax.reload();																	
						$('#myModal').modal('hide');
						$("#errMsg").html(st_success);
						var delay = 1000;
						setTimeout(function() {	
							$('#errMsg').html('');
						}, delay);
					} else {
						$('#myModal').modal('hide');
						$("#errMsg").html(st_error);
					}
				},
				beforeSend : function(xhr) {
					$("#errMsg").html(st_process);
				}
			});
	});	
</script>
