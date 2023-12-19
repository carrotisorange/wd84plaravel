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
                        <h1><b>Student Info</b> </h1>
                        <br>
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
                        <h1><b>Course Info</b> </h1>
                        <br>
                        <div class="mb-3">
                            <label for="course_id" class="form-label">Select a course</label>
                            <select name="course_id" class="form-control" id="course_id" aria-describedby="course_id" value="{{ old('course_id') }}">
                                <option value="">Select one</option>
                                @foreach ($courses as $item)
                                <option value="{{ $item->id }}">{{ $item->course }}</option>
                                @endforeach
                            </select>
                            <br>
                            @error('course_id')
                            <p class="alert alert-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                        <br>
                        <h1><b>Instructor Info</b> </h1>
                        <br>
                        <div class="mb-3">
                            <label for="instructor_id" class="form-label">Select an instructor</label>
                            <select name="instructor_id" class="form-control" id="instructor_id" aria-describedby="instructor_id" value="{{ old('instructor_id') }}">
                                <option value="">Select one</option>
                                @foreach ($instructors as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <br>
                            @error('instructor_id')
                            <p class="alert alert-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                        <br>
                        <a href="/students" class="text-black btn btn-danger">Back</a>
                        <button type="submit" class="text-black btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
