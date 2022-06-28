@extends('layout.main')
@section('css')
@endsection
@section('content')
    <div class="page-header">
        <div>
            <h3>events</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">events</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">

                    <a href="/events/{{$id}}/create">
                        <button class="btn btn-info">create new event</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr style="text-align: center">
                                <th>#</th>
                                <th>from_time</th>
                                <th>until_time</th>
                                <th>category</th>
                                <th>tags</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rows as $key=>$row)
                                <tr style="text-align: center">
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$row->from_time}}</td>
                                    <td>{{$row->until_time}}</td>
                                    <td>{{$row->category->name}}</td>
                                    <td>
                                        @foreach(json_decode($row->tag) as $tag)
                                            <span class="btn btn-info btn-sm">
                                              {{$tag}}
                                          </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="/events/edit/{{$row->id}}" title="edit">
                                            <i class="icon ti-pencil"></i>
                                        </a>
                                        <x-destroy :id="$row->id" url="'/delete-event'"/>
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
