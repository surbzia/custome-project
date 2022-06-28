@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">Categories</h5>
            <a class="btn btn-info btn-sm rounded-pill" href="{{ route('category.create') }}">Add Category</a>
        </div>
        <hr>
        <div class="col-md-12">
            <div class="card-box mb-30 card-border" style="margin-right: 64px;">
                <div class="pb-20">
                    <table id="permission" class="row-border" style="width:80%:">
                        <thead>
                            <tr>
                                <th>S#</th>
                                <th>Name</th>
                                <th>Active</th>
                                <th>Featured</th>

                                <th style="width: 13%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <span
                                            class="badge badge-pill {{ $category->is_active == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $category->is_active == 1 ? 'True' : 'False' }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-pill {{ $category->is_featured == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $category->is_featured == 1 ? 'True' : 'False' }}</span>
                                    </td>

                                    <td class="d-flex">
                                        <a class="btn btn-outline-dark btn-sm rounded-pill"
                                            href="{{ route('category.edit', $category->id) }}">Edit</a>

                                        <form method="post" action="{{ route('category.destroy', $category->id) }}" id="category_delete_form">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-outline-danger btn-sm rounded-pill" onclick="deleteItem(event)">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function deleteItem(event){
            event.preventDefault();
            if(confirm('Are you sure you want to delete this Category.??')){
                $('#category_delete_form').submit();
            }

        }
    </script>
@endsection
