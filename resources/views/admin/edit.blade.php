<!-- resources/views/admin/certificates/edit.blade.php -->

@extends('layouts.app')
@section('title', 'Edit Certificates')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Certificate') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.certificates.update', $certificate->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="certificate_id">{{ __('Certificate ID') }}</label>
                            <input type="text" class="form-control" id="certificate_id" name="certificate_id" value="{{ $certificate->certificate_id }}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $certificate->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea class="form-control" id="description" name="description" required>{{ $certificate->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="file">{{ __('File') }}</label>
                            <input type="file" class="form-control" id="file" name="file">
                            @if($certificate->file_path)
                                <p>Current File: <a href="{{ Storage::url($certificate->file_path) }}" target="_blank">{{ $certificate->file_path }}</a></p>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-danger">{{ __('Update Certificate') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
