@extends('layouts.app')

@push('page-css')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Neraca</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active">Neraca</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="#generate_report" data-toggle="modal" class="btn btn-primary float-right mt-2">Generate Neraca</a>
</div>
@endpush


@section('content')

<div class="row">
	<div class="col-md-12">
	<!-- Products -->
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			<h4>Activa Lancar</h4>
				<table id="datatable" class="table table-hover table-center mb-0">
					<thead>
						<th class="center">Tanggal</th>
						<th class="center">Keterangan</th>
						<th class="center">Nama Perkiraan</th>
						<th class="center">Debet</th>
						<th class="center">Kredit</th>
						<th class="center">Saldo Debet</th>
						<th class="center">Saldo Kredit</th>
					</thead>
					<tbody>
					
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- /activa active -->
</div>
<div class="col-md-12">
	<!-- activa tetap -->
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			<h4>Activa tetap</h4>
				<table id="datatable" class="table table-hover table-center mb-0">
					<thead>
						<th class="center">Tanggal</th>
						<th class="center">Keterangan</th>
						<th class="center">Nama Perkiraan</th>
						<th class="center">Debet</th>
						<th class="center">Kredit</th>
						<th class="center">Saldo Debet</th>
						<th class="center">Saldo Kredit</th>
					</thead>
					<tbody>
						

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- /Products -->
</div>
<div class="col-md-12">
	<!-- Pasiva -->
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			<h4>Pasiva</h4>
				<table id="datatable" class="table table-hover table-center mb-0">
					<thead>
						<th class="center">Tanggal</th>
						<th class="center">Keterangan</th>
						<th class="center">Nama Perkiraan</th>
						<th class="center">Debet</th>
						<th class="center">Kredit</th>
						<th class="center">Saldo Debet</th>
						<th class="center">Saldo Kredit</th>
					</thead>
					<tbody>
						

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- /Products -->
</div>
<div class="col-md-12">
	<!-- modal -->
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
			<h4>Modal</h4>
				<table id="datatable" class="table table-hover table-center mb-0">
					<thead>
						<th class="center">Tanggal</th>
						<th class="center">Keterangan</th>
						<th class="center">Nama Perkiraan</th>
						<th class="center">Debet</th>
						<th class="center">Kredit</th>
						<th class="center">Saldo Debet</th>
						<th class="center">Saldo Kredit</th>
					</thead>
					<tbody>
						

					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- /Products -->
</div>
</div>

<!-- Generate Modal -->
<div class="modal fade" id="generate_report" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Generate Buku Besar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{route('buku-besar')}}">
					@csrf
					<div class="row form-row">
						<div class="col-12">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>From</label>
										<input type="date" name="from_date" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>To</label>
										<input type="date" name="to_date" class="form-control">
									</div>
								</div>
							</div>
							<input type="hidden" name="resource" value="products">
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Generate Modal -->
@endsection


@push('page-js')
<!-- Select2 JS -->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush