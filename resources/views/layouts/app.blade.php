<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <title>SmuTrack - {{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full bg-gray-50">
    <div class="min-h-full flex">
        <!-- Sidebar -->
        <div class="hidden md:flex md:w-64 md:flex-col">
            <!-- Sidebar component -->
            <div class="flex min-h-0 flex-1 flex-col border-r border-gray-200 bg-white">
                <!-- Logo area -->
                <div class="flex h-16 flex-shrink-0 items-center px-4 bg-blue-600">
                    <a href="/" class="text-xl font-bold text-white">SmuTrack</a>
                </div>
                <!-- Sidebar content -->
                <div class="flex flex-1 flex-col overflow-y-auto pt-2 pb-4">
                    <nav class="mt-2 flex-1 space-y-1 px-4">
                        <a href="{{ route('dashboard') }}"
                            class="group flex items-center rounded-md px-3 py-2 text-sm font-medium {{ request()->is('/') ? 'bg-blue-100 text-blue-600' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                            <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->is('/') ? 'text-blue-500' : 'text-gray-400 group-hover:text-blue-500' }}"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z"
                                    clip-rule="evenodd" />
                            </svg>
                            Dashboard
                        </a>

                        @can('admin')
                            <!-- Student Management -->
                            <a href="{{ route('students.index') }}"
                                class="group flex items-center rounded-md px-3 py-2 text-sm font-medium {{ request()->is('students*') ? 'bg-blue-100 text-blue-600' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                                <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->is('students*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-blue-500' }}"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0z" />
                                    <path fill-rule="evenodd"
                                        d="M4 16a6 6 0 1112 0v1H4v-1zm6-5a1 1 0 011 1v1H9v-1a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                Data Siswa
                            </a>

                            <!-- Teacher Management -->
                            <a href="{{ route('teachers.index') }}"
                                class="group flex items-center rounded-md px-3 py-2 text-sm font-medium {{ request()->is('teachers*') ? 'bg-blue-100 text-blue-600' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                                <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->is('teachers*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-blue-500' }}"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                                Data Guru
                            </a>

                            <!-- Classroom Management -->
                            <a href="{{ route('classrooms.index') }}"
                                class="group flex items-center rounded-md px-3 py-2 text-sm font-medium {{ request()->is('classrooms*') ? 'bg-blue-100 text-blue-600' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                                <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->is('classrooms*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-blue-500' }}"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                                Ruang Kelas
                            </a>

                            <!-- Attendance Management -->
                            <a href="{{ route('attendance.index') }}"
                                class="group flex items-center rounded-md px-3 py-2 text-sm font-medium {{ request()->is('attendance*') ? 'bg-blue-100 text-blue-600' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                                <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->is('attendance*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-blue-500' }}"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd" />
                                </svg>
                                Kehadiran
                            </a>
                        @endcan

                        @can('superadmin')
                            <!-- User Management -->
                            <a href="{{ route('settings.users') }}"
                                class="group flex items-center rounded-md px-3 py-2 text-sm font-medium {{ request()->is('settings/users*') ? 'bg-blue-100 text-blue-600' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                                <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->is('settings/users*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-blue-500' }}"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                        clip-rule="evenodd" />
                                </svg>
                                Pengguna
                            </a>
                        @endcan

                        @can('admin')
                            <!-- School Location -->
                            <a href="{{ route('settings.location') }}"
                                class="group flex items-center rounded-md px-3 py-2 text-sm font-medium {{ request()->is('settings/location') ? 'bg-blue-100 text-blue-600' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                                <svg class="mr-3 h-5 w-5 flex-shrink-0 {{ request()->is('settings/location') ? 'text-blue-500' : 'text-gray-400 group-hover:text-blue-500' }}"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Lokasi Sekolah
                            </a>
                        @endcan
                    </nav>
                </div>
                <!-- User profile -->
                <div class="flex flex-shrink-0 border-t border-gray-200 p-4">
                    <div class="flex items-center">
                        <div>
                            <div class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</div>
                            <div class="text-xs text-gray-500 capitalize">{{ auth()->user()->role }}</div>
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="ml-auto">
                        @csrf
                        <button type="submit" class="text-sm text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex min-w-0 flex-1 flex-col overflow-hidden">
            <!-- Top navigation -->
            <div class="border-b border-gray-200 bg-white">
                <div class="flex h-16 items-center justify-between px-4">
                    <!-- Mobile menu button (hidden on desktop) -->
                    <div class="flex items-center md:hidden">
                        <button type="button"
                            class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>

                    <!-- Time display -->
                    <div class="flex items-center ml-auto">
                        <div class="flex items-center rounded-md bg-blue-50 px-3 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 mr-2"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span id="real-time-clock" class="text-sm font-medium text-blue-600">
                                Loading waktu...
                            </span>
                        </div>
                    </div>

                    <!-- User profile for mobile -->
                    <div class="flex items-center md:hidden">
                        <span class="text-sm text-gray-700 mr-2">{{ auth()->user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main content area -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-4 md:p-6">
                @if (session('success'))
                    <div class="mb-4 rounded-md bg-green-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 rounded-md bg-red-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>

    <script>
        // Function to update real-time clock
        function updateRealTimeClock() {
            const options = {
                timeZone: 'Asia/Jakarta',
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            };

            const now = new Date();
            const formatter = new Intl.DateTimeFormat('id-ID', options);
            const formattedDate = formatter.format(now);

            document.getElementById('real-time-clock').textContent = formattedDate;
        }

        // Update clock immediately and then every second
        updateRealTimeClock();
        setInterval(updateRealTimeClock, 1000);
    </script>
</body>

</html>