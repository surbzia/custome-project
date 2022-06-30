@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">Books</h5>
            <a class="btn btn-info btn-sm rounded-pill" href="{{ route('book.create') }}">Add Book</a>
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
                                <th>Sku</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Active</th>
                                <th>Featured</th>

                                <th style="width: 13%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($books as $key => $book)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $book['name'] }}</td>
                                    <td>{{ $book['sku'] }}</td>
                                    <td>{{ $book['category_name'] }}</td>
                                    <td>{{ $book['author_name'] }}</td>
                                    <td>
                                        <span
                                            class="badge badge-pill {{ $book['is_active'] == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $book['is_active'] == 1 ? 'True' : 'False' }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-pill {{ $book['is_featured'] == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $book['is_featured'] == 1 ? 'True' : 'False' }}</span>
                                    </td>

                                    <td class="d-flex">
                                        <a class="btn btn-outline-dark btn-sm rounded-pill"
                                            href="{{ route('book.edit', $book['id']) }}">Edit</a>

                                        <form method="post" action="{{ route('book.destroy', $book['id']) }}" id="book_delete_form">
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
