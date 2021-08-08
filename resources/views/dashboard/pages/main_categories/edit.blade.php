@extends('layouts.admin')

@section('title', 'Edit Main Category')

@section('path')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.mainCategories') }}"><i class="fa fa-th-large"
                aria-hidden="true"></i> Main Categories</a></li>
    <li class="breadcrumb-item active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Main Category</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit ({{ $category->name }}) Category</h2>
                    </div>
                    <form id="wizard_with_validation" action="{{ route('admin.mainCategories.update', $category->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <div class="content clearfix">
                            <fieldset class="body">
                                <div class="row">
                                    <div class="col-12">
                                        <img width="200px" src="{{ asset($category->photo) }}"
                                            alt="{{ $category->name . "'s Photo" }}">
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <label class="d-block font-weight-bold">({{ $category->name }}) Category
                                            Photo</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="inputGroupFile01">
                                                    <span class="btn btn-tertiary">Upload</span>
                                                </label>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                    name="photo">
                                                {{-- <label class="custom-file-label" for="inputGroupFile01">Choose file</label> --}}
                                            </div>
                                            @error('photo')
                                                <span class="text-danger">هذا الحقل مطلوب</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    @php
                                        $lang = App\Models\Languages::where('abbr', $category->translation_lang)->first();
                                    @endphp

                                    <div class="col-lg-12 col-md-12 mt-2">
                                        <div class="form-group form-float">
                                            <label class="d-block font-weight-bold" for="name">Name
                                                ({{ $lang->name }})</label>
                                            <input type="text" class="form-control valid"
                                                placeholder="Electronics, Cloths, Food..." name="category[0][name]"
                                                aria-required="true" value="{{ $category->name }}">

                                            @error('category.0.name')
                                                <span class="text-danger">هذا الحقل مطلوب</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mt-2 d-none">
                                        <div class="form-group form-float">
                                            <label class="d-block font-weight-bold" for="language">Language</label>
                                            <input type="hidden" class="form-control valid"
                                                placeholder="Example : {{ $lang->abbr }}"
                                                name="category[0][translation_lang]" id="language" aria-required="true"
                                                value="{{ $category->translation_lang }}">

                                            @error('category.0.translation_lang')
                                                <span class="text-danger">هذا الحقل مطلوب</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <label class="d-block font-weight-bold">Status</label>
                                        <label class="toggle-switch">
                                            <input value="1" type="checkbox" name="category[0][active]"
                                                {{ $category->active == 1 ? 'checked' : '' }}>
                                            <span class="toggle-switch-slider rounded-circle"></span>
                                        </label>
                                    </div>

                                </div>
                                <a href="{{ route('admin.mainCategories') }}" class="btn btn-secondary float-right"><i
                                        class="fa fa-close" aria-hidden="true"></i> Cancel</a>
                                <button type="submit" class="btn btn-primary float-right mr-2"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i> Update</button>
                            </fieldset>
                        </div>
                    </form>

                    @isset($category->categories)
                        <ul class="nav nav-tabs nav-pills mt-5" id="myTab" role="tablist">

                            @foreach ($category->categories as $index => $translation_category)

                                @php
                                    $lang = App\Models\Languages::where('abbr', $translation_category->translation_lang)->first();
                                @endphp

                                <li class="nav-item" style="min-width:150px; text-align:center; font-size:16px">
                                    <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="home{{ $index }}-tab"
                                        data-toggle="tab" href="#home{{ $index }}" role="tab"
                                        aria-controls="home{{ $index }}" aria-selected="true">{{ $lang->name }}</a>
                                </li>

                            @endforeach

                        </ul>

                        <div class="tab-content mb-5" id="myTabContent">

                            @foreach ($category->categories as $index => $translation_category)
                                <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}"
                                    id="home{{ $index }}" role="tabpanel"
                                    aria-labelledby="home{{ $index }}-tab">
                                    <form id="wizard_with_validation"
                                        action="{{ route('admin.mainCategories.update', $translation_category->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $translation_category->id }}">
                                        <div class="content clearfix">
                                            <fieldset class="body">
                                                <div class="row">

                                                    @php
                                                        $lang = App\Models\Languages::where('abbr', $translation_category->translation_lang)->first();
                                                    @endphp

                                                    <div class="col-lg-12 col-md-12 mt-2">
                                                        <div class="form-group form-float">
                                                            <label class="d-block font-weight-bold" for="name">Name
                                                                ({{ $lang->name }})</label>
                                                            <input type="text" class="form-control valid"
                                                                placeholder="Electronics, Cloths, Food..."
                                                                name="category[0][name]" aria-required="true"
                                                                value="{{ $translation_category->name }}">

                                                            @error('category.0.name')
                                                                <span class="text-danger">هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 mt-2 d-none">
                                                        <div class="form-group form-float">
                                                            <label class="d-block font-weight-bold"
                                                                for="language">Language</label>
                                                            <input type="hidden" class="form-control valid"
                                                                placeholder="Example : {{ $lang->abbr }}"
                                                                name="category[0][translation_lang]" id="language"
                                                                aria-required="true"
                                                                value="{{ $translation_category->translation_lang }}">

                                                            @error('category.0.translation_lang')
                                                                <span class="text-danger">هذا الحقل مطلوب</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 mb-3">
                                                        <label class="d-block font-weight-bold">Status</label>
                                                        <label class="toggle-switch">
                                                            <input value="1" type="checkbox" name="category[0][active]"
                                                                {{ $translation_category->active == 1 ? 'checked' : '' }}>
                                                            <span class="toggle-switch-slider rounded-circle"></span>
                                                        </label>
                                                    </div>

                                                </div>
                                                <a href="{{ route('admin.mainCategories') }}"
                                                    class="btn btn-secondary float-right"><i class="fa fa-close"
                                                        aria-hidden="true"></i>
                                                    Cancel</a>
                                                <button type="submit" class="btn btn-primary float-right mr-2"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i> Update</button>
                                            </fieldset>
                                        </div>
                                    </form>
                                </div>
                            @endforeach

                        </div>

                    @endisset
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
