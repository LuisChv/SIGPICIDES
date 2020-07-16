@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Prueba Email
@endsection
@section('content')
    <form method="POST" action="/email">
        @csrf
        <div>
            <input type="email" name="email" id="email" placeholder="email">
        </div>
        <button type="reset">reset</button>
        <button type="submit">Submit</button>
    </form>
@endsection