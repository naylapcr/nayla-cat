@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload File or Images for Pelanggan ID:') }} {{ $pelangganId }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('uploads.store') }}" enctype="multipart/form-data">
                        @csrf //

                        <input type="hidden" name="pelanggan_id" value="{{ $pelangganId }}">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>

                            <div class="col-md-6"> //
                                <input type="file" class="form-control" name="filename[]" required multiple> //
                            </div>
                        </div>

                        <div class="form-group row mb-0"> //
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload') }} //
                                </button>
                                <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary ms-2">Kembali ke Data Pelanggan</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">{{ __('Uploaded Files for this Customer') }}</div>
                <div class="card-body">
                    @if (session('success'))
                        <div style="color: green;">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div style="color: red;">{{ session('error'}}</div>
                    @endif

                    @if ($files->isEmpty())
                        <p>No files have been uploaded yet for this customer.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>File Name (Stored Path)</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($files as $file)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $file->filename }}</td>
                                        <td>
                                            @php
                                                // Mendapatkan ekstensi file
                                                $extension = pathinfo($file->filename, PATHINFO_EXTENSION);
                                            @endphp

                                            @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                <img src="{{ Storage::url($file->filename) }}" alt="File Thumbnail" width="100">
                                            @else
                                                <a href="{{ Storage::url($file->filename) }}" target="_blank">View / Download File</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
