@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card myBorder-primary">
                <h4 class="card-header myBg-primary text-white text-center">{{ __('Register') }}</h4>

                <div class="card-body row justify-content-center">
                    <form id="myForm" class="row justify-content-center" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}*</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  maxlength="255" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}*</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}*</label>

                            <div class="col-md-8">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  maxlength="255" minlength="8" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="p_iva" class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}*</label>

                            <div class="col-md-8">
                                <input id="p_iva" type="text" pattern="[0-9]{11}" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Inserire 11 numeri')" class="form-control @error('p_iva') is-invalid @enderror" name="p_iva" value="{{ old('p_iva') }}" required autofocus min="1">
                                @error('p_iva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- IMMAGINE NULLABLE DA INSERIRE/ DEFAULT CATEGORIA --}}
                        <div class="form-group row mb-4">
                            <label class="col-md-4 col-form-label text-md-right" for="img">img</label>
                            <div class="col-md-8">
                            <input class="form-control @error('img') is-invalid @enderror" type="file" name="img" id="img" accept="image/*">
                            @error('img')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <img id="preview" class="img-fluid" src="">
                        </div>

                        <div class="form-group row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}*</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class=" pws form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" minlength="8">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-4">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}*</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" oninput="return fixedPws()" class="form-control pws-confirmed mb-1" name="password_confirmation" required autocomplete="new-password">
                                
                                <div class="alert mt-2 py-1 myAlert d-none" role="alert"></div>
                            </div>
                            
                        </div>

                        {{-- SELEZIONE DELLA CATEGORIA --}}
                        <fieldset class="mb-3 form-group row">
                            <label for="check-category" class="col-md-4 col-form-label text-md-right">{{ __('Categories') }}*</label>
                            <div class="checkbox-group col-md-8 row" id="check-category">
                                    @foreach ($categories as $category)
                                    <div class="col-lg-4 col-sm-6 mb-2 d-flex flex-nowrap">
                                        <input type="checkbox" class="form-check-input remove-required me-1" name="categories[]" value="{{$category->id}}" id="category-{{$category->id}}" required>
                                        <label for="category-{{$category->id}}" class="fomr-check-label">{{$category->name}}</label>
                                    </div>
                                    @endforeach
                            </div>
                            @error('categories')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </fieldset>

                        <div class="form-group row mt-5 mb-0">
                            <div class="col-md-2 offset-md-5">
                                <button type="submit" onclick="return validate()"  class="btn myBtn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
