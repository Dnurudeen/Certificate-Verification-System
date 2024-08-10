<!-- resources/views/verify/form.blade.php -->

@extends('layouts.master')
@section('title', 'Verify Certificate')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Certificate') }}</div>

                <div class="card-body">
                    {{-- @if(session()->has('success'))
                    <p class="alert-success p-3 w-100">
                        {{ session()->get('success') }}
                    </p>
                @endif --}}

                @if($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger w-100">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                    <form action="{{ route('verify') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="certificate_id">Certificate ID</label>
                            <input type="text" name="certificate_id" id="certificate_id" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
