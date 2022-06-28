@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">{{ $title }}</h5>
            <a class="btn btn-dark btn-sm rounded-pill" href="{{ route('category.index') }}">back</a>
        </div>
        <hr>
         </div>
         <div class="card mb-30 card-border">
             <form action="{{ $route }}" method="POST" id="category_form">
                        @csrf
                        @if ($is_edit)
                            {{ method_field('PUT') }}
                        @endif
    <div class="row">


            <div class="col-md-8 " >

                <div class="pb-20">


                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Author Name</label>
                                    <input type="text" id="name" form="category_form" onkeyup="generateSlug(event)"
                                        value="{{ old('name', $edit_category) }}"
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
                                    <input type="text" id="slug"  form="category_form" value="{{ old('slug', $edit_category) }}"
                                        class="form-control @error('slug') is-invalid @enderror"" name="slug"
                                        placeholder="Slug">
                                    @error('slug')
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
                                        value="{{ old('short_description', $edit_category) }}" name="short_description"
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
                                        <textarea  form="category_form"  class="textarea_editor form-control border-radius-0  @error('description') is-invalid @enderror"
                                            name="description" placeholder="Enter text ...">
                                       @if ($is_edit)
                                            {{ $edit_category->description }}
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
                                <button class="btn btn-primary btn-sm rounded-pill col-md-2"
                                    type="submit"  form="category_form" >{{ $button }}</button>
                            </div>
                        </div>

                </div>

            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="custom-control custom-checkbox mb-5">
                        <input type="checkbox" name="is_active" form="category_form"
                            class="custom-control-input" {{$edit_category->is_active == 1? 'checked' : ''}}  id="is_active">
                        <label class="custom-control-label " for="is_active">Active</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox mb-5">
                        <input type="checkbox" name="is_featured" form="category_form"
                            class="custom-control-input" {{$edit_category->is_featured == 1? 'checked' : ''}} id="is_featured">
                        <label class="custom-control-label " for="is_featured">Featured</label>
                    </div>
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
