@extends('client.layouts.base')

@section('content')
    <div class="row  p-3 mb-3">
        <div class="col-6">
            <h3>Информация о клиенте</h3>
            <form method="POST" action="{{ route('order.store') }}">
                @csrf
                <div class="form-group" >
                    <label for="clientName">Контактное лицо</label>
                    <input type="text" name="user[name]" id="clientName"  class="form-control {{$errors->has('user.name') ? 'is-invalid' : ''}}"
                           value="{{old('user.name')}}" aria-describedby="client_name_help">
                    <small id="client_name_help" class="form-text text-muted">ФИО</small>
                    <div class="invalid-feedback">
                        {{ $errors->first('user.name') }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="clientPhone">Телефон</label>
                    <input type="text" name="user[phone]" class="form-control {{$errors->has('user.phone') ? 'is-invalid' : ''}}" id="clientPhone"  value="{{old('user.phone')}}">
                    <div class="invalid-feedback">
                        {{ $errors->first('user.phone') }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="clientEmail">Email</label>
                    <input type="email" name="user[email]" id="clientEmail" class="form-control {{$errors->has('user.email') ? 'is-invalid' : ''}}" value="{{old('user.email')}}">
                    <div class="invalid-feedback">
                        {{ $errors->first('user.email') }}
                    </div>
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


