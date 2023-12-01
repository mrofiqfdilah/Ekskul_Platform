@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Siswa Eskul</h1>

    @if (!empty($eskulStudents) && is_array($eskulStudents))
        @forelse ($eskulStudents as $eskulName => $students)
            <h2>{{ $eskulName }}</h2>
            <ul>
                @forelse ($students as $student)
                    <li>{{ $student->name }}</li>
                @empty
                    <li>Tidak ada siswa yang mengikuti eskul ini.</li>
                @endforelse
            </ul>
        @empty
            <p>Tidak ada eskul yang diajar oleh guru ini.</p>
        @endforelse
    @else
        <p>Tidak ada data yang tersedia.</p>
    @endif
</div>
@endsection
