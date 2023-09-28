@extends('admin.master')


@section('body')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Table</h4>
                    <div class="table-responsive m-t-40">
                        <p class="text-center text-success">{{ session('message') }}</p>
                        <table id="myTable" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sub_categories as $sub_category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sub_category->category->name }}</td>
                                        <td>{{ $sub_category->name }}</td>
                                        <td>{{ $sub_category->description }}</td>
                                        <td><img src="{{ asset($sub_category->image) }}" alt="{{ $sub_category->name }}"
                                                height="50px" width="80px">
                                        </td>
                                        <td>{{ $sub_category->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('sub-category.edit', ['id' => $sub_category->id]) }}"><i
                                                    class="btn btn-info ti-settings"></i></a>
                                            <a href="{{ route('sub-category.delete', ['id' => $sub_category->id]) }}"><i
                                                    class="btn btn-danger ti-trash"
                                                    onclick="return confirm('Are you sure to Delete this sub category')"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
