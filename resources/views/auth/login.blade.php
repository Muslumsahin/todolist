@extends('layouts.app')
@section('css')
    <link href="{{ asset('build/assets/css/login.css') }}" rel="stylesheet">
@endsection
@section('content')
    <style>
        input[type=email] {
            background-image: url('{{ asset('build/assets/img/person.png') }}');
            background-repeat: no-repeat;
            background-position: 15px;
            padding: 12px 20px 12px 40px;
            border-radius: 30px;
        }

        input[type=password] {
            background-image: url('{{ asset('build/assets/img/shield-lock.png') }}');
            background-repeat: no-repeat;
            background-position: 15px;
            padding: 12px 20px 12px 40px;
            border-radius: 30px;
        }
    </style>

    <section class="vh-100 gradient-custom">
        <div class="container h-100 py-5 d-flex justify-content-center align-items-center">
            <div class="row ">
                <div class="col-md-12 col-lg-10 mx-auto d-flex">
                    <div class="col-md-7 d-none d-sm-block position-relative d-flex ">
                        <div class="position-absolute ps-3 mt-5 lh-lg top-25">
                            <h3 class="text-light fw-bold">Hayatını Kontrol Altına Al!</h3>
                            <p class="text-light">Hayatın her anını organize etmek artık daha kolay ve verimli! TodoMaster,
                                güçlü ve
                                kullanıcı dostu bir todo list uygulaması olarak karşınızda.
                                İster kişisel hedeflerinizi belirleyin, ister iş görevlerinizi planlayın, TodoMaster ile
                                her şeyi kolayca yönetebilirsiniz</p>
                        </div>
                        <img src="{{ asset('build/assets/img/login.png') }}" class="img-fluid">
                    </div>
                    <div class="col-md-5 col-sm-12 d-flex flex-column justify-content-center px-5  bg-light">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h2 class="text-center pb-3 pt-5 fw-bold pt-md-5">Giriş Yapın</h2>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control shadow-none" placeholder='Email'
                                    @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                    required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control shadow-none" placeholder='Password'
                                    @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3 justify-content-center">
                                <button class="btn-grad fw-light" type="submit">GİRİŞ</button>
                            </div>
                            <div class="input-group pb-5 justify-content-center">
                                <a href="{{route('register')}}">Kayıt Olun</a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
