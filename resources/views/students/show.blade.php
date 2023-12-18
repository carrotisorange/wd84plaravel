<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Students
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <div class="jumbotron">
                    <h1 class="display-4">{{ $student->name }}</h1>
                    <p class="lead">{{ $student->address }}, {{ $student->age }} yrs old</p>
                    <hr class="my-4">
                    <p>{{ Carbon\Carbon::parse($student->created_at)->format('M d, Y') }} ({{ Carbon\Carbon::parse($student->created_at)->diffForHumans() }})</p>
                    <br>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="/student/{{ $student->id }}/edit" role="button">Edit</a>
                    </p>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
