@extends('layouts.admin')

@section('title', 'Vendors')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.6.0/dt-1.10.25/datatables.min.css" />

    <style>
        .page {
            overflow-x: hidden;
        }

        .dtHorizontalExampleWrapper {
            max-width: 600px;
            margin: 0 auto;
        }

        #example th,
        td {
            white-space: nowrap;
        }

        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
            bottom: .5em;
        }

        .dataTables_scrollBody::-webkit-scrollbar {
            width: 10px;
            height: 12px;
        }

        .dataTables_scrollBody::-webkit-scrollbar-track {
            background-color: #e4e4e4;
            border-radius: 100px;
        }

        .dataTables_scrollBody::-webkit-scrollbar-thumb {
            background-color: #212121;
            border-radius: 100px;
        }

    </style>
@endsection

@section('path')
    <li class=" breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item active"><i class="fas fa-store-alt"></i> Vendors</li>
@endsection

@section('content')
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
                                                <td>{{ $vendor->address }}</td>
                                                <td>
                                                    @if ($vendor->verified == 1)
                                                            <span class="badge badge-success text-uppercase">Active</span>
                                                    @else
                                                        <a href="{{ route('admin.vendors.verify', $vendor->id) }}">
                                                            <span class="badge badge-danger text-uppercase">Not Active</span>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.vendors.edit', $vendor->id) }}"
                                                        class="btn btn-secondary mr-0.5 "><i class="fa fa-pencil-square-o"
                                                            aria-hidden="true"></i> Edit</a>

                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#modal_{{ $key + 1 }}">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                    </button>

                                                    <div class="modal modal-danger fade" id="modal_{{ $key + 1 }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="modal_{{ $key + 1 }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modal_title_6">Delete
                                                                        {{ $vendor->name }}!</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="py-3 text-center">
                                                                        <i class="fa fa-exclamation-circle fa-4x"></i>
                                                                        <h4 class="heading mt-4">Do you want to delete this
                                                                            Vendor ?</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ route('admin.vendors.delete', $vendor->id) }}"
                                                                        class="btn btn-dark"><i class="fa fa-trash"
                                                                            aria-hidden="true"></i>
                                                                        Delete</a>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

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
@endsection

@section('script')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/dt-1.10.25/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js">
    </script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "scrollX": true
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection
