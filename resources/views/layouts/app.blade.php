<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student & Teacher System</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased min-h-screen flex flex-col">
    <nav class="bg-white shadow-sm ring-1 ring-gray-900/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex">
                    <a href="/" class="text-2xl font-bold text-indigo-600 tracking-tight">EduManage</a>
                </div>
                <div class="flex space-x-8">
                    <a href="/students" class="text-gray-500 hover:text-indigo-600 transition-colors font-medium">Students</a>
                    <a href="/teachers" class="text-gray-500 hover:text-indigo-600 transition-colors font-medium">Teachers</a>
                    <a href="/courses" class="text-gray-500 hover:text-indigo-600 transition-colors font-medium">Courses</a>
                </div>
            </div>
        </div>
    </nav>
    
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
        @yield('content')
    </main>
</body>
</html>
