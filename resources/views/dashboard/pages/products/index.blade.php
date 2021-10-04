@extends('layouts.admin')

@section('title', 'Products')
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
    <li class="breadcrumb-item active"><i class="fas fa-box-open"></i> Products</li>
@endsection

@section('content')
    <div class="tab-pane fade show active" id="More-table" role="tabpanel">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Products</h2>
                        <a href={{ route('admin.products.create') }} class="btn-primary btn float-right"><i
                                class="fa fa-plus" aria-hidden="true"></i> Add</a>
                    </div>
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.error')
                    <div class="body">
                        <div class="table-responsive">
                            <table id="example" class="table table-hover mb-5" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>description</th>
                                        <th>Main Photo</th>
                                        <th style="width: 200px !important;">Other Photos</th>
                                        <th>Vendor</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Current Price</th>
                                        <th>Old Price</th>
                                        <th>Qty</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($products)
                                        @foreach ($products as $key => $product)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td style="white-space: normal">{!! Str::limit($product->description, 30) !!}
                                                </td>
                                                <td><img src="{{ $product->photo }}" alt="{{ $product->title }}"
                                                        style="height: 70px; width: 70px"></td>
                                                <td style="width: 200px !important; white-space: normal;">
                                                    @foreach ($product->other_photos as $photo)
                                                        <img src="{{ asset($photo->name) }}"
                                                            style="height: 50px; width: 50px;">
                                                    @endforeach
                                                </td>
                                                <td>{{ $product->vendor->name }}</td>
                                                <td>{{ $product->main_category->name }}</td>
                                                <td>
                                                    @if ($product->sub_category_id != null || $product->sub_category_id != 0)
                                                        {{ $product->sub_category->name }}
                                                    @else
                                                        <span class="text-secondary">No Sub Category.</span>
                                                    @endif
                                                </td>
                                                <td>{{ $product->current_price }}</td>
                                                <td>{{ $product->old_price }}</td>
                                                <td>{{ $product->qty }}</td>
                                                <td>
                                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                                        class="btn btn-secondary mt-1 mr-0.5 "><i class="fa fa-pencil-square-o"
                                                            aria-hidden="true"></i> Edit
                                                    </a>

                                                    <button type="button" class="btn btn-danger mt-1" data-toggle="modal"
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
                                                                        {{ $product->name }}!</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="py-3 text-center">
                                                                        <i class="fa fa-exclamation-circle fa-4x"></i>
                                                                        <h4 class="heading mt-4">Do you want to delete this
                                                                            Product ?</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ route('admin.products.delete', $product->id) }}"
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
