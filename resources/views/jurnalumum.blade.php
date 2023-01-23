@extends('layouts.app')

@push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">jurnal Umum</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Jurnal Umum</a></li>
		<li class="breadcrumb-item active">Jurnal Umum</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="{{route('add-jurnal')}}" class="btn btn-primary float-right mt-2">Tambah Jurnal Umum</a>
</div>
@endpush

@section('content')
<div class="row">
	<div class="col-md-12">
	
		<!-- Products -->
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="datatable table table-hover table-center mb-0">
						<thead>
							<tr>
								<th>Nama Jurnal</th>
								<th>Debet</th>
								<th>Kredit</th>
								<th>Keterangan</th>
								<th>Tanggal</th>
								<th class="action-btn">Aksi</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($data as $row)
								<tr>
									<td>{{$row->name_perkiraan}}</td>
									<td>{{$row->debet}}</td>
									<td>{{$row->kredit}}</td>
									<td>{{$row->keterangan}}</td>
									<td>{{$row->tanggal}}</td>
									<td>
										<div class="actions">
											<a class="btn btn-sm bg-success-light" href="{{route('edit-jurnal',$row->id)}}">
												<i class="fe fe-pencil"></i> Edit
											</a>
										</div>
									</td>
								</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /Products -->
		
	</div>
</div>

<!-- Delete Modal -->
<x-modals.delete :route="'products'" :title="'Product'" />
<!-- /Delete Modal -->
@endsection

@push('page-js')
	<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush