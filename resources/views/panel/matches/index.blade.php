@extends('layout.main')
@section('css')
@endsection
@section('content')
    <div class="page-header">
        <div>
            <h3>matches</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">matches</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">

                    <a href="/matches/create">
                        <button class="btn btn-info">create new match</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr style="text-align: center">
                                <th>#</th>
                                <th>homeTeam</th>
                                <th>awayTeam</th>
                                <th>date</th>
                                <th>time</th>
                                <th>is_match</th>
                                <th>video_url</th>
                                <th>player</th>
                                <th>s3_url</th>
                                <th>actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rows as $key=>$row)
                                <tr style="text-align: center">
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$row->homeTeam->name}}</td>
                                    <td>{{$row->awayTeam->name}}</td>
                                    <td>{{$row->date}}</td>
                                    <td>{{$row->time}}</td>
                                    <td>yes</td>
                                    <td>{{$row->video_url}}</td>
                                    <td>{{$row->player->first_name}} {{$row->player->last_name}}</td>
                                    <td>{{$row->s3_url}}</td>
                                    <td>
                                        <a class="btn btn-success" href="/matches/{{$row->id}}/edit" title="edit">
                                            <i class="icon ti-pencil"></i>
                                        </a>
                                        <a class="btn btn-info" href="/events/{{$row->id}}" title="events">
                                            <i class="icon ti-list"></i>
                                        </a>
                                        <x-destroy :id="$row->id" url="'/matches'"/>
                                        <a class="btn btn-warning" href="/users/{{$row->id}}/edit" title="run job">
                                            <i class="icon ti-rocket"></i>

                                        </a>
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
