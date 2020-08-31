@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}">Trang chủ Admin</a></li>
            <li><a href="{{route('admin.get.list.user')}}">Thành viên</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>Quản lý thành viên</h2>
        <p> Tổng số thành viên: <b>{{$countUser}}</b> </p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên hiển thị </th>
                <th>Email</th>
                <th>Phone</th>
                <th>Xóa thành viên</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($users))
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <a style="padding-left: 10px" class="btn_customer_action"  href="{{route('admin.get.delete.user',$user->id)}}"><i class="fas fa-trash-alt"></i>Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>

        </table>
         {!! $users->links() !!}
        <div class="row">
        </div>
    </div>
@stop
