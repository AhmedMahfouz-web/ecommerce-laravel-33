@extends('layouts.admin')

@section('title', 'Edit ' . $vendor->name . ' Data')

@section('path')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.vendors') }}"><i class="fas fa-store-alt"></i> Vendors</a></li>
<li class="breadcrumb-item active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Vendor</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Edit <span class="green">({{ $vendor->name }})</span></h2>
                </div>
                <form id="wizard_with_validation" action="{{ route('admin.vendors.update', $vendor->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $vendor->id }}">
                    <div class="content clearfix">
                        <fieldset class="body">
                            <div class="row">
                                <div class="col-12">
                                    <img width="200px" src="{{ asset($vendor->logo) }}"
                                        alt="{{ $vendor->name . "'s Photo" }}">
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <label class="d-block font-weight-bold">Vendor Logo</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label for="inputGroupFile01">
                                                <span class="btn btn-tertiary">Upload</span>
                                            </label>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                name="img">
                                            {{-- <label class="custom-file-label" for="inputGroupFile01">Choose file</label> --}}
                                        </div>
                                        @error('img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group form-float">
                                        <label class="d-block font-weight-bold" for="name">Name</label>
                                        <input type="text" class="form-control valid" placeholder="Name" name="name"
                                            required="" value="{{ $vendor->name }}" aria-required="true">

                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group form-float">
                                        <label class="d-block font-weight-bold" for="email">Email</label>
                                        <input type="text" class="form-control valid" placeholder="Email" name="email"
                                            id="email" aria-required="true" value="{{ $vendor->email }}">
                                        @error('email')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class=" col-lg-6 col-md-6">
                                    <div class="form-group form-float">
                                        <label class="d-block font-weight-bold" for="address">Address
                                        </label>
                                        <input type="text" class="form-control valid" placeholder="Address"
                                            name="address" id="address" aria-required="true"
                                            value="{{ $vendor->address }}">
                                    </div>
                                    @error('address')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class=" col-lg-6 col-md-6">
                                    <div class="form-group form-float">
                                        <label class="d-block font-weight-bold" for="mobile">Mobile
                                            Number
                                            *</label>
                                        <input type="tel" class="form-control valid" placeholder="Mobile Number"
                                            name="mobile" id="mobile" required="" aria-required="true"
                                            value="{{ $vendor->mobile }}">
                                        @error('mobile')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="d-block font-weight-bold" for="category_id">Category
                                        *</label>
                                    <select class="selectpicker" data-style="btn-none" title="Select Category"
                                        data-live-search="true" data-live-search-placeholder="Search ..."
                                        name="category_id" id="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $vendor->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <div class="col-lg-12 col-md-12">
                                    <label class="d-block font-weight-bold">Status</label>
                                    <label class="toggle-switch">
                                        <input value="1" type="checkbox" name="active"
                                            {{ $vendor->active == 1 ? "checked=''" : '' }}>
                                        <span class="toggle-switch-slider rounded-circle"></span>
                                    </label>
                                </div> --}}
                            </div>
                            <a href="{{ route('admin.vendors') }}"
                                class="btn btn-secondary float-right ml-2">Cancel</a>
                            <button type="submit" class="btn btn-primary float-right"><i class="fa fa-pencil-square-o"
                                    aria-hidden="true"></i> Update</button>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
