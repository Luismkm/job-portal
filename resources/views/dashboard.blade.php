@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between">
                    {{ __("You're logged in!") }}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="p-3 bg-black/15 rounded-lg hover:font-bold"
                            href="{{ route('logout') }}">Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
