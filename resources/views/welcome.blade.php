@extends('layouts.app')

@section('content')
<div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden ring-1 ring-gray-900/5 p-12 text-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 to-white -z-10"></div>
    <h1 class="text-5xl font-extrabold text-gray-900 tracking-tight mb-6">Welcome to EduManage</h1>
    <p class="text-xl text-gray-500 mb-10 max-w-2xl mx-auto">A premium, dynamic management system for your students and teachers. Start managing your institution with elegance.</p>
    
    <div class="flex justify-center gap-6">
        <a href="/students" class="rounded-full bg-indigo-600 px-8 py-3.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 hover:-translate-y-0.5 transition-all focus-visible:outline focus-visible:outline-2 focus-visible:outline-indigo-600">
            Manage Students
        </a>
        <a href="/teachers" class="rounded-full bg-white px-8 py-3.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 hover:-translate-y-0.5 transition-all">
            Manage Teachers
        </a>
        <a href="/courses" class="rounded-full bg-white px-8 py-3.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 hover:-translate-y-0.5 transition-all">
            Manage Courses
        </a>
    </div>
</div>
@endsection
