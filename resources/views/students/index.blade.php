@extends('layouts.app')

@section('content')
<div class="md:flex md:items-center md:justify-between mb-8">
  <div class="min-w-0 flex-1">
    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Student Directory</h1>
    <p class="mt-2 text-sm text-gray-500">Manage and view all registered students.</p>
  </div>
  <div class="mt-4 flex md:ml-4 md:mt-0">
    <a href="{{ route('students.create') }}" class="inline-flex items-center justify-center rounded-full border border-transparent bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all transform hover:-translate-y-0.5">
      <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
      </svg>
      Add New Student
    </a>
  </div>
</div>

@if(session('success'))
<div class="mb-8 p-4 rounded-xl bg-green-50 text-green-700 text-sm font-medium border border-green-200 shadow-sm flex items-center">
    <svg class="h-5 w-5 mr-3 text-green-400" fill="currentColor" viewBox="0 0 20 20">
      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
    </svg>
    {{ session('success') }}
</div>
@endif

<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
  @forelse($students as $student)
    <div class="bg-white rounded-2xl shadow-sm ring-1 ring-gray-900/5 overflow-hidden flex flex-col hover:shadow-md transition-shadow">
      <div class="p-6 flex-1">
        <div class="flex items-center justify-between mb-4">
          <span class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-1 text-xs font-semibold text-blue-700 ring-1 ring-inset ring-blue-700/10">
            Student
          </span>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $student->name }}</h3>
        <p class="text-gray-500 text-sm mb-4">{{ $student->email }}</p>
        <div class="text-sm text-gray-600 mb-1"><span class="font-medium">Phone:</span> {{ $student->phone ?: 'N/A' }}</div>
        <div class="text-sm text-gray-600"><span class="font-medium">Course:</span> {{ $student->course ?: 'Not Assigned' }}</div>
      </div>
      <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between mt-auto">
        <a href="{{ route('students.edit', $student) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Edit Details</a>
        
        <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-500">Delete</button>
        </form>
      </div>
    </div>
  @empty
    <div class="col-span-full rounded-2xl border-2 border-dashed border-gray-300 p-12 text-center">
      <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
      </svg>
      <h3 class="mt-2 text-sm font-semibold text-gray-900">No students available</h3>
      <p class="mt-1 text-sm text-gray-500">Get started by adding a new student to the system.</p>
      <div class="mt-6">
        <a href="{{ route('students.create') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
          </svg>
          New Student
        </a>
      </div>
    </div>
  @endforelse
</div>
@endsection
