@extends('layouts.master')

@section("title", "Crear Producto")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('util.message')
                <div class="card-header">Create product</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('product.save') }}">
                    @csrf
                    <input type="text" placeholder="Enter type" name="type" value="{{ old('type') }}" />
                    <input placeholder="Enter price" name="price" value="{{ old('price') }}" />
                    <input type="text" placeholder="Enter a description" name="description" value="{{ old('description') }}" />
                    <input type="submit" value="Send" />
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection