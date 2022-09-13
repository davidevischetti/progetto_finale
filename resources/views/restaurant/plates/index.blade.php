@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{url()->previous()}}" class="mb-5"><< Back</a>

    <div class="row justify-content-start">

        <div class="col-2 mr-5">
            @include('restaurant/partials/side-bar')
        </div>

        <div class="col-8">
            @if (session('creato'))
                <div class="alert alert-success">
                    {{ session('creato') }}
                </div>
            @elseif (session('modificato'))
                <div class="alert alert-success">
                    {{ session('modificato') }}
                </div>
            @elseif (session('eliminato'))
            <div class="alert alert-danger">
                {{ session('eliminato') }}
            </div>
            @endif

            <h1 class="mb-4">
                Lista piatti creati
            </h1>

            <ul class="nav flex-column list-group mb-2">
                @foreach ($plates as $plate)
                    <li class="nav-item d-flex align-items-center py-3 list-group-item">
                        {{-- <img src="{{ asset ('storage/' . $plate->img)}}" alt="" > --}}
                        <div class="col-8 my-0 align-items-center">
                            <h2  href="#">{{$plate->name}}</h2>
                            <span>
                                {{$plate->ingredients}}
                            </span>
                        </div>
                        <a class="btn btn-success col-1 py-2 me-5 ms-5" href="{{route('restaurant.plates.edit', ['plate' => $plate])}}">Edit</a>
                        <form class="popup col-1" action="{{route('restaurant.plates.destroy', ['plate'=> $plate])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger py-2">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>

            {{ $plates->links() }}

        </div>

    </div>
</div>
@endsection

