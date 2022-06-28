@extends('layout.main')
@section('css')
@endsection
@section('content')
    <div class="page-header">
        <div>
            <h3>users</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">users</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">

                    <a href="/users/create">
                        <button class="btn btn-info">create new user</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr style="text-align: center">
                                <th>#</th>
                                <th>first_name</th>
                                <th>last_name</th>
                                <th>national_code</th>
                                <th>role</th>
                                <th>actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rows as $key=>$row)
                                <tr style="text-align: center">
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$row->first_name}}</td>
                                    <td>{{$row->last_name}}</td>
                                    <td>{{$row->national_code}}</td>
                                    <td>
                                        @if($row['roles']!='[]')
                                            {{$row->roles[0]['name']}}
                                        @endif</td>
                                    <td>
                                        <a class="btn btn-success" href="/users/{{$row->id}}/edit" title="edit">
                                            <i class="icon ti-pencil"></i>
                                        </a>
                                        <x-destroy :id="$row->id" url="'/users'"/>

                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

@endsection
@section('js')

@endsection
