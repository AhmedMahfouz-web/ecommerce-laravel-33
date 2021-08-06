@extends('layouts.admin')

@section('title', 'Edit ' . $language->name . ' Language')

@section('path')
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{route('admin.languages')}}"><i class="fa fa-language" aria-hidden="true"></i>
        Languages</a></li>
<li class="breadcrumb-item active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Language</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Edit <span class="green">({{$language->name}})</span></h2>
                </div>
                <form id="wizard_with_validation" action="{{ route('admin.languages.update', $language->id) }}"
                    method="POST">
                    @csrf
                    <div class="content clearfix">
                        <fieldset class="body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group form-float">
                                        <label class="d-block font-weight-bold" for="name">Name</label>
                                        <input type="text" class="form-control valid" placeholder="Name" name="name"
                                            required="" value="{{$language->name}}" aria-required="true">

                                        @error("name")
                                        <span class="text-danger">هذا الحقل مطلوب</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group form-float">
                                        <label class="d-block font-weight-bold" for="abbr">Abbr</label>
                                        <input type="text" class="form-control valid" placeholder="Abbr" name="abbr"
                                            id="abbr" required="" value="{{$language->abbr}}" aria-required="true">

                                        @error("abbr")
                                        <span class="text-danger">هذا الحقل مطلوب</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group form-float">
                                        <label class="d-block font-weight-bold" for="direction">Direction</label>
                                        <select class="selectpicker" data-style="btn-none" title="Direction"
                                            name="direction">
                                            <option {{$language->direction == "ltr" ? "selected" : ''}} value="ltr">ltr
                                            </option>
                                            <option {{$language->direction == "rtl" ? "selected" : ''}} value="rtl">rtl
                                            </option>
                                        </select>
                                        </button>
                                        @error("direction")
                                        <span class="text-danger">هذا الحقل مطلوب</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <label class="d-block font-weight-bold">Status</label>
                                    <label class="toggle-switch">
                                        <input value="1" type="checkbox" name="active"
                                            {{$language->active == 1 ? "checked=''" : ''}}>
                                        <span class="toggle-switch-slider rounded-circle"></span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right"><i class="fa fa-pencil-square-o"
                                    aria-hidden="true"></i> Update</button>
                            <a href="{{route('admin.languages')}}" class="btn btn-secondary float-right mr-2">Cancel</a>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
