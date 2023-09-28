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
                                    <th>Unit Name</th>
                                    <th>Unit Code</th>
                                    <th>Unit Description</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($units as $unit)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $unit->name }}</td>
                                        <td>{{ $unit->code }}</td>
                                        <td>{{ $unit->description }}</td>
                                        <td>{{ $unit->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('unit.edit', ['id' => $unit->id]) }}"><i
                                                    class="btn btn-info ti-settings"></i></a>
                                            <a href="{{ route('unit.delete', ['id' => $unit->id]) }}"><i
                                                    class="btn btn-danger ti-trash"
                                                    onclick="return confirm('Are you sure to Delete this Unit')"></i></a>
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
