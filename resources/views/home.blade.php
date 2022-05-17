@extends('layouts.app')

@section('content')
{{-- <div id="header" data-products={{$products}}></div> --}}
<div>
@livewire('products')
</div>

@endsection
