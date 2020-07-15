@extends('admin.layouts.index')

@section('content')
    <div class="p-3">
        <div class="row">
            <div class="col-6">
                <h3>Информация о клиенте</h3>
                <form method="POST" action="{{ route('admin.client.store') }}">
                    @csrf
                    <div class="form-group" >
                        <label for="clientName">{{__('client.Name')}}</label>
                        <input type="text" id="clientName" class="form-control {{$errors->has('client.name') ? 'is-invalid' : ''}}" name="client[name]" aria-describedby="client_name_help">
                        <small id="client_name_help" class="form-text text-muted">ФИО</small>
                        <div class="invalid-feedback">
                            {{ $errors->first('client.name') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="clientPhone">{{__('client.Phone')}}</label>
                        <input type="text" class="form-control {{$errors->has('client.phone') ? 'is-invalid' : ''}}" id="clientPhone" name="client[phone]">
                        <div class="invalid-feedback">
                            {{ $errors->first('client.phone') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="clientEmail">Email</label>
                        <input type="email" name="client[email]" id="clientEmail" class="form-control {{$errors->has('client.email') ? 'is-invalid' : ''}}" >
                        <div class="invalid-feedback">
                            {{ $errors->first('client.email') }}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Оформить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
