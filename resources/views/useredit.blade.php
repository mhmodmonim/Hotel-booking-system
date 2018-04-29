@extends('layouts.app')

@section('content')

    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url({{asset('ui/images/slide1-02.jpg')}});">
        <h2 class="tit6 t-center">
           Edit Your Profile
        </h2>
    </section>

    <section class="container mt-5">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset('storage/images/' . $user->image)}}" alt="" class="img-thumbnail">

                <div class="details mt-2">
                <p class="text-center"><i class="fa fa-get-pocket fa-1x mr-3"></i>  {{$user->name}}</p>
                <p class="text-center"><i class="fa  fa-map-pin fa-1x mr-3"></i>  {{$user->country}}</p>
                </div>
                </div>
            <div class="col-10">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.update', $user->id) }}" enctype='multipart/form-data'>
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text"  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                <div class="col-md-6">
                    <input id="mobile" type="text"  class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ $user->mobile }}" required autofocus>

                    @if ($errors->has('mobile'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="Gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                @if($user->gender == 'Male')
                {{ Form::radio('gender','Male', true) }} Male
                {{ Form::radio('gender','Female', false) }} Female
                @else
                {{ Form::radio('gender','Male', false) }} Male
                {{ Form::radio('gender','Female', true) }} Female
                @endif
                @if ($errors->has('gender'))
                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group row">
                <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                <div class="col-md-6">
                    <select   class="form-control {{$errors->has('country') ? ' is-invalid' : '' }}" name="country" >
                        @foreach(countries() as $country)
                            <option value="{{ $country['name'] }}" >{{ $country['name'] }}</option>
                            <option value="{{$user->country }}" selected>{{ $user->country }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('country'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                <div class="col-md-6">
                    <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" autofocus>

                    @if ($errors->has('image'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
        </form>
        </div>
        </div>
        </div>
    </section>


@endsection