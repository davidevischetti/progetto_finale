@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{url()->previous()}}" class="mb-5 text-decoration-none btn btn-outline-secondary rounded-pill"><< Back</a>

    <div class="row justify-content-start">

        {{-- TODO: aggiungere funzione per mandare il messaggio di avvenuto login/register  --}}
            <div class="col-8 offset-2">
                @if (session('registrato'))
                <div class="alert alert-light alert-dismissible mt-2 fade show" role="alert">
                    Ciao {{$userName->name}},
                    {{ session('registrato') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session('login'))
                    <div class="alert alert-light alert-dismissible mt-2 fade show" role="alert">
                        {{$userName->name}},
                        {{ session('login') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

        <h1 class="mb-4 text-center">
            Menu
        </h1>

        <div class="col-2">
            @include('restaurant/partials/side-bar')
        </div>

        <div class="col-8">
            <ul class="nav myBorder-primary flex-column list-group mb-2">
                @foreach ($platesVisible as $plate)
                    <li  data-id="{{ $plate->id }}" class="nav-item d-flex align-items-center py-3 list-group-item" >
                        {{-- <img src="{{ asset ('storage/' . $plate->img)}}" alt="" > --}}
                        <div class="col-8 my-0 align-items-center">
                            <h3  href="#">{{$plate->name}}</h3>
                            <span>
                                {{$plate->ingredients}}
                            </span>
                            <div class="mt-2">
                                {{$plate->price}} €
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            {{ $platesVisible->links() }}
        </div>

    </div>
</div>
@endsection
