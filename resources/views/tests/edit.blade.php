@extends('layouts.modern')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Edit Test
                    </div>
                    <div class="float-end">
                        <a href="{{ route('tests.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('tests.update', $test->id) }}" method="post">
                        @csrf
                        @method("PUT")

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">First name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ $test->first_name }}">
                                @if ($errors->has('first_name'))
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Last name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ $test->last_name }}">
                                @if ($errors->has('last_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Middle name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('middle_name') is-invalid @enderror" id="middle_name" name="middle_name" value="{{ $test->middle_name }}">
                                @if ($errors->has('middle_name'))
                                    <span class="text-danger">{{ $errors->first('middle_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="test_date" class="col-md-4 col-form-label text-md-end text-start">Test date</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('test_date') is-invalid @enderror" id="test_date" name="test_date" value="{{ $test->test_date }}">
                                @if ($errors->has('test_date'))
                                    <span class="text-danger">{{ $errors->first('test_date') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="location" class="col-md-4 col-form-label text-md-end text-start">Location</label>
                            <div class="col-md-6">
                                <input type="location" class="form-control @error('test_date') is-invalid @enderror" id="location" name="location" value="{{ $test->location }}">
                                @if ($errors->has('location'))
                                    <span class="text-danger">{{ $errors->first('location') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Save Test">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
