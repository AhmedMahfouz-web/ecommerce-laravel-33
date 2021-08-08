@extends('layouts.admin')

@section('title', 'vendors')
@section('css')
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.6.0/dt-1.10.25/datatables.min.css" />

@endsection

@section('path')
<li class=" breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item active"><i class="fas fa-store-alt"></i> Vendors</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="tab-pane fade show active" id="More-table" role="tabpanel">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Vendors</h2>
                        <a href={{ route('admin.vendors.create') }} class="btn-primary btn float-right"><i
                                class="fa fa-plus" aria-hidden="true"></i> Add</a>
                    </div>
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.error')
                    <div class="body">
                        <div class="table-responsive">
                            <table id="example" class="table table-hover mb-5" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Logo</th>
                                        <th>Category</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($vendors)
                                        @foreach ($vendors as $key => $vendor)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $vendor->name }}</td>
                                                <td>{{ $vendor->mobile }}</td>
                                                <td>{{ $vendor->email != null ? $vendor->email : 'No Email.' }}</td>
                                                <td><img src="{{ asset($vendor->logo) }}" alt="{{ $vendor->name }}"
                                                        style="height: 70px; width: 70px">
                                                </td>
                                                <td>{{ $vendor->category->name }}</td>
                                                <td style="max-width: 10px">{{ $vendor->address }}</td>
                                                <td>
                                                    @if ($vendor->active == 1)
                                                        <span class="badge badge-success text-uppercase">Active</span>
                                                    @else
                                                        <span class="badge badge-danger text-uppercase">Not Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.vendors.edit', $vendor->id) }}"
                                                        class="btn btn-secondary mr-0.5"><i class="fa fa-pencil-square-o"
                                                            aria-hidden="true"></i> Edit</a>
                                                    <a href="{{ route('admin.vendors.delete', $vendor->id) }}"
                                                        class="btn btn-danger"><i class="fa fa-trash"
                                                            aria-hidden="true"></i>
                                                        Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/dt-1.10.25/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js">
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection
