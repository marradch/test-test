@extends('layouts.modern')

@section('content')

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
                        <label class="col-md-4 col-form-label text-md-end text-start"><strong>Full name</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $test->full_name }}
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-4 col-form-label text-md-end text-start"><strong>Date</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $test->test_date }}
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-4 col-form-label text-md-end text-start"><strong>Location</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $test->location }}
                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Set Test Score
                    </div>
                    <div class="float-end">
                        <a href="{{ route('tests.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('tests.storeScore', $test->id) }}" method="post">
                        @csrf

                        <div class="mb-3 row">
                            <label for="score" class="col-md-4 col-form-label text-md-end text-start">Score</label>
                            <div class="col-md-6">
                                <input type="number" max="100" min="0" class="form-control @error('score') is-invalid @enderror" id="score" name="score" value="{{ $test->score }}">
                                @if ($errors->has('score'))
                                    <span class="text-danger">{{ $errors->first('score') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="criterion" class="col-md-4 col-form-label text-md-end text-start">Criteria</label>
                            <div class="col-md-6">
                                <span id="criterion">{{$test->criterion}}</span>
                            </div>
                        </div>

                        <div class="row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-sm btn-primary" value="Set score">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const scoreInput = document.getElementById('score');
        const criterionDisplay = document.getElementById('criterion');

        scoreInput.addEventListener('input', function () {
            const score = parseFloat(scoreInput.value);

            let criterion = 100;
            if (score <= 60) {
                criterion = 100;
            } else if (score > 60 && score <= 80) {
                criterion = 200;
            } else if (score > 80 && score <= 90) {
                criterion = 300;
            } else if (score > 90 && score <= 100) {
                criterion = 500;
            }

            criterionDisplay.textContent = criterion;
        });
    </script>
@endsection
