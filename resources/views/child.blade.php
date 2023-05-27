@extends('layouts.produk')
@section('content')
        @foreach ($nama as $n)
            <h3>{{$n}}</h3>
            
        @endforeach
@show