@extends('layouts.admin')

@section('title', 'Edit Main Category')

@section('path')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.subCategories') }}"><i class="fas fa-th"></i> Sub
        Categories</a></li>
<li class="breadcrumb-item active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Sub Category</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Edit ({{ $category->name }}) Category</h2>
                </div>
                <form id="wizard_with_validation" action="{{ route('admin.subCategories.update', $category->id) }}"
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


                                <div class="col-lg-6 col-md-6 mt-2">
                                    <div class="form-group form-float">
                                        <label class="d-block font-weight-bold" for="name">Name
                                            ({{ $category->language->name }})</label>
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
                                            placeholder="Example : {{ $category->language->abbr }}"
                                            name="category[0][translation_lang]" id="language" aria-required="true"
                                            value="{{ $category->translation_lang }}">

                                        @error('category.0.translation_lang')
                                            <span class="text-danger">هذا الحقل مطلوب</span>
                                        @enderror
                                    </div>
                                </div>

                                @foreach ($category->categories as $index => $translation_category)
                                    @if ($translation_category->active == 1)
                                        <div class="col-lg-6 col-md-6 mt-2">
                                            <div class="form-group form-float">
                                                <label class="d-block font-weight-bold" for="name">Name
                                                    ({{ $translation_category->language->name }})</label>
                                                <input type="text" class="form-control valid"
                                                    placeholder="Electronics, Cloths, Food..."
                                                    name="category[{{ $index + 1 }}][name]" aria-required="true"
                                                    value="{{ $translation_category->name }}">

                                                @error('category.{{ $index + 1 }}.name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 mt-2 d-none">
                                            <div class="form-group form-float">
                                                <label class="d-block font-weight-bold" for="language">Language</label>
                                                <input type="hidden" class="form-control valid"
                                                    placeholder="Example : {{ $translation_category->language->abbr }}"
                                                    name="category[{{ $index + 1 }}][translation_lang]"
                                                    id="language" aria-required="true"
                                                    value="{{ $translation_category->translation_lang }}">

                                                @error('category.{{ $index + 1 }}.translation_lang')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                @foreach ($languages as $index => $language)
                                    @php
                                        $lang[$index] = 'yes';
                                    @endphp
                                    @if ($language->abbr == $category->translation_lang)
                                        @php
                                            $lang[$index] = 'no';
                                        @endphp
                                    @else
                                        @foreach ($category->categories as $translation_category)
                                            @if ($language->abbr == $translation_category->translation_lang)
                                                @php
                                                    $lang[$index] = 'no';
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                @foreach ($languages as $index => $language)
                                    @if ($lang[$index] == 'yes')
                                        <div class="col-lg-6 col-md-6 mt-2">
                                            <div class="form-group form-float">
                                                <label class="d-block font-weight-bold" for="name">Name
                                                    ({{ $language->name }})</label>
                                                <input type="text" class="form-control valid"
                                                    placeholder="Electronics, Cloths, Food..."
                                                    name="new_category[{{ $index }}][name]"
                                                    aria-required="true">

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 mt-2 d-none">
                                            <div class="form-group form-float">
                                                <label class="d-block font-weight-bold" for="language">Language</label>
                                                <input type="hidden" class="form-control valid"
                                                    placeholder="Example : {{ $language->abbr }}"
                                                    name="new_category[{{ $index }}][translation_lang]"
                                                    id="language" aria-required="true" value="{{ $language->abbr }}">

                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="d-block font-weight-bold" for="main_category_id">Main
                                        Category
                                        *</label>
                                    <select class="selectpicker" data-style="btn-none" title="Select Category"
                                        data-live-search="true" data-live-search-placeholder="Search ..."
                                        name="main_category_id" id="category_id">
                                        @foreach ($main_categories as $main_category)
                                            <option value="{{ $main_category->id }}"
                                                {{ $main_category->id == $category->category_id ? 'selected' : '' }}>
                                                {{ $main_category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('main_category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class=" d-block font-weight-bold" for="category_id">Parent
                                        Category</label>
                                    <select class="selectpicker" data-style="btn-none" title="Select Category"
                                        data-live-search="true" data-live-search-placeholder="Search ..."
                                        name="parent_id" id="category_id">
                                        <option value="0">None</option>
                                        @foreach ($sub_categories as $sub_category)
                                            @if ($sub_category->id != $category->id)
                                                <option value="{{ $sub_category->id }}"
                                                    {{ $sub_category->id == $category->parent_id ? 'selected' : '' }}>
                                                    {{ $sub_category->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- <div class="col-lg-12 col-md-12 mb-3">
                                    <label class="d-block font-weight-bold">Status</label>
                                    <label class="toggle-switch">
                                        <input value="1" type="checkbox" name="category[0][active]"
                                            {{ $category->active == 1 ? 'checked' : '' }}>
                                        <span class="toggle-switch-slider rounded-circle"></span>
                                    </label>
                                </div> --}}

                            </div>
                            <a href="{{ route('admin.subCategories') }}"
                                class="btn btn-secondary float-right mt-3"><i class="fa fa-close"
                                    aria-hidden="true"></i> Cancel</a>
                            <button type="submit" class="btn btn-primary float-right mr-2 mt-3"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> Update</button>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
