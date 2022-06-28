@extends('layout.main')
@section('css')
@endsection
@section('content')
    <div class="page-header">
        <div>
            <h3>کاربران</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ایجاد کاربر جدید</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">edit user</h5>
                    @if(count($errors) > 0 )
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul class="p-0 m-0" style="list-style: none;">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/users/{{$row->id}}" method="post">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-md-4">
                                <label>نام</label>
                                <input value="{{$row->first_name}}" class="form-control" name="first_name">
                            </div>
                            <div class="col-md-4">
                                <label>نام خانوادگی</label>
                                <input value="{{$row->last_name}}" class="form-control" name="last_name">
                            </div>
                            <div class="col-md-4">
                                <label>کد ملی</label>
                                <input value="{{$row->national_code}}" class="form-control" required name="national_code">
                            </div>
                            <div class="col-md-4">
                                <label>نقش</label>

                                <select class="form-control" name="role">
                                    @foreach($roles as $role)
                                        <option @if( in_array($role->id,json_decode($row->roles->pluck('id')))) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <button class="btn btn-info btn-block">
                                    ذخیره
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
@endsection
@section('js')
@endsection
