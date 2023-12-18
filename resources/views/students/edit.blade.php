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
                  <form action="/student/{{ $student->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="name" value="{{ old('name', $student->name) }}">
                            <br>
                            @error('name')
                            <p class="alert alert-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" aria-describedby="age" value="{{ old('age', $student->age) }}">
                            <br>
                            @error('age')
                            <p class="alert alert-danger">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" aria-describedby="address"
                                name="address">{{ old('address', $student->address) }}</textarea>
                            <br>
                            @error('address')
                            <p class="alert alert-danger">
                                {{$message}}
                            </p>
                            @enderror

                        </div>
                     <div class="row">
                        <div class="col-md-11">
                            <a href="/students" class="text-black btn btn-secondary">Back</a>
                            <button type="submit" class="text-black btn btn-primary">Update</button>
                        </div>
                        <div class="col-md-1">
                           <button type="button" class="text-black btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Delete
                        </button>

                        </div>
                     </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               Are you sure you want to delete this student?
            </div>
            <div class="modal-footer">
                <button type="button" class="text-black btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="/student/{{ $student->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="text-black btn btn-danger">Confirm</button>
                </form>
            </div>
        </div>
    </div


</x-app-layout>
