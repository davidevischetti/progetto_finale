@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{url()->previous()}}" class="mb-5 text-decoration-none"><< Back</a>

    <div class="row justify-content-start">
        <h1 class="mb-4 text-center">
            Lista piatti creati
        </h1>

        <div class="col-2 ">
            @include('restaurant/partials/side-bar')
        </div>

        <div class="col-8">
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



            <ul class="nav myBorder-primary flex-column list-group mb-2">
                @foreach ($plates as $plate)
                    <li  data-id="{{ $plate->id }}" class="nav-item d-flex align-items-center py-3 list-group-item">
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
                        <a class="btn btn-success col-1 py-2 me-5 ms-5" href="{{route('restaurant.plates.edit', ['plate' => $plate])}}">Edit</a>

                        <button class="btn btn-danger js-delete">Delete</button>

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

