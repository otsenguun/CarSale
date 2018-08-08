@extends('backend.index')


@section('content')

@include('backend.partials.nav')
@include('backend.partials.leftbar')

{{$carproduct->product_id}}
{{$carproduct->product_name}}
<img scr="/uploads/image/{{$carproduct->image}}">

@stop