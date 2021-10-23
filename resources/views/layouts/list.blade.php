@extends('layouts.home')

@section('content')
    <div class="card container" style="background:white;">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Lista użytkowników</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Id</th>
                            <th>Name</th>
                            <th>Opcje</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>

                            <th>Id</th>
                            <th>Nick</th>
                            <th>Opcje</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach($activities as $activity)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $activity['id'] }}</td>
                                 {{ $activity->name }}
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
