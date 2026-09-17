@include('admin.header')
<div class="main-panel bg-dark">
    <div class="content bg-dark">
        <div class="page-inner">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-light">Wallets List</h1>
            </div>

            <div class="row">
                <a href="{{ route('wallets.create') }}" class="btn btn-primary btn-sm float-right">
                    <i class="fas fa-plus-circle"></i> Add New
                </a>
                <div class="col-12">
                    <div class="card p-md-5 p-2 shadow-lg bg-dark">
                        <div class="table-responsive">
                            <table class="table table-striped text-light">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Network</th>
                                        <th>Address / Bank Details</th>
                                        <th>XRP Tag</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($walletDetails as $key => $wallet)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $wallet->type }}</td>
                                        <td>{{ $wallet->network ?? 'N/A' }}</td>

                                        {{-- Show Wallet Address or Bank Details --}}
                                        <td>
                                            @if($wallet->type !== 'Bank')
                                            {{ $wallet->address }}
                                            @else
                                            <strong>Bank Name:</strong> {{ $wallet->bank_name ?? 'N/A' }}<br>
                                            <strong>Account Holder:</strong> {{ $wallet->account_holder ?? 'N/A' }}<br>
                                            <strong>Account Number:</strong> {{ $wallet->account_number ?? 'N/A' }}
                                            @endif
                                        </td>

                                        {{-- Show XRP Tag only if it exists --}}
                                        <td>
                                            @if($wallet->xrp_tag)
                                            {{ $wallet->xrp_tag }}
                                            @else
                                            N/A
                                            @endif
                                        </td>

                                        {{-- Actions --}}
                                        <td>
                                            <a href="{{ route('wallets.edit', $wallet->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('wallets.destroy', $wallet->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this wallet?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No wallets found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $wallets->links() }} {{-- Pagination --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')