@extends('layouts.app')

@section('title') Redirect @endsection

@section('content')
    <div class="row h-100vh justify-content-center">
        <div class="col-md-6 align-self-center text-center">
            <a href="{{ $link->link }}" class="btn btn-dark btn-md" tabindex="-1" role="button" aria-disabled="true" target=_blank>Go</a>
        </div>
    </div>
@endsection