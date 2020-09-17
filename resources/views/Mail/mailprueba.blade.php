@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Prueba Email
@endsection
@section('content')
    <form method="POST" action="/email">
        @csrf
    <p>{{auth()->user()->name}} tu correo es {{auth()->user()->email }}</p>
        <div>
            <input type="email" name="email" id="email" placeholder="email">
        </div>
        <div>
            <input type="checkbox" name="valor1[]" id="v1" value="1">
            <input type="checkbox" name="valor1[]" id="v2" value="2">
            <input type="checkbox" name="valor1[]" id="v3" value="3">
            <input type="checkbox" name="valor1[]" id="v4" value="4">
        </div>
        <button type="reset">reset</button>
        <button type="submit">Submit</button>
    </form>
@endsection