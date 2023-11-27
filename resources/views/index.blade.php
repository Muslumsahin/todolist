@extends('layouts.master')
@section('content')
    <script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
    "></script>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card">
                        <div class="card-body p-5">
                            <label class="form-label" for="form2">Yeni Görev</label>
                            <form method="POST" action="{{ route('todos.store') }}"
                                class="d-flex justify-content-center align-items-center mb-4">
                                @csrf
                                <div class="form-outline flex-fill">

                                    <input type="text" id="form2" name="text" class="form-control" required />

                                </div>
                                <button type="submit" id="sweetAdd" class="btn btn-info ms-2">Ekle</button>
                            </form>

                            <!-- Tabs navs -->
                            <ul class="nav nav-tabs mb-4 pb-2" id="ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="ex1-tab-1" type="button" data-bs-toggle="tab"
                                        data-bs-target="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1"
                                        aria-selected="true">Görevler</button>
                                </li>
                            </ul>
                            <!-- Tabs navs -->

                            <!-- Tabs content -->
                            <div class="tab-content" id="ex1-content">
                                <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                                    aria-labelledby="ex1-tab-1" tabindex="0">
                                    <ul class="list-group mb-0">
                                        @foreach ($todos as $todo)
                                            <li class="list-group-item d-flex justify-content-between border-0 mb-2 rounded"
                                                style="background-color: #f4f6f7;">
                                                <span class="">{{ $todo->text }}</span>
                                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" id="sweetDelete"
                                                        style=" border:none; background-color:#f4f6f7">
                                                        <i class="bi bi-x-lg"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                            <!-- Tabs content -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
      </main>

      <script>

        $( "#sweetAdd" ).on("click", function( event ) {
 
       const Toast = Swal.mixin({
           toast: true,
           position: "top-end",
           showConfirmButton: false,
           timer: 2000,
           timerProgressBar: true,
           didOpen: (toast) => {
             toast.onmouseenter = Swal.stopTimer;
             toast.onmouseleave = Swal.resumeTimer;
           }
         });
         Toast.fire({
           icon: "success",
           title: "Görev Başarıyla Eklendi"
         });
    
     }); 
     $( "#sweetDelete" ).on("click", function( event ) {
       const Toast = Swal.mixin({
           toast: true,
           position: "top-end",
           showConfirmButton: false,
           timer: 2000,
           timerProgressBar: true,
           didOpen: (toast) => {
             toast.onmouseenter = Swal.stopTimer;
             toast.onmouseleave = Swal.resumeTimer;
           }
         });
         Toast.fire({
           icon: "success",
           title: "Görev Silindi"
         });
     });
   </script>
@endsection
