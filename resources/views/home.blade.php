@extends('layouts.app')


    @section('content')
        <main class="flex-grow-1 min-vh-100">
            <div class="container">
                @livewire('counter')
                @livewire('counter')
            </div>
        </main>
    @endsection


