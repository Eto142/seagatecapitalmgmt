@include('admin.header')

<div class="main-panel bg-dark">
	<div class="content bg-dark">
		<div class="page-inner">
			@if(session('message'))
			<div class="alert alert-success mb-2">{{ session('message') }}</div>
			@endif
			<div class="mt-2 mb-4">
				<h1 class="title1 text-light">Seagatecapitalmgmt Account Verification List</h1>
			</div>

			<div class="mb-5 row">
				<div class="col-12">
					<small class="text-light">If you can't see the image, try switching your uploaded location to
						another option from your admin settings page.</small>
				</div>
				<div class="col-12 card p-4 bg-dark shadow">
					<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
						<table id="ShipTable" class="table table-hover text-light">
							<thead>
								<tr>
									<th>ID</th>
									<th>Full Name</th>
									<th>Email</th>
									<th>KYC Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($kyc as $kycUser)
								<tr>
									<th scope="row">{{ $kycUser->id }}</th>
									<td>{{ $kycUser->name }}</td>
									<td>{{ $kycUser->email }}</td>
									@if($kycUser->user_status == '1')
									<td>Verified</td>
									@elseif($kycUser->user_status == '0')
									<td>Not Verified</td>
									@elseif($kycUser->user_status == '2')
									<td>Declined</td>
									@endif
									<td>
										<a href="#" data-toggle="modal" data-target="#viewKycIdModal{{ $kycUser->id }}"
											class="btn btn-light btn-sm">
											<i class="fa fa-eye"></i> Front ID
										</a>
										<a href="#" data-toggle="modal"
											data-target="#viewKycbackIdModal{{ $kycUser->id }}"
											class="btn btn-light btn-sm">
											<i class="fa fa-eye"></i> Back ID
										</a>
										<a href="#" data-toggle="modal"
											data-target="#viewKycPassportModal{{ $kycUser->id }}"
											class="btn btn-light btn-sm">
											<i class="fa fa-eye"></i> Passport
										</a>

										<a href="{{ route('admin.accept.kyc',$kycUser->user_id) }}"
											class="btn btn-primary btn-sm">Accept</a>
										<a href="{{ route('admin.reject.kyc',$kycUser->user_id) }}"
											class="btn btn-danger btn-sm">Reject</a>
									</td>
								</tr>

								<!-- View KYC ID Modal -->
								<div id="viewKycIdModal{{ $kycUser->id }}" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-dark">
												<h4 class="modal-title text-light">KYC Verification - ID Card View</h4>
												<button type="button" class="close text-light"
													data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-dark">
												<img src="{{ Storage::url($kycUser->id_front) }}" alt="ID Card"
													class="img-fluid" />
											</div>
										</div>
									</div>
								</div>
								<!-- /View KYC ID Modal -->
								<!-- View KYC ID Modal -->
								<div id="viewKycbackIdModal{{ $kycUser->id }}" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-dark">
												<h4 class="modal-title text-light">KYC Verification - Back ID Card View
												</h4>
												<button type="button" class="close text-light"
													data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-dark">
												<img src="{{ Storage::url($kycUser->id_back) }}" alt="ID Card"
													class="img-fluid" />
											</div>
										</div>
									</div>
								</div>
								<!-- /View KYC ID Modal -->

								<!-- View KYC Passport Modal -->
								<div id="viewKycPassportModal{{ $kycUser->id }}" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-dark">
												<h4 class="modal-title text-light">KYC Verification - Passport View</h4>
												<button type="button" class="close text-light"
													data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-dark">
												<img src="{{ Storage::url($kycUser->passport) }}" alt="Passport Photo"
													class="img-fluid" />
											</div>
										</div>
									</div>
								</div>
								<!-- /View KYC Passport Modal -->

								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('admin.footer')