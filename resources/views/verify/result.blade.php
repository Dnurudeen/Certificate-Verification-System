<!-- resources/views/verify/result.blade.php -->

@extends('layouts.master')
@section('title', 'Certificate Status')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-danger text-light">{{ __('Certificate Details') }}</div>
                <style>
                    tr, td{
                        border: 10px solid #fff;
                        background-color: #eee;
                    }
                </style>
                <div class="card-body">
                    <table class="table shadow table-light" border="" style="">
                        <tr>
                            <td class=""><strong>ID:</strong> {{ $certificate->certificate_id }}</td>
                            <td class=""><strong>Name:</strong> {{ $certificate->name }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Description:</strong> {{ $certificate->description }}</td>
                        </tr>
                    </table><br>
                    {{-- <p><strong>ID:</strong> {{ $certificate->certificate_id }}</p> --}}
                    {{-- <p><strong>Name:</strong> {{ $certificate->name }}</p> --}}
                    {{-- <p><strong>Description:</strong> {{ $certificate->description }}</p> --}}
                    @if(pathinfo(storage_path('app/public/' . $certificate->file_path), PATHINFO_EXTENSION) == 'pdf')
                        <embed src="{{ Storage::url($certificate->file_path) }}" width="100%" height="555px" type="application/pdf">
                    @else
                        <img src="{{ Storage::url($certificate->file_path) }}" width="100%" alt="Certificate Image">
                    @endif
                    <a href="{{ route('download.certificate', $certificate->id) }}" class="btn btn-danger mt-3">Download</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
