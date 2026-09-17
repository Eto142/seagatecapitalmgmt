@include('admin.header')
<div class="main-panel">
	<div class="content bg-dark">
		<div class="page-inner">
			@if(session('success'))
			<div class="alert alert-success mb-2">{{session('success')}}</div>
			@endif
			<div class="mt-2 mb-4">
				<h1 class="title1 text-light">Manage clients withdrawals</h1>
			</div>
			<div>
			</div>
			<div>
			</div>
			<div class="mb-5 row">
				<div class="col card p-3 shadow bg-dark">
					<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
						<span style="margin:3px;">
							<table id="ShipTable" class="table table-hover text-light">
								<thead>
									<tr>
										<th>ID</th>
										<th>Client name</th>
										<th>Amount requested</th>
										<th>Payment Method</th>
										<th>Receiver's email</th>
										<th>Status</th>
										<th>Date created</th>
										<th>Option</th>
									</tr>
								</thead>
								<tbody>
									@foreach($withdrawals as $with) <tr>
										<th scope="row">{{$with->id}}</th>
										<td>{{$with->name}}</td>
										<td>${{number_format($with->amount, 2, '.', ',')}}</td>
										<td>{{$with->account}}</td>
										<td>{{$with->email}}</td>
										<td>
											@if($with->status=='0')
											<span class="badge badge-danger">Pending</span>
											@elseif($with->status=='1')
											<span class="badge badge-success">Processed</span>
											@endif

										</td>
										<td>{{ \Carbon\Carbon::parse($with->created_at)->format('D, M j, Y g:i A') }}
										</td>
										<td>
											<a href="{{ route('view.withdrawal', [$with->user_id, $with->id]) }}"
												class="m-1 btn btn-info btn-sm">
												<i class="fa fa-eye"></i> View
											</a>

											<a href="{{route('delete.withdrawal',$with->id)}}"
												class="btn btn-danger btn-sm m-1">Delete</a>
											@if($with->status == 0)
											<a class="btn btn-primary btn-sm"
												href="{{route('process.withdrawal',$with->id)}}">Process</a>
											@endif
										</td>
										@endforeach
									</tr>

								</tbody>
							</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('admin.footer')