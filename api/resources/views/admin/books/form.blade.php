@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">{{ $title }}</h5>
            <a class="btn btn-dark btn-sm rounded-pill" href="{{ route('book.index') }}">back</a>
        </div>
        <hr>
    </div>
    <div class="card mb-30 card-border">
        <form action="{{ $route }}" method="POST" id="category_form" enctype="multipart/form-data">
            @csrf
            @if ($is_edit)
                {{ method_field('PUT') }}
            @endif
            <input type="hidden" value="{{ $sku }}" name="sku">
            <div class="row">
                <div class="col-md-8">
                    <label for=""><strong>SKU:</strong>{{ $sku }}</label>
                </div>
            </div>
            <div class="row">


                <div class="col-md-8 ">

                    <div class="pb-20">


                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Book Name</label>
                                    <input type="text" id="name" form="category_form" onkeyup="generateSlug(event)"
                                        value="{{ old('name', $edit_Book) }}"
                                        class="form-control @error('name') is-invalid @enderror"" name="name"
                                        placeholder="Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" id="slug" form="category_form"
                                        value="{{ old('slug', $edit_Book) }}"
                                        class="form-control @error('slug') is-invalid @enderror"" name="slug"
                                        placeholder="Slug">
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" id="price" form="category_form"
                                        value="{{ old('price', $edit_Book) }}"
                                        class="form-control @error('price') is-invalid @enderror"" name="price"
                                        placeholder="Price">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Sale Price</label>
                                    <input type="number" id="sale_price" form="category_form"
                                        value="{{ old('sale_price', $edit_Book) }}"
                                        class="form-control @error('sale_price') is-invalid @enderror"" name="sale_price"
                                        placeholder="Sale Price">
                                    @error('sale_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="number" id="stock_qty" form="category_form"
                                        value="{{ old('stock_qty', $edit_Book) }}"
                                        class="form-control @error('stock_qty') is-invalid @enderror"" name="stock_qty"
                                        placeholder="Sale Price">
                                    @error('stock_qty')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <input type="text" id="short_description" form="category_form"
                                        class="form-control @error('short_description') is-invalid @enderror"
                                        value="{{ old('short_description', $edit_Book) }}" name="short_description"
                                        placeholder="Short Description">
                                    @error('short_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="html-editor pd-20 card-box mb-30">
                                        <h4 class="h4">Description</h4>
                                        <textarea form="category_form"
                                            class="textarea_editor form-control border-radius-0  @error('description') is-invalid @enderror" name="description"
                                            placeholder="Enter text ...">
                                       @if ($is_edit)
{{ $edit_Book->description }}
@endif

                                        </textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 col-sm-12">
                                <button class="btn btn-primary btn-sm rounded-pill col-md-2" type="submit"
                                    form="category_form">{{ $button }}</button>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group d-flex">
                        <div class="custom-control custom-checkbox mb-5 mr-3">
                            <input type="checkbox" name="is_active" form="category_form" class="custom-control-input"
                                {{ $edit_Book->is_active == 1 ? 'checked' : '' }} id="is_active">
                            <label class="custom-control-label " for="is_active">Active</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" name="is_featured" form="category_form" class="custom-control-input"
                                {{ $edit_Book->is_featured == 1 ? 'checked' : '' }} id="is_featured">
                            <label class="custom-control-label " for="is_featured">Featured</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Type</label>
                        <select class="custom-select2 form-control @error('type') is-invalid @enderror" name="type"
                            style="width: 100%; height: 38px;">
                            <option value="">Select Tyoe</option>
                            <option value="1">Arizona</option>
                            <option value="1">Colorado</option>
                        </select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="custom-select2 form-control @error('category_id') is-invalid @enderror"
                            name="category_id" style="width: 100%; height: 38px;">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                @php
                                    $selected = $edit_Book->category_id == $category->id ? 'selected' : '';
                                @endphp
                                <option {{ $selected }} value="{{ $category->id }}">{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <select class="custom-select2 form-control @error('author_id') is-invalid @enderror"
                            name="author_id" style="width: 100%; height: 38px;">
                            <option value="">Select Author</option>

                            @foreach ($authors as $author)
                                @php
                                    $selected = $edit_Book->author_id == $author->id ? 'selected' : '';
                                @endphp
                                <option {{ $selected }} value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                        @error('author_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" id="image" form="category_form"
                            class="form-control @error('image') is-invalid @enderror"" name="image"
                            placeholder="Image">

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        function generateSlug(event) {
            let str = event.target.value;

            str = str.replace(/[^a-zA-Z0-9\s]/g, "");
            str = str.toLowerCase();
            str = str.replace(/\s/g, '-');
            $('#slug').val(str);
        }
    </script>
@endsection
