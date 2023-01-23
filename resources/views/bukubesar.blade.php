@extends('layouts.app')

@push('page-css')
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Buku Besar</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active">Posting Buku Besar</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="#generate_report" data-toggle="modal" class="btn btn-primary float-right mt-2">Generate Buku Besar</a>
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
						<th class="center">Tanggal</th>
						<th class="center">Keterangan</th>
						<th class="center">Nama Perkiraan</th>
						<th class="center">Debet</th>
						<th class="center">Kredit</th>
						<th class="center">Saldo Debet</th>
						<th class="center">Saldo Kredit</th>
					</thead>
					<tbody>
						@foreach ($query as $val)
						@php 
						$s_debet = 0;
						$s_kredit = 0;
						if ($val->debet != 0){
							$s_debet += $val->debet - $val->kredit;
						}else{
							$s_debet = 0;
						}
						if ($val->kredit != 0){
							$s_kredit += $val->kredit - $val->debet;
						}else{
							$s_kredit = 0;
						}
						@endphp
						@if (!(empty($val->name_perkiraan)))
						<tr>
							<td>{{$val->tanggal}}</td>
							<td>{{$val->keterangan}}
							</td>
							<td>
								{{$val->name_perkiraan}}
							</td>
							<td>
								{{$val->debet}}
							</td>
							<td>{{$val->kredit}}</td>
							<td>{{$s_debet}}</td>
							<td>{{$s_kredit}}</td>
						</tr>
						@endif
						@endforeach

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
							<div class="form-group">
								<label>Nama Akun</label>
								<select class="select2 form-select form-control" name="name">
									@foreach ($get_akun as $row)
									<option value="{{$row->name_perkiraan}}">{{$row->name_perkiraan}}</option>
									@endforeach
								</select>
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