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
                    @if(session('success'))
                    <div class="alert alert-success">
                        {!! session('success') !!}
                    </div>
                    @endif
                    <p class="text-right">
                        @if(auth()->user()->role->role == 'admin')
                        <a href="/student" class="text-black btn btn-primary">Create</a>
                        @endif
                    </p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Student</th>
                                <th scope="col">Course</th>
                                <th scope="col">Instructor</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Is Active?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentsCourses as $index => $item)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td><a class="link-underline-primary link-primary" href="/student/{{ $item->student_id }}">{{$item->student->name }}</a></td>
                                <td>{{ $item->course->course }}</td>
                                <td>{{ $item->instructor->name }}</td>
                                <td>{{ $item->grade }}</td>
                                <td>{{ $item->is_active_flag }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $studentsCourses->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
