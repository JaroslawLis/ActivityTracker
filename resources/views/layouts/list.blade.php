@extends('layouts.main')

@section('content')
    <div class="card container" style="background:white;">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Activities List</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-fixed width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Lp</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>

                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach($activities as $activity)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $activity['id'] }}</td> --}}
                                <td>{{ $activity['name'] }}</td>
                                {{-- <td><a href="{{ route('get.user.show', ['userId' => $user['id']]) }}">Szczegóły</a></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
