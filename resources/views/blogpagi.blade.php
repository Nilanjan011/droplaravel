@extends('layouts.app')

@section('style')
@livewireStyles
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>blog pagination</h1>
    </div>
    @livewire('pagi-blog')
</div>
@endsection
@section('script')
@livewireScripts
@endsection
