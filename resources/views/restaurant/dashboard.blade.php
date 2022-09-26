@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{url()->previous()}}" class="mb-5 text-decoration-none btn btn-outline-secondary rounded-pill"><< Back</a>

    <div class="row justify-content-start">

        {{-- TODO: aggiungere funzione per mandare il messaggio di avvenuto login/register  --}}
            <div class="col-10 offset-2">
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
        
        <div class="col-3 col-md-2">
                @include('restaurant/partials/side-bar')
        </div>
        
        <div class="col-3 mb-4 d-none d-md-flex align-items-center justify-content-center ">
            <img class="img_rest  w-75" src="{{"storage/".$userName->img}}" alt="">
        </div>    
        <div class="mb-4 col-5 d-flex flex-wrap align-items-center col-md-3">
            <h1 class="underline title_rest text-uppercase col-12 d-flex align-items-center justify-content-center">{{$userName->name}}</h1>
        </div>
        <div class="col-3 d-flex flex-wrap justify-content-center mb-4">
            <h5 class="col-12">
                Email: {{$userName->email}} 
            </h5>
            <h5 class="col-12">
                Indirizzo: {{$userName->address}} 
            </h5>
            <h5 class="col-12">
                P. iva: {{$userName->p_iva}} 
            </h5>
        </div>        



        <div class="col-9 offset-2">

            <h2 class="text-uppercase border_rest text-center">IL TUO MENù</h2>
            <ul class="nav myBorder-primary flex-column list-group mb-2">
                @if (count($platesVisible) == 0 )
                <h1 class="message">Non hai ancora inserito dei piatti nel tuo menù</h1>
                <div class="white border_matteo"></div>
                @endif
                @foreach ($platesVisible as $plate)
                    <li  data-id="{{ $plate->id }}" class="nav-item border_matteo d-flex align-items-center py-3 list-group-item" >
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
