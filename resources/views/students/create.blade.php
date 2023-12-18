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
                    <form action="/student" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="name" value="{{ old('name') }}">
                            <br>
                            @error('name')
                            <p class="alert alert-danger">
                               {{$message}}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age"  aria-describedby="age" value="{{ old('age') }}">
                            <br>
                            @error('age')
                            <p class="alert alert-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address"
                                aria-describedby="address" name="address" >{{ old('address') }}</textarea>
                            <br>
                            @error('address')
                            <p class="alert alert-danger">
                               {{$message}}
                            </p>
                            @enderror

                        </div>
                        <a href="/students" class="text-black btn btn-danger">Back</a>
                        <button type="submit" class="text-black btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
