@extends('client.layouts.base')

@section('content')
    <div class="table-responsive">

        <table class="table">
            <tr class="d-flex">
                <th class="col-1">#</th>
                <th class="col-4">{{__('common.Title')}}</th>
                <th class="col-4">{{__('common.Quantity')}}</th>
                <th class="col-3">{{__('nomenclature.Sum')}}</th>
            </tr>
        @foreach($basketProducts as $item)
                <tr class="d-flex">
                    <td class="col-1"><img src="{{ asset($item->model->image)}}" class="img-thumbnail"></td>
                    <td class="col-4">{{$item->name}}</td>
                    <td class="col-4">{{$item->qty}}</td>
                    <td class="col-3">{{$item->price}}</td>
                </tr>
        @endforeach
            <tr class="d-flex">
                <td class="col-5"></td>
                <td class="col-4 ">Итого:</td>
                <td class="col-3">{{$total}}</td>
            </tr>
            <tr class="d-flex">
                <td class="col-9"></td>
                <td class="col-3">
                    <a href="{{route('order.create')}}" class="btn btn-secondary">{{__('common.Continue')}}</a>
                </td>
            </tr>
        </table>
    </div>


@endsection


