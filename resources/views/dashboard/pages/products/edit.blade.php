@extends('layouts.admin')

@section('title', 'Edit ' . $product->title . ' Data')

@section('css')
<script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    .preview-images-zone {
        width: 100%;
        border: 1px solid #ddd;
        min-height: 180px;
        /* display: flex; */
        padding: 5px 5px 0px 5px;
        position: relative;
        overflow: auto;
    }

    .preview-images-zone>.preview-image {
        height: 185px;
        width: 185px;
        position: relative;
        margin-right: 5px;
        float: left;
    }

    .preview-images-zone>.preview-image>.image-zone {
        width: 100%;
        height: 100%;
    }

    .preview-images-zone>.preview-image>.image-zone>img {
        width: 100%;
        height: 100%;
    }

    .preview-images-zone>.preview-image>.tools-edit-image {
        position: absolute;
        z-index: 100;
        color: #fff;
        bottom: 0;
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
        display: none;
    }

    .preview-images-zone>.preview-image>.image-cancel {
        font-size: 18px;
        position: absolute;
        top: 0;
        right: 0;
        font-weight: bold;
        margin-right: 10px;
        cursor: pointer;
        display: none;
        z-index: 100;
    }

    .preview-image:hover>.image-zone {
        cursor: move;
        opacity: .5;
    }

    .preview-image:hover>.tools-edit-image,
    .preview-image:hover>.image-cancel {
        display: block;
    }

    .ui-sortable-helper {
        width: 90px !important;
        height: 90px !important;
    }

    .fix {
        clear: both;
    }

    .preview-images {
        width: 100%;
        display: flex;
    }

    .preview-images .other-image {
        position: relative;
        max-height: 120px !important;
        max-width: 120px !important;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .preview-images .other-image img {
        width: 120px;
        height: 120px;
        transition: 0.5s;
    }

    .preview-images .other-image .btn-danger {
        position: absolute;
        top: 150%;
        left: 50%;
        transform: translate(-50%, -50%);
        transition: 0.3s;
        margin: 0;
    }

    .preview-images .other-image:hover .btn-danger {
        top: 50%
    }

    .preview-images .other-image:hover img {
        opacity: 0.5;
    }

    .preview-images .deleted {
        display: none;
    }

</style>

@endsection

@section('path')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i></a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.products') }}"><i class="fas fa-box-open"></i> Products</a></li>
<li class="breadcrumb-item active"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Product</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Edit <span class="green">({{ $product->title }})</span></h2>
                </div>
                <form id="wizard_with_validation" action="{{ route('admin.products.update', $product->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <div class="content clearfix">
                        <fieldset class="body">
                            <div class="row">
                                <div class="col-12">
                                    <img width="200px" src="{{ asset($product->photo) }}">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label class="d-block font-weight-bold">Product Main Image</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label for="inputGroupFile01">
                                                <span class="btn btn-tertiary">Upload</span>
                                            </label>
                                            <span id="img-name"></span>
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
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group form-float">
                                        <label class="d-block font-weight-bold" for="name">Product
                                            Title *</label>
                                        <input type="text" class="form-control valid" placeholder="Product Title"
                                            name="title" required="" aria-required="true"
                                            value="{{ $product->title }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group form-float">
                                        <label class="d-block font-weight-bold" for="editor">Description</label>
                                        <textarea id="editor" name="description">{!! $product->description !!}</textarea>
                                    </div>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class=" col-lg-4 col-md-4">
                                    <div class="form-group form-float">
                                        <label class="d-block font-weight-bold" for="current_price">Current Price *
                                        </label>
                                        <input type="number" class="form-control valid" placeholder="Current Price"
                                            name="current_price" id="current_price" aria-required="true"
                                            value="{{ $product->current_price }}" step=".01">
                                    </div>
                                    @error('current_price')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class=" col-lg-4 col-md-4">
                                    <div class="form-group form-float">
                                        <label class="d-block font-weight-bold" for="old_price">Old Price
                                        </label>
                                        <input type="number" class="form-control valid" placeholder="Old Price"
                                            name="old_price" id="old_price" aria-required="true"
                                            value="{{ $product->old_price }}" step=".01">
                                    </div>
                                    @error('old_price')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class=" col-lg-4 col-md-4">
                                    <div class="form-group form-float">
                                        <label class="d-block font-weight-bold" for="qty">Qty *
                                        </label>
                                        <input type="number" class="form-control valid" placeholder="Qty" name="qty"
                                            id="qty" aria-required="true" value="{{ $product->qty }}">
                                    </div>
                                    @error('qty')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="d-block font-weight-bold" for="category_id">Category *</label>
                                    <select class="selectpicker" data-style="btn-none" title="Select Category"
                                        data-live-search="true" data-live-search-placeholder="Search ..."
                                        name="category_id" id="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mt-2">
                                    <label class="d-block font-weight-bold" for="sub_category_id">Sub Category</label>
                                    <select class="selectpicker" data-style="btn-none" title="Select Sub Category"
                                        data-live-search="true" data-live-search-placeholder="Search ..."
                                        name="sub_category_id" id="sub_category_id">
                                        <option value="0">None</option>
                                        @foreach ($sub_categories as $sub_category)
                                            <option value="{{ $sub_category->id }}"
                                                {{ $sub_category->id == $product->sub_category_id ? 'selected' : '' }}>
                                                {{ $sub_category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('sub_category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-12 col-md-12 mt-3">
                                    <label for="other_image">Other Photos</label>
                                    <div class="preview-images">
                                        @foreach ($product->other_photos as $photo)
                                            <div class="other-image" data-image-id="{{ $photo->id }}">
                                                <img src="{{ asset($photo->name) }}" alt="">
                                                <button type="button" class="btn btn-danger delete-img-btn"><i
                                                        class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div>
                                        <a href="javascript:void(0)" onclick="$('#other_image').click()">
                                            <span class="btn btn-tertiary mb-1 mt-3">Upload</span></a>
                                        <input type="file" id="other_image" name="other_image[]" style="display: none;"
                                            class="form-control" multiple>
                                    </div>
                                    <div class="preview-images-zone">

                                    </div>
                                </div>
                                @error('other_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <a href="{{ route('admin.products') }}"
                                class="btn btn-secondary float-right ml-2 mt-3">Cancel</a>
                            <button type="submit" class="btn btn-primary float-right mt-3">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                Save
                            </button>

                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.getElementById('inputGroupFile01').addEventListener('change', function() {
        let value = this.value.split('\\');
        document.getElementById('img-name').innerText = value[value.length - 1];
    })
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        document.getElementById('other_image').addEventListener('change', readImage, false);

        $(".preview-images-zone").sortable();

        $(document).on('click', '.image-cancel', function() {
            let no = $(this).data('no');
            $(".preview-image.preview-show-" + no).remove();
        });
    });



    var num = 4;

    function readImage() {
        if (window.File && window.FileList && window.FileReader) {
            var files = event.target.files; //FileList object
            var output = $(".preview-images-zone");

            for (let i = 0; i < files.length; i++) {
                var file = files[i];
                if (!file.type.match('image')) continue;

                var picReader = new FileReader();

                picReader.addEventListener('load', function(event) {
                    var picFile = event.target;
                    var html = '<div class="preview-image preview-show-' + num + '">' +
                        '<div class="image-cancel" data-no="' + num + '">x</div>' +
                        '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result +
                        '"></div>' +

                        '</div>';

                    output.append(html);
                    num = num + 1;
                });

                picReader.readAsDataURL(file);
            }
            $("#other-image").val('');
        } else {
            console.log('Browser not support');
        }
    }
</script>

<script>
    // Append input field has the deleted image's id.
    let image_div = document.getElementsByClassName('other-image');
    let delete_btn = document.getElementsByClassName('delete-img-btn');

    for (let i = 0; i < image_div.length; i++) {
        delete_btn[i].addEventListener('click', function() {
            let input = document.createElement('input');
            input.setAttribute('name', 'delete[]');
            let id = image_div[i].getAttribute('data-image-id');
            input.setAttribute('value', id);

            image_div[i].classList.add('deleted');
            image_div[i].appendChild(input);
        });
    }
</script>

@endsection
