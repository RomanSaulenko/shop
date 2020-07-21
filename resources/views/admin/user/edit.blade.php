@extends('admin.layouts.index')

@section('content')
    <div class="p-3">
        <div class="row">
            <div class="col-6">
                <h3>Информация о клиенте</h3>
                <form method="POST" action="{{ route('admin.user.store') }}">
                    @csrf

                    @if($errors->first('error'))
                        <div class="alert alert-danger">
                            {{$errors->first('error')}}
                        </div>
                    @endif

                    <div class="form-group" >
                        <label for="clientName">{{__('Name')}}</label>
                        <input type="text" id="clientName" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="user[name]" aria-describedby="client_name_help">
                        <small id="client_name_help" class="form-text text-muted">ФИО</small>
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="clientPhone">{{__('Phone')}}</label>
                        <input type="text" class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" id="clientPhone" name="user[phone]">
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="clientEmail">Email</label>
                        <input type="email" name="user[email]" id="clientEmail" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" >
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Оформить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
