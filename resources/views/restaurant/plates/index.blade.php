@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">

        <div class="col-2 mr-5">
            @include('restaurant/partials/side-bar')
        </div>

        <div class="col-8">
            <ul class="nav flex-column list-group">
                @foreach ($plates as $plate)
                    <li class="nav-item">
                        <img src="{{ asset ('storage/' . $plate->img)}}" alt="">
                        <a class="nav-link list-group-item" href="#">{{$plate->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
@endsection
