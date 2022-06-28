@extends('layout.main')
@section('css')
    {{--    <style>--}}
    {{--    input[type=time]::-webkit-datetime-edit-ampm-field{--}}
    {{--        display: none;--}}
    {{--    }--}}
    {{--    </style>--}}
    <!-- begin::select2 -->
    <link rel="stylesheet" href="/assets/vendors/select2/css/select2.min.css" type="text/css">
    <!-- end::select2 -->
    <!-- begin::clockpicker -->
    <link rel="stylesheet" href="/assets/vendors/clockpicker/bootstrap-clockpicker.min.css" type="text/css">
    <!-- end::clockpicker -->

@endsection
@section('content')
    <div class="page-header">
        <div>
            <h3>events</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">create new event</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">create new event</h5>
                    <form action="/events/{{$id}}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-md-4">
                                <label>from_time</label>
                                <input type="time" class="form-control" required name="from_time" step="1" id="time" value="{{old('from_time')}}">
                            </div>
                            <div class="col-md-4">
                                <label>until_time</label>
                                <input type="time" class="form-control" required name="until_time" step="1" id="time" value="{{old('until_time')}}">
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <label>category</label>
                                <select name="category_id" class="form-control">
                                    @foreach( $categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>tag</label>
                                <select name="tag[]"  class="js-example-basic-single" multiple>
                                @foreach( $categories as $category)
                                    <option >{{$category->name}}</option>
                                @endforeach
                                </select>
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
    <!-- begin::select2 -->

        <!-- end::select2 -->
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
        <script src="/assets/vendors/select2/js/select2.min.js"></script>
        <script src="/assets/js/examples/select2.js"></script>
        <script src="/assets/vendors/clockpicker/bootstrap-clockpicker.min.js"></script>
        <script src="/assets/js/examples/clockpicker.js"></script>
@endsection
