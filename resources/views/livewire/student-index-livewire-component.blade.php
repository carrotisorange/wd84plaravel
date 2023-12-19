<div>
    <div class="p-6 text-gray-900">
        @if(session('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
        @endif
        <input type="text" class="form-control" id="search" wire:model="search" aria-describedby="search"
            placeholder="Search for students...">
        <br>
        @if($search)
        <p>
           Showing <b>{{ $students->count() }}</b> result/s for <b>{{ $search }}</b>...
        </p>
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
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Address</th>
                    <th scope="col">Is Enrolled?</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $index => $item)
                <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td><a class="link-underline-primary link-primary" href="/student/{{ $item->id }}">{{ $item->name }}</a>
                    </td>
                    <td>{{ $item->age }} yrs. old</td>
                    <td>{{ $item->address }}</td>
                    <td>
                        @if($item->studentCourses->count() > 0)
                        <span class="text-success">Enrolled ({{ $item->studentCourses->count() }})</span>
                        @else
                        <span class="text-dark">Not yet enrolled</span>
                        @endif

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $students->links() }}
    </div>
</div>
