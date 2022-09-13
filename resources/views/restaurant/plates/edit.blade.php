@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{url()->previous()}}" class="mb-5"><< Back</a>

    <div class="row justify-content-start">
        <div class="col-2">
            @include('restaurant/partials/side-bar')
        </div>

        <div class="col-8">
            <form action="{{route('restaurant.plates.update', ['plate' => $plate])}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="name">name*</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{old('name', $plate->name)}}" maxlength="255" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="ingredients">ingredients*</label>
                    <input class="form-control" type="text"  name="ingredients" id="ingredients" value="{{old('ingredients', $plate->ingredients)}}" maxlength="255" minlength="8" required>
                    @error('ingredients')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description">description*</label>
                    <input class="form-control" type="text"  name="description" id="description" value="{{old('description', $plate->description)}}" maxlength="500" minlength="8" required>
                    @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="price">price*</label>
                    <input class="form-control" type="number" name="price" id="price" value="{{old('price', $plate->price)}}" min="1" max="100" required>
                    @error('price')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="img">img</label>
                    <input class="form-control" type="file" name="img" id="img" accept="img/*">
                    @error('img')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="visible">Vuoi inserire questo piatto nel menu'?</label>
                    <select class="form-select" name="visible" id="visible"  aria-label="Default select example">
                        <option value="0" selected>NO</option>
                        <option value="1">SI</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection
