@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{url()->previous()}}" class="mb-5"><< Back</a>

    <div class="row justify-content-start">

        <div class="col-2 mr-5">
            @include('restaurant/partials/side-bar')
        </div>

        <div class="col-8">
            <ul class="nav flex-column list-group">
                @foreach ($plates as $plate)
                    <li class="nav-item d-flex mb-3 list-group-item">
                        {{-- <img src="{{ asset ('storage/' . $plate->img)}}" alt="" > --}}
                        <a class="nav-link col-8  text-dark" href="#">{{$plate->name}}</a>
                        <a class="btn btn-success col-1 me-5 ms-5" href="{{route('restaurant.plates.edit', ['plate' => $plate])}}">Edit</a>
                        <form class="popup col-1" action="{{route('restaurant.plates.destroy', ['plate'=> $plate])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
@endsection

