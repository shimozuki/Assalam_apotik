@extends('layouts.app')

@push('page-css')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Laba Rugi</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active">Laba Rugi</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="#generate_report" data-toggle="modal" class="btn btn-primary float-right mt-2">Generate Laba Rugi</a>
</div>
@endpush


@section('content')

<div class="row">
	<div class="col-md-12">
		<!-- Products -->
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable-export" class="table table-hover table-center mb-0">
						<thead>
							<th class="center">Bulan</th>
							<th class="center">Pendapatan</th>
							<th class="center">Persedian Awal</th>
							<th class="center">Persedian Akhir</th>
							<th class="center">Harga Pokok Penjualan</th>
							<th class="center">Biyaya gaji</th>
							<th class="center">Biyaya Lain-Lain</th>
						</thead>
						<tbody>
							@if(!empty($get_biyaya->biyaya))
							@php
							$akhir = $get_pb->total_penjualan - ($query->persedian_awal + $get_pb->total_pembelian);
							$pokok = ($query->persedian_awal + $get_pb->total_pembelian) - $akhir;
							$total = ($get_gaji->gaji + $get_biyaya->biyaya);
							$bersoh = $get_pb->total_penjualan - ($pokok + $total);
							if ($get_pb->month == '01')
							{
								$bulan = "Januari";
							}
							elseif ($get_pb->month == '02')
							{
								$bulan = "February";
							}
							elseif ($get_pb->month == '03')
							{
								$bulan = "Maret";
							}
							elseif ($get_pb->month == '04')
							{
								$bulan = "April";
							}
							elseif ($get_pb->month == '05')
							{
								$bulan = "Mei";
							}
							elseif ($get_pb->month == '06')
							{
								$bulan = "Juni";
							}
							elseif ($get_pb->month == '07')
							{
								$bulan = "Juli";
							}
							elseif ($get_pb->month == '08')
							{
								$bulan = "Agustus";
							}
							elseif ($get_pb->month == '09')
							{
								$bulan = "September";
							}
							elseif ($get_pb->month == '10')
							{
								$bulan = "Oktober";
							}
							elseif ($get_pb->month == '11')
							{
								$bulan = "November";
							}
							elseif ($get_pb->month == '12')
							{
								$bulan = "Desember";
							}
							@endphp
							<tr>
								<td>{{$bulan}}</td>
								<td>{{$get_pb->total_penjualan}}
								</td>
								<td>
									{{$query->persedian_awal}}
								</td>
								<td>
									{{$akhir}}
								</td>
								<td>{{$pokok}}</td>
								<td>{{$get_gaji->gaji}}</td>
								<td>{{$get_biyaya->biyaya}}</td>
							</tr>
						<tbody>
						<td class="center" colspan="7"><b>Total Biyaya :</b> {{$total}}
						<br />
						<b>Total Biyaya :</b> {{$bersoh}}
					</td>
					@endif
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
					<h5 class="modal-title">Generate Laba Rugi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{route('laba-rugi')}}">
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
									<input type="hidden" name="prodcut" value="laba-rugi">
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Generate</button>
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