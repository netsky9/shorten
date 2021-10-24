@extends('layouts.app')

@section('title') Shorten @endsection

@section('content')
    <div class="row h-100vh justify-content-center">
        <div class="col-md-6 align-self-center">

            @if($errors->any())

                <div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <form method="post" action="{{ route('link.create') }}">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="text" class="form-control"
                           placeholder="{{_('The link you want to shorten')}}"
                           aria-label="{{_('The link you want to shorten')}}"
                           aria-describedby="button-addon2"
                           name="link" id="link"
                           required>
                    <input type="submit" class="btn btn-dark" value="{{_('Cut')}}" id="button-addon2">
                </div>
            </form>

            @if(session()->has('shorten_link'))
                <div class="alert alert-secondary text-center" role="alert">
                    {{_('Your Link: ')}} <a href="{{ session()->get('shorten_link') }}" class="alert-link" target=_blank>{{ session()->get('shorten_link') }}</a>
                </div>
            @endif
        </div>
    </div>
@endsection