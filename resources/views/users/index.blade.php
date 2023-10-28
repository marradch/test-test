@extends('layouts.modern')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card card-company-table">
        <div class="card-header">
            <h4 class="card-title">Users</h4>
            <div class="d-flex align-items-center">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Is Admin</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_admin ? 'yes' : 'no' }}</td>
                            <td>
                                <form onsubmit="return confirm('Are you sure you want to delete this item?')" action="{{ route('users.destroy',$user->id) }}" method="POST">

                                    <a class="btn btn-sm btn-info" href="{{ route('users.show',$user->id) }}">Show</a>

                                    <a class="btn btn-sm btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    {!! $users->links() !!}

@endsection
