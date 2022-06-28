@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">Permissions</h5>
            <a class="btn btn-info btn-sm rounded-pill" href="{{ route('permission.create') }}">Add Permission</a>
        </div>
        <hr>
        <div class="col-md-12">
            <div class="card-box mb-30 card-border" style="margin-right: 64px;">
                <div class="pb-20" >
                    <table id="permission" class="row-border" style="width:80%:">
                        <thead>
                            <tr>
                                <th>S#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Module</th>
                                <th style="width: 13%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($permissions as $key => $permission)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->slug }}</td>
                                    <td>{{ $permission->module }}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-outline-dark btn-sm rounded-pill"
                                            href="{{ route('permission.edit', $permission->id) }}">Edit</a>

                                        <form method="post" action="{{ route('permission.destroy', $permission->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-outline-danger btn-sm rounded-pill">Delete</button>
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
    <script></script>
@endsection
