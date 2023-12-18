<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Students
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <div class="jumbotron">
                    <h1 class="display-4">{{ $student->name }}</h1>
                    <p class="lead">{{ $student->address }}, {{ $student->age }} yrs old</p>
                    <hr class="my-4">
                    <p>{{ Carbon\Carbon::parse($student->created_at)->format('M d, Y') }} ({{ Carbon\Carbon::parse($student->created_at)->diffForHumans() }})</p>
                    <br>
                    <a href="/students" class="text-black btn btn-danger">Back</a>
                    <a href="/student/{{ $student->id }}/edit" class="text-black btn btn-primary">Edit</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
