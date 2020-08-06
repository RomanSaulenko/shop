@extends('admin.layouts.index')

@section('content')
    <div class="p-3">

        <div class="">
            {{$users->links()}}
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('user.Name')}}</th>
                <th>{{__('user.Phone')}}</th>
                <th>Email</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{route('admin.user.edit', ['id' => $user->id])}}">
                            <span class="material-icons">edit</span>
                            <span class="material-icons">delete</span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="">
            {{$users->links()}}
        </div>
    </div>

@endsection
