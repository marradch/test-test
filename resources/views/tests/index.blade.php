@extends('layouts.modern')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card card-company-table">
        <div class="card-header">
            <h4 class="card-title">Tests</h4>
            <div class="d-flex align-items-center">
                @if(auth()->user()->is_admin)
                <a class="btn btn-success" href="{{ route('tests.create') }}"> Create New Test</a>
                @endif
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($tests as $test)
                        <tr>
                            <td>{{ $test->full_name }}</td>
                            <td>{{ $test->test_date }}</td>
                            <td>{{ $test->location }}</td>
                            <td>
                                <form onsubmit="return confirm('Are you sure you want to delete this item?')" action="{{ route('tests.destroy',$test->id) }}" method="POST">

                                    <a class="btn btn-sm btn-info" href="{{ route('tests.show',$test->id) }}">Show</a>
                                    @if(auth()->user()->is_admin || auth()->user()->tests->contains('id', $test->id))
                                    <a class="btn btn-sm btn-info" href="{{ route('tests.setScore',$test->id) }}">Set score</a>
                                    @endif

                                    @if(auth()->user()->is_admin)
                                    <a class="btn btn-sm btn-primary" href="{{ route('tests.edit',$test->id) }}">Edit</a>
                                    @endif

                                    @csrf
                                    @method('DELETE')

                                    @if(auth()->user()->is_admin)
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>


    {!! $tests->links() !!}

@endsection
