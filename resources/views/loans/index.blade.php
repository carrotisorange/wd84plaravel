<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Loans
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
                                <th scope="col">Amount</th>
                                <th scope="col">Is Paid?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $index => $item)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td><a class="link-underline-primary link-primary" href="/loan/{{ $item->id }}">{{
                                        $item->student->name }}</a></td>
                                <td>{{ $item->course->course }}</td>
                                <td>{{ number_format($item->amount, 2) }}</td>
                                <td>{{ $item->is_paid_flag }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $loans->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
