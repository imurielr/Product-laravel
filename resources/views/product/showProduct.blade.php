@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row p-5">
        <div class="col-md-12">
            <ul id="errors">
                <div class="card">
                    <div class="card-header">{{ $data["product"]->getType() }}</div>
                    <div class="card-body">
                        <ul id="errors">
                            <b>Price: </b> {{ $data["product"]->getPrice() }} <br/>
                            <b>Description: </b> {{ $data["product"]->getDescription() }}
                        </ul>
                        <form  action="{{ url('product/delete/'.$data['product']->getId()) }}">
                            <input class="float-right" type="submit" value="Delete Product"/>
                        </form>
                    </div>
                </div>
                <br/>
            </ul>
        </div>
    </div>
</div>
@endsection