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
                   <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $student->name }}">

                    </div>
                   <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Age</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="{{ $student->age }}">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <textarea class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        >{{ $student->address }}</textarea>

                    </div>
                    <a href="/student/{{ $student->id }}" class="text-black btn btn-danger">Back</a>
                    <button type="submit" class="text-black btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
