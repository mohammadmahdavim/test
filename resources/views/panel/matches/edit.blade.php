@extends('layout.main')
@section('css')
{{--    <style>--}}
{{--    input[type=time]::-webkit-datetime-edit-ampm-field{--}}
{{--        display: none;--}}
{{--    }--}}
{{--    </style>--}}
@endsection
@section('content')
    <div class="page-header">
        <div>
            <h3>edit match</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">edit match</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">create new match</h5>
                    <form action="/matches/{{$row->id}}" method="post">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-md-4">
                                <label>home_team</label>
                                <select class="form-control" name="home_team_id">
                                    @foreach($teams as $team)
                                        <option @if($row->home_team_id==$team->id) selected @endif value="{{$team->id}}">{{$team->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>away_team</label>
                                <select class="form-control" name="away_team_id">
                                    @foreach($teams as $team)
                                        <option @if($row->away_team_id==$team->id) selected @endif value="{{$team->id}}">{{$team->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>player</label>
                                <select class="form-control" name="player_id">
                                    @foreach($players as $player)
                                        <option @if($row->player_id==$player->id) selected @endif value="{{$player->id}}">
                                            {{$player->first_name}} {{$player->last_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <span>date</span>
                                <input autocomplete="off" value="{{$row->date}}" type="text" name="date-picker-shamsi-list" class="form-control text-right" dir="ltr">
                            </div>
                            <div class="col-md-4">
                                <label>start_time</label>
                                <input type="time" class="form-control" value="{{$row->time}}" required name="time" step="1"  id="time">
                            </div>
                            <div class="col-md-4">
                                <label>video_url</label>
                                <input class="form-control" value="{{$row->video_url}}" required name="video_url">
                            </div>
                            <div class="col-md-12">
                                <br>
                                <button class="btn btn-info btn-block">
                                    save
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
{{--            <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>--}}
{{--            <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>--}}
@endsection
@section('js')
{{--    <script>--}}
{{--        var timepicker = new TimePicker('time', {--}}
{{--            lang: 'en',--}}
{{--            theme: 'dark'--}}
{{--        });--}}
{{--        timepicker.on('change', function(evt) {--}}

{{--            var value = (evt.hour || '00') + ':' + (evt.minute || '00');--}}
{{--            evt.element.value = value;--}}

{{--        });--}}
{{--    </script>--}}
@endsection
