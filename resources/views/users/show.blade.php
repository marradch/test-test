@extends('layouts.modern')

@section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        User Information
                    </div>
                    <div class="float-end">
                        <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <label class="col-md-4 col-form-label text-md-end text-start"><strong>Name</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $user->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-4 col-form-label text-md-end text-start"><strong>Email</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $user->email }}
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-4 col-form-label text-md-end text-start"><strong>Is admin</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $user->is_admin ? 'yes' : 'no' }}
                        </div>
                    </div>

                    @if(!$user->is_admin)
                        <div class="row">
                            <label class="col-md-4 col-form-label text-md-end text-start"><strong>Tests</strong></label>
                            <div class="col-md-6" style="line-height: 35px;">
                                <ul>
                                    @foreach ($user->tests as $test)
                                        <li>{{ $test->full_name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
