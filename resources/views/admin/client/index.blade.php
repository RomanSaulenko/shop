@extends('admin.layouts.index')

@section('content')
    <div class="p-3">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('client.Name')}}</th>
                <th>{{__('client.Phone')}}</th>
                <th>Email</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <th>1</th>
                    <td>{{$client->name}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->email}}</td>
                    <td>
                        <a href="{{route('admin.client.edit', ['id' => $client->id])}}" class="btn btn-secondary">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
