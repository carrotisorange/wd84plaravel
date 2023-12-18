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
                    <p class="text-right">
                        @if(auth()->user()->role->role == 'admin')
                        <a href="/student" class="text-black btn btn-primary">Create</a>
                        @endif
                    </p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $index => $item)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td><a class="link-underline-primary link-primary" href="/student/{{ $item->id }}">{{ $item->name }}</a></td>
                                <td>{{ $item->age }}</td>
                                <td>{{ $item->address }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
