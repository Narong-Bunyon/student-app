@extends('layouts.app')

@section('content')
<div class="md:flex md:items-center md:justify-between mb-8">
  <div class="min-w-0 flex-1">
    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Teachers Roster</h1>
    <p class="mt-2 text-sm text-gray-500">Manage and view all faculty members.</p>
  </div>
  <div class="mt-4 flex md:ml-4 md:mt-0">
    <a href="{{ route('teachers.create') }}" class="inline-flex items-center justify-center rounded-full border border-transparent bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all transform hover:-translate-y-0.5">
      <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
      </svg>
      Add New Teacher
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
  @forelse($teachers as $teacher)
    <div class="bg-white rounded-2xl shadow-sm ring-1 ring-gray-900/5 overflow-hidden flex flex-col hover:shadow-md transition-shadow">
      <div class="p-6 flex-1">
        <div class="flex items-center justify-between mb-4">
          <span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-inset ring-emerald-700/10">
            Faculty
          </span>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $teacher->name }}</h3>
        <p class="text-gray-500 text-sm mb-4">{{ $teacher->email }}</p>
        <div class="text-sm text-gray-600 mb-1"><span class="font-medium">Phone:</span> {{ $teacher->phone ?: 'N/A' }}</div>
        <div class="text-sm text-gray-600"><span class="font-medium">Subject:</span> {{ $teacher->subject ?: 'General' }}</div>
      </div>
      <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between mt-auto">
        <a href="{{ route('teachers.edit', $teacher) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Edit Details</a>
        
        <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this teacher?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-500">Delete</button>
        </form>
      </div>
    </div>
  @empty
    <div class="col-span-full rounded-2xl border-2 border-dashed border-gray-300 p-12 text-center">
      <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
      </svg>
      <h3 class="mt-2 text-sm font-semibold text-gray-900">No teachers available</h3>
      <p class="mt-1 text-sm text-gray-500">Get started by onboarding a new teacher.</p>
      <div class="mt-6">
        <a href="{{ route('teachers.create') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
          </svg>
          New Teacher
        </a>
      </div>
    </div>
  @endforelse
</div>
@endsection
