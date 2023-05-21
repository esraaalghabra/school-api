@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="section-field mb-20">
            <label for="name" class="mb-10">الاسم</label>

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
        </div>

        <div class="section-field mb-20">
            <label for="email" class="mb-10">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="section-field mb-20">
            <label for="password" class="mb-10">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="section-field mb-20">
            <label for="password-confirm" class="mb-10">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-12">
                <button type="submit" class="button"><span>تسجيل الدخول</span><i class="fa fa-check"></i></button>
                <a href="{{ url('log') }}" class="float-right">هل تملك حساب ؟</a>
            </div>
        </div>
    </form>

@stop

@section('title')
    <h3 class="mb-30"> {{trans('auth.SignUp')}}</h3>
@stop

@section('page-header')

@stop

@section('PageTitle')

@stop

@section('CSS')

@stop

@section('js')

@stop
