@extends('client.layouts.base')

@section('content')
    <div class="row  p-3 mb-3">
        <div class="col-6">
            <h3>Информация о клиенте</h3>
            <form method="POST" action="{{ route('order.store') }}">
                @csrf
                <div class="form-group" >
                    <label for="clientName">Контактное лицо</label>
                    <input type="text" id="clientName" class="form-control" name="client[name]" aria-describedby="client_name_help">
                    <small id="client_name_help" class="form-text text-muted">ФИО</small>
                </div>
                <div class="form-group">
                    <label for="clientPhone">Телефон</label>
                    <input type="text" class="form-control {{$errors->has('client.phone') ? 'is-invalid' : ''}}" id="clientPhone" name="client[phone]">
                    <div class="invalid-feedback">
                        {{ $errors->first('client.phone') }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="clientEmail">Email</label>
                    <input type="email" id="clientEmail" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary">Оформить</button>
            </form>
        </div>
        <div class="col-6">
            <h3>Заказ</h3>
            <div class="table-responsive">

                <table class="table">
                    <tr class="d-flex">
                        <th class="col-4">{{__('common.Title')}}</th>
                        <th class="col-4">{{__('common.Quantity')}}</th>
                        <th class="col-3">{{__('nomenclature.Sum')}}</th>
                    </tr>
                    @foreach($basketProducts as $item)
                        <tr class="d-flex">
                            <td class="col-4">{{$item->name}}</td>
                            <td class="col-4">{{$item->qty}}</td>
                            <td class="col-3">{{$item->price}}</td>
                        </tr>
                    @endforeach
                    <tr class="d-flex">
                        <td class="col-4"></td>
                        <td class="col-4 ">Итого:</td>
                        <td class="col-3">{{$total}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>





@endsection


