@extends('layouts.app')

@push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-12">
	<h3 class="page-title">Add Jurnal Umum</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active">Edit Jurnal Umum</li>
	</ul>
</div>
@endpush

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body custom-edit-service">
				
		
			<!-- Add Medicine -->
			<form method="post" enctype="multipart/form-data" action="{{route('edit-jurnal',$jurnal->id)}}">
				@csrf
				@method("PUT")
				<div class="service-fields mb-3">
					<div class="row">
						<div class="col-lg-3">
							<div class="form-group">
								<label>Name Perkiraan<span class="text-danger">*</span></label>
								<input class="form-control" type="text" value="{{$jurnal->name_perkiraan}}" name="name">
							</div>
						</div>
						<div class="col-lg-3">
							<label>Debet<span class="text-danger">*</span></label>
							<input class="form-control" type="number" value="{{$jurnal->debet}}" name="debet">
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label>Kredit<span class="text-danger">*</span></label>
								<input class="form-control" type="number" value="{{$jurnal->kredit}}" name="kredit">
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label>Tanggal<span class="text-danger">*</span></label>
								<input class="form-control" type="date" value="{{$jurnal->tanggal}}" name="tanggal">
							</div>
						</div>
					</div>
				</div>

				<div class="service-fields mb-3">
					<div class="row">
						<div class="col-12">
							<label>Keterangan</label>
							<textarea name="keterangan" class="form-control" value="{{$jurnal->keterangan}}" cols="30" rows="10">{{$jurnal->keterangan}}</textarea>
						</div>
					</div>
				</div>		
				
				
				<div class="submit-section">
					<button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
				</div>
			</form>
			<!-- /Add Medicine -->


			</div>
		</div>
	</div>			
</div>
@endsection	

@push('page-js')
	<!-- Datetimepicker JS -->
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush

