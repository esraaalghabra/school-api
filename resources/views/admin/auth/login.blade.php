@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="section-field mb-20">
            <label class="mb-10" for="name">البريدالالكتروني*</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                                        </span>
            @enderror

        </div>

        <div class="section-field mb-20">
            <label class="mb-10" for="Password">كلمة المرور * </label>
            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror" name="password"
                   required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
            @enderror

        </div>
        <div class="section-field">
            <div class="remember-checkbox mb-30">
                <input type="checkbox" class="form-control" name="two" id="two"/>
                <label for="two"> تذكرني</label>
                <a href="#" class="float-right">هل نسيت كلمةالمرور ؟</a>
            </div>
        </div>
        <button class="button"><span>دخول</span><i class="fa fa-check"></i></button>
        <a href="{{ url('reg') }}" class="float-right">إنشاء حساب ؟</a>
    </form>
@stop

@section('title')
    <h3 class="mb-30"> {{trans('auth.Login')}}</h3>
@stop

@section('page-header')

@stop

@section('PageTitle')

@stop

@section('CSS')

@stop

@section('js')

@stop
