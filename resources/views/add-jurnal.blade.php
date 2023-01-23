@extends('layouts.app')

@push('page-css')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-12">
	<h3 class="page-title">Tambah Jurnal Umum</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Acounting</a></li>
		<li class="breadcrumb-item active">Tambah Jurnal Umum</li>
	</ul>
</div>
@endpush


@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body custom-edit-service">

				<!-- Add Medicine -->
				<form method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('add-jurnal')}}">
					@csrf
					<div class="service-fields mb-3">
						<div class="row">
							<div class="col-lg-3">
								<div class="form-group">
									<label>Nama Akun<span class="text-danger">*</span></label>
									<select class="select2 form-select form-control" id="qty" name="name"> 
										<option value="1">PIUTANG PEGAWAI</option>
										<option value="2">SEWA Dibayar Di muka</option>
										<option value="3">Pembelian Obat & alat kesehatan</option>
										<option value="4">Peralatan Toko</option>
										<option value="5">HUTANG BANK </option>
										<option value="6">Gaji Pegawai</option>
										<option value="7">Rekening Air</option>
										<option value="8">Rekening Listrik</option>
										<option value="10">PRIVE OWNER</option>
										<option value="9">Biaya Lain-lain</option>
								</select>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group">
									<label>biyaya <span class="text-danger">*</span></label>
									<input type="number" name="biyaya" class="form-control"  id="biyaya">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group">
									<label>Tanggal <span class="text-danger">*</span></label>
									<input type="date" class="form-control" name="tanggal">
								</div>
							</div>
						</div>
					</div>

					<div class="service-fields mb-3">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label>Keterangan<span class="text-danger">*</span></label>
									<textarea class="form-control" name="keterangan" id="" cols="30" rows="10"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn" type="submit">Simpan</button>
					</div>
				</form>
				<!-- /Add Medicine -->
				@foreach ($pembelian_k as $val)
				<input type="text" id="total" value="{{$val->pembelian}}" hidden>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection

@push('page-js')
<!-- Datetimepicker JS -->
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- Select2 JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
	$('#qty').on('change', function() {
		var isi = document.getElementById("qty").value;
		const total = document.getElementById("total").value;
		if (isi == 3) {
			$('[name=biyaya]').val(total);
			document.getElementById("biyaya").readOnly = true; 
		}else{
			document.getElementById("biyaya").readOnly = false; 
		}
	});
</script>
@endpush