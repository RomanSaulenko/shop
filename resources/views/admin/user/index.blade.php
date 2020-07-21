@extends('admin.layouts.index')

@section('content')
    <div class="p-3">

        <div class="">
            {{$clients->links()}}
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

            @foreach($clients as $client)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$client->name}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->email}}</td>
                    <td>
                        <a href="{{route('admin.user.edit', ['id' => $client->id])}}">
                            <span class="material-icons">edit</span>
                            <span class="material-icons">delete</span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="">
            {{$clients->links()}}
        </div>
    </div>

@endsection
