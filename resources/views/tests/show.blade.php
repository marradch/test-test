@extends('layouts.modern')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Test Information
                    </div>
                    <div class="float-end">
                        <a href="{{ route('tests.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Full name</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $test->full_name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Date</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $test->test_date }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Location</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $test->location }}
                        </div>
                    </div>

                    @if($test->score)
                        <div class="row">
                            <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Score</strong></label>
                            <div class="col-md-6" style="line-height: 35px;">
                                {{ $test->score }}
                            </div>
                        </div>

                        <div class="row">
                            <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Criteria</strong></label>
                            <div class="col-md-6" style="line-height: 35px;">
                                {{ $test->criterion }}
                            </div>
                        </div>

                        <div class="row">
                            <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Manager</strong></label>
                            <div class="col-md-6" style="line-height: 35px;">
                                {{ $test->manager->name }}
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
