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
                    <h1> <b>Courses</b> </h1>
                    @if($studentsCourses->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>

                                <th scope="col">Course</th>
                                <th scope="col">Schedule</th>
                                <th scope="col">Instructor</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Is Active?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentsCourses as $index => $item)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $item->course->course }}</td>
                                <td>{{ $item->course->schedule }}</td>
                                <td>{{ $item->instructor->name }}</td>
                                <td>
                                    @if($item->grade)
                                    {{ $item->grade }}
                                    @else
                                    NA
                                    @endif
                                </td>
                                <td>{{ $item->is_active_flag }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>Not enrolled to any courses.</p>
                    @endif
                    <br>
                    <br>
                    <h1> <b>Loans</b> </h1>
                    @if($loans->count() > 0)
                   <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>

                                <th scope="col">Course</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Is Paid?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $index => $item)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>

                                <td>{{ $item->course->course }}</td>
                                <td>{{ number_format($item->amount, 2) }}</td>
                                <td>{{ $item->is_paid_flag }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>no loans yet.</p>
                    @endif
                    <br>
                    <h1> <b>Payments</b> </h1>
                    @if($payments->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>

                                <th scope="col">Loan ID</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Mode of Payment</th>
                                <th scope="col">Is Approved?</th>
                                <th scope="col">Proof of payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $index => $item)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>

                                <td>{{ $item->loan->id }}</td>
                                <td>{{ number_format($item->amount, 2) }}</td>
                                <td>{{ $item->mode }}</td>
                                <td>{{ $item->is_approved_flag }}</td>
                                <td>
                                    @if($item->proof_of_payment)
                                    <a target="_blank" class="link-underline-primary link-primary"
                                        href="{{ asset($item->proof_of_payment) }}">Attachment</a>
                                    @else
                                    No attachment
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>No recorded payments yet.</p>
                    @endif
                    <br>
                    <a href="/students" class="text-black btn btn-danger">Back</a>
                    <a href="/student/{{ $student->id }}/edit" class="text-black btn btn-primary">Edit</a>
                </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
