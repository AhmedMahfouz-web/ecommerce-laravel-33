@extends('layouts.admin')

@section('title', 'Vendors')

@section('path')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item active"><i class="fa fa-language" aria-hidden="true"></i> Languages</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="tab-pane fade show active" id="More-table" role="tabpanel">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Languages</h2>
                        <a href={{ route('admin.languages.create') }} class="btn-primary btn float-right"><i
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
                                        <th>Abbr</th>
                                        <th>Direction</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($languages)
                                        @foreach ($languages as $key => $language)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $language->name }}</td>
                                                <td>{{ $language->abbr }}</td>
                                                <td>{{ $language->direction }}</td>
                                                <td>
                                                    @if ($language->active == 1)
                                                        <span class="badge badge-success text-uppercase">Active</span>
                                                    @else
                                                        <span class="badge badge-danger text-uppercase">Not Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.languages.edit', $language->id) }}"
                                                        class="btn btn-secondary mr-1"><i class="fa fa-pencil-square-o"
                                                            aria-hidden="true"></i> Edit</a>
                                                    @if ($language->active == 1)
                                                        <a href="{{ route('admin.languages.status', $language->id) }}"
                                                            class="btn btn-warning mr-1">
                                                            <i class="far fa-times-circle"></i>
                                                            Inactivate
                                                        </a>
                                                    @else
                                                        <a href="{{ route('admin.languages.status', $language->id) }}"
                                                            class="btn btn-info mr-1">
                                                            <i class="far fa-check-circle"></i>
                                                            Activate
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('admin.languages.delete', $language->id) }}"
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
