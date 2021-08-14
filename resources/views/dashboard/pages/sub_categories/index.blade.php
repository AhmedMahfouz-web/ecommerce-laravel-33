@extends('layouts.admin')

@section('title', 'Languages')

@section('path')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item active"><i class="fas fa-th"></i> Sub Categories</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="tab-pane fade show active" id="More-table" role="tabpanel">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Sub Categories</h2>
                        <a href={{ route('admin.subCategories.create') }} class="btn-primary btn float-right"><i
                                class="fa fa-plus" aria-hidden="true"></i> Add</a>
                    </div>
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.error')
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Main Category</th>
                                        <th>Parent Category</th>
                                        <th>Language</th>
                                        <th>Photo</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($sub_categories)
                                        @foreach ($sub_categories as $key => $category)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->main_category->name }}</td>
                                                <td>
                                                    @if ($category->parent_id != null)
                                                        {{ $category->sub_categories->name }}
                                                    @else
                                                        <span class="text-secondary">No Parent.</span>
                                                    @endif
                                                </td>
                                                <td>{{ $category->translation_lang }}</td>
                                                <td><img style="width: 100px; height: 100px;"
                                                        src="{{ asset($category->photo) }}" alt="{{ $category->name }}">
                                                </td>
                                                <td>
                                                    @if ($category->active == 1)
                                                        <a
                                                            href="{{ route('admin.subCategories.status', $category->id) }}">
                                                            <span class="badge badge-success text-uppercase">Active</span>
                                                        </a>
                                                    @else
                                                        <a
                                                            href="{{ route('admin.subCategories.status', $category->id) }}">
                                                            <span class="badge badge-danger text-uppercase">Not
                                                                Active</span>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.subCategories.edit', $category->id) }}"
                                                        class="btn btn-secondary mr-1"><i class="fa fa-pencil-square-o"
                                                            aria-hidden="true"></i> Edit</a>

                                                    <button type="button" class="btn btn-danger mt-1" data-toggle="modal"
                                                        data-target="#modal_{{ $key + 1 }}">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                    </button>

                                                    <div class="modal modal-danger fade" id="modal_{{ $key + 1 }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="modal_{{ $key + 1 }}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modal_title_6">Delete
                                                                        {{ $category->name }}!</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="py-3 text-center">
                                                                        <i class="fa fa-exclamation-circle fa-4x"></i>
                                                                        <h4 class="heading mt-4">Do you want to delete this
                                                                            Category ?</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ route('admin.subCategories.delete', $category->id) }}"
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
</div>
@endsection
