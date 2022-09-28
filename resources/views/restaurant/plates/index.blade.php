@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{url()->previous()}}" class="mb-5 text-decoration-none btn btn-outline-secondary rounded-pill"><< Back</a>

    <div class="row justify-content-start">
        <h1 class=" col-9 col-lg-10 offset-2 mb-4 text-center">
            Lista piatti creati
        </h1>

        <div class="col-3 col-lg-2 ">
            @include('restaurant/partials/side-bar')
        </div>

        <div class="col-9 col-lg-10">
            @if (session('creato'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('creato') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('modificato'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('modificato') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('eliminato'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('eliminato') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            @if (count($plates) == 0 )
            <h1 class="message">Non hai ancora creato dei piatti</h1>
            <div class="white border_matteo"></div>
            @endif
            <ul class="nav myBorder-primary flex-column list-group mb-2">
                @foreach ($plates as $plate)
                    <li  data-id="{{ $plate->id }}" class="nav-item border_matteo d-flex align-items-center py-3 list-group-item">
                        {{-- <img src="{{ asset ('storage/' . $plate->img)}}" alt="" > --}}
                        <div class="col-7 my-0 align-items-center">
                            <h3  href="#">{{$plate->name}}</h3>
                            <span>
                                {{$plate->ingredients}}
                            </span>
                            <div class="mt-2">
                                {{$plate->price}} €
                            </div>
                        </div>
                        <div class="col-md-4 col-5 offset-md-1 d-flex justify-content-around">
                            <a class="btn btn-success py-2" href="{{route('restaurant.plates.edit', ['plate' => $plate])}}">Edit</a>

                            <button class="btn btn-danger js-delete">Delete</button>
                        </div>


                    </li>

                @endforeach
            </ul>

            {{ $plates->links() }}

        </div>

    </div>
</div>
<section class="overlay d-none">
    <form class="popup" data-action="{{ route('restaurant.plates.destroy', ['plate' => '*']) }}" method="post">
        @csrf
        @method('DELETE')

        <h1>Sei sicuro?</h1>
        <div>
            <button type="submit" class="btn btn-success js-yes">SI</button>
            <button type="button" class="btn btn-danger js-no">No</button>
        </div>
    </form>
</section>
@endsection

