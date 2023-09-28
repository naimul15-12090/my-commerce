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
                                    <th>Brand Name</th>
                                    <th>Brand Description</th>
                                    <th>Brand Image</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->description }}</td>
                                        <td><img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}" height="50px"
                                                width="80px">
                                        </td>
                                        <td>{{ $brand->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('brand.edit', ['id' => $brand->id]) }}"><i
                                                    class="btn btn-info ti-settings"></i></a>
                                            <a href="{{ route('brand.delete', ['id' => $brand->id]) }}"><i
                                                    class="btn btn-danger ti-trash"
                                                    onclick="return confirm('Are you sure to Delete this Brand')"></i></a>
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
