<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')
@section('title', 'View Certificates')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="float-left mt-2">{{ __('All Verified Students') }}</div>
                    <div class="float-right"><a href="{{ url('/admin') }}" class="btn btn-dark"><- back</a></div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Certificate ID</th>
                                    <th>Description</th>
                                    <th>Creation Date</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Certificate ID</th>
                                    <th>Description</th>
                                    <th>Creation Date</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($credential as $credentials)
                                <tr>
                                    <td>{{ $credentials->name }}</td>
                                    <td>{{ $credentials->certificate_id }}</td>
                                    <td>{{ $credentials->description }}</td>
                                    <td>{{ $credentials->created_at }}</td>
                                    <td>{{ $credentials->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('/admin/edit', $credentials->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.certificates.destroy', $credentials->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
    </div>
</div>
@endsection
