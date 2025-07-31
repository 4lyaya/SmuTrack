<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
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
                                <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
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

                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Dashboard Overview</h1>
                    <div class="text-sm text-gray-500">
                        <span id="current-date" class="font-medium"></span>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <!-- Students Card -->
                    <div
                        class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-sm p-6 border border-blue-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-blue-600">Total Siswa</p>
                                <p class="text-3xl font-bold text-gray-800 mt-1">{{ number_format($totalStudents) }}
                                </p>
                                <p class="text-xs text-blue-500 mt-2">
                                    <span class="inline-flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M12 7a1 1 0 01-1 1H9v1h2a1 1 0 110 2H9v1h2a1 1 0 110 2H9v1a1 1 0 11-2 0v-1H5a1 1 0 110-2h2v-1H5a1 1 0 110-2h2V8H5a1 1 0 010-2h2V5a1 1 0 112 0v1h2a1 1 0 011 1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ rand(5, 15) }}% dari bulan lalu
                                    </span>
                                </p>
                            </div>
                            <div class="p-3 rounded-lg bg-blue-100 text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Teachers Card -->
                    <div
                        class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl shadow-sm p-6 border border-green-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-green-600">Total Guru</p>
                                <p class="text-3xl font-bold text-gray-800 mt-1">{{ number_format($totalTeachers) }}
                                </p>
                                <p class="text-xs text-green-500 mt-2">
                                    <span class="inline-flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M12 7a1 1 0 01-1 1H9v1h2a1 1 0 110 2H9v1h2a1 1 0 110 2H9v1a1 1 0 11-2 0v-1H5a1 1 0 110-2h2v-1H5a1 1 0 110-2h2V8H5a1 1 0 010-2h2V5a1 1 0 112 0v1h2a1 1 0 011 1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ rand(2, 8) }}% dari bulan lalu
                                    </span>
                                </p>
                            </div>
                            <div class="p-3 rounded-lg bg-green-100 text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Attendance Card -->
                    <div
                        class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl shadow-sm p-6 border border-purple-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-purple-600">Kehadiran Hari Ini</p>
                                <p class="text-3xl font-bold text-gray-800 mt-1">
                                    {{ number_format($todayAttendances) }}</p>
                                <p class="text-xs text-purple-500 mt-2">
                                    <span class="inline-flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M12 7a1 1 0 01-1 1H9v1h2a1 1 0 110 2H9v1h2a1 1 0 110 2H9v1a1 1 0 11-2 0v-1H5a1 1 0 110-2h2v-1H5a1 1 0 110-2h2V8H5a1 1 0 010-2h2V5a1 1 0 112 0v1h2a1 1 0 011 1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        @if ($totalStudents > 0)
                                            {{ round(($todayAttendances / $totalStudents) * 100) }}% tingkat kehadiran
                                        @else
                                            0% tingkat kehadiran
                                        @endif
                                    </span>
                                </p>
                            </div>
                            <div class="p-3 rounded-lg bg-purple-100 text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Attendance Chart -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold text-gray-800">Statistik Kehadiran 7 Hari Terakhir</h2>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-xs bg-blue-50 text-blue-600 rounded-full">Minggu
                                    ini</button>
                                <button class="px-3 py-1 text-xs bg-gray-50 text-gray-600 rounded-full">Bulan
                                    ini</button>
                            </div>
                        </div>
                        <div id="attendanceChart" class="mt-4"></div>
                    </div>

                    <!-- Class Distribution -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Distribusi Kelas</h2>
                        <div id="classDistributionChart" class="mt-4"></div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Aktivitas Terkini</h2>
                    <div class="space-y-4">
                        @forelse ($activities as $activity)
                            <div class="flex items-start pb-4 border-b border-gray-100 last:border-0 last:pb-0">
                                <div class="p-2 rounded-lg bg-blue-50 text-blue-600 mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-800">{{ $activity->description }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $activity->created_at->diffForHumans() }}
                                    </p>
                                    @if ($activity->user)
                                        <p class="text-xs text-gray-500 mt-1">Oleh: {{ $activity->user->name }}</p>
                                    @endif
                                </div>
                                <span class="text-xs px-2 py-1 bg-gray-50 text-gray-500 rounded-full">
                                    {{ ucfirst(str_replace('_', ' ', $activity->type)) }}
                                </span>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">Tidak ada aktivitas terakhir</p>
                        @endforelse
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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

        // Initialize dashboard charts when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Set current date
            const dateOptions = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            document.getElementById('current-date').textContent = new Date().toLocaleDateString('id-ID',
                dateOptions);

            // Inisialisasi Attendance Chart jika elemen ada
            if (document.querySelector("#attendanceChart")) {
                // Debug data yang diterima
                console.log('Attendance Data:', {
                    present: @json($chartData['attendanceData']['present']),
                    late: @json($chartData['attendanceData']['late']),
                    absent: @json($chartData['attendanceData']['absent']),
                    dates: @json($chartData['attendanceData']['dates'])
                });

                // Pastikan data valid sebelum render chart
                const presentData = @json($chartData['attendanceData']['present']) || [];
                const lateData = @json($chartData['attendanceData']['late']) || [];
                const absentData = @json($chartData['attendanceData']['absent']) || [];
                const dateLabels = @json($chartData['attendanceData']['dates']) || [];

                // Validasi data
                if (presentData.length === 0 && lateData.length === 0 && absentData.length === 0) {
                    document.querySelector("#attendanceChart").innerHTML = `
                    <div class="flex items-center justify-center h-64">
                        <p class="text-gray-500">Tidak ada data kehadiran untuk ditampilkan</p>
                    </div>
                    `;
                    return;
                }

                const options = {
                    chart: {
                        type: 'bar',
                        height: 300,
                        toolbar: {
                            show: false
                        },
                        animations: {
                            enabled: true
                        }
                    },
                    series: [{
                            name: 'Hadir',
                            data: presentData
                        },
                        {
                            name: 'Terlambat',
                            data: lateData
                        },
                        {
                            name: 'Tidak Hadir',
                            data: absentData
                        }
                    ],
                    xaxis: {
                        categories: dateLabels,
                        labels: {
                            style: {
                                colors: '#6b7280'
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            formatter: function(val) {
                                return Math.round(val);
                            }
                        }
                    },
                    colors: ['#3b82f6', '#f59e0b', '#ef4444'],
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded',
                            borderRadius: 4,
                            dataLabels: {
                                position: 'top'
                            }
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " siswa";
                            }
                        }
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'right',
                        markers: {
                            radius: 12
                        }
                    },
                    responsive: [{
                        breakpoint: 600,
                        options: {
                            plotOptions: {
                                bar: {
                                    columnWidth: '70%'
                                }
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                const chart = new ApexCharts(document.querySelector("#attendanceChart"), options);
                chart.render();
            }

            // Inisialisasi Class Distribution Chart jika elemen ada
            if (document.querySelector("#classDistributionChart")) {
                const classDistributionChart = new ApexCharts(document.querySelector("#classDistributionChart"), {
                    chart: {
                        type: 'donut',
                        height: 300,
                        toolbar: {
                            show: false
                        }
                    },
                    series: @json($chartData['classDistribution']['data']),
                    labels: @json($chartData['classDistribution']['labels']),
                    colors: ['#3b82f6', '#10b981', '#f59e0b', '#6366f1', '#ec4899'],
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '65%',
                                labels: {
                                    show: true,
                                    total: {
                                        show: true,
                                        label: 'Total Siswa',
                                        formatter: () => '{{ number_format($totalStudents) }}'
                                    }
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    legend: {
                        position: 'right',
                        offsetY: 0,
                        height: 230,
                    }
                });
                classDistributionChart.render();
            }
        });
    </script>
</body>

</html>
