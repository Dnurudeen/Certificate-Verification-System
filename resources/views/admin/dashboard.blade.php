<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')
@section('title', 'Admin | Certificates Verification System')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header my-auto">
                    <div class="float-left mt-2">{{ __('Admin Dashboard') }}</div>
                    <div class="float-right"><a href="{{ url('/admin/verified-credentials') }}" class="btn btn-dark">View All Certificates</a></div>
                </div>

                <div class="card-body">
                    @if(session()->has('success'))
                    <p class="alert-success p-3 w-100">
                        {{ session()->get('success') }}
                    </p>
                @endif

                @if($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger w-100">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                    <form action="{{ route('admin.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="certificate_id">Certificate ID</label>
                            <input type="text" name="certificate_id" id="certificate_id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
