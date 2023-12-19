<?php

namespace App\Http\Livewire;
use App\Models\Student;
use Livewire\Component;

class StudentIndexLivewireComponent extends Component
{
    public $search;

    public function render()
    {
        $students = Student::where('name', 'LIKE',"%{$this->search}%")->paginate(10);

        return view('livewire.student-index-livewire-component', compact('students'));
    }
}
