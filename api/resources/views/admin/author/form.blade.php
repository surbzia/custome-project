@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">{{ $title }}</h5>
            <a class="btn btn-dark btn-sm rounded-pill" href="{{ route('author.index') }}">back</a>
        </div>
        <hr>
        <div class="col-md-12 " style="padding-right: 64px;">
            {{-- <div class="card mb-30 card-border"> --}}
                  <div class="card-box height-100-p widget-style1 p-5">
                <div class="pb-20">
                    <form action="{{ $route }}" method="POST">
                        @csrf
                        @if ($is_edit)
                            {{ method_field('PUT') }}
                        @endif
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Author Name</label>
                                    <input type="text" id="name"  onkeyup="generateSlug(event)"
                                        value="{{ old('name', $edit_author) }}"
                                        class="form-control @error('name') is-invalid @enderror"" name="name"
                                        placeholder="User Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" id="slug"
                                        value="{{ old('slug', $edit_author) }}"
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
                                    <label>Email</label>
                                    <input type="text" id="email"
                                        class="form-control @error('email') is-invalid @enderror""
                                        value="{{ old('email', $edit_author) }}" name="email" placeholder="User Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" id="description"
                                        class="form-control @error('description') is-invalid @enderror""
                                        value="{{ old('description', $edit_author) }}" name="description" placeholder="Description">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-12 col-sm-12">
                                <button class="btn btn-primary btn-sm rounded-pill col-md-2"
                                    type="submit">{{ $button }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
