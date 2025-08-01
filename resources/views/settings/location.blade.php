<x-layouts.app>
    <x-slot name="title">Lokasi Sekolah</x-slot>

    <div class="space-y-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Informasi Lokasi Sekolah</h1>
                <p class="text-sm text-gray-500 mt-1">Kelola data lokasi dan informasi kontak SMK Muhammadiyah 6
                    Rogojampi</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- School Information Form -->
            <div class="lg:col-span-2 bg-white shadow rounded-lg p-6">
                <form action="{{ route('settings.location') }}" method="POST">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <h2 class="text-lg font-medium text-gray-900 mb-4">Informasi Dasar Sekolah</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="school_name" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                        Sekolah</label>
                                    <input type="text" id="school_name" name="school_name"
                                        value="{{ old('school_name', 'SMK MUHAMMADIYAH 6 ROGOJAMPI') }}" required
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    @error('school_name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="school_phone"
                                        class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                                    <input type="text" id="school_phone" name="school_phone"
                                        value="{{ old('school_phone', '(0333) 631267') }}"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    @error('school_phone')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="school_address" class="block text-sm font-medium text-gray-700 mb-1">Alamat
                                Lengkap</label>
                            <textarea id="school_address" name="school_address" rows="3" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('school_address', 'Jl. KH. Hasyim Asy\'ari No.38, Pancoran Kulon, Rogojampi, Kec. Rogojampi, Kabupaten Banyuwangi, Jawa Timur 68462') }}</textarea>
                            @error('school_address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <h2 class="text-lg font-medium text-gray-900 mb-4">Koordinat Lokasi</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="latitude"
                                        class="block text-sm font-medium text-gray-700 mb-1">Latitude</label>
                                    <input type="text" id="latitude" name="latitude"
                                        value="{{ old('latitude', '-8.3056') }}"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="longitude"
                                        class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                                    <input type="text" id="longitude" name="longitude"
                                        value="{{ old('longitude', '114.2815') }}"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Koordinat digunakan untuk menampilkan peta lokasi
                                sekolah</p>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-wider hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- School Map and Info -->
            <div class="space-y-6">
                <!-- Map Preview -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="p-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Peta Lokasi Sekolah</h3>
                    </div>
                    <div class="p-4">
                        <div class="aspect-w-16 aspect-h-9 rounded-md overflow-hidden">
                            <iframe class="w-full h-64" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?q=-8.3056,114.2815&z=15&output=embed">
                            </iframe>
                        </div>
                        <div class="mt-4 flex justify-center">
                            <a href="https://maps.google.com/?q=-8.3056,114.2815" target="_blank"
                                class="text-sm text-blue-600 hover:text-blue-800">
                                Buka di Google Maps
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="bg-white shadow rounded-lg">
                    <div class="p-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Kontak Sekolah</h3>
                    </div>
                    <div class="p-4 space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-3 text-sm">
                                <p class="text-gray-500">Email</p>
                                <p class="mt-1 font-medium text-gray-900">smkmuh6rogojampi@yahoo.com</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div class="ml-3 text-sm">
                                <p class="text-gray-500">Telepon</p>
                                <p class="mt-1 font-medium text-gray-900">(0333) 631267</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-3 text-sm">
                                <p class="text-gray-500">Jam Operasional</p>
                                <p class="mt-1 font-medium text-gray-900">Senin - Jumat: 07:00 - 16:00 WIB</p>
                                <p class="mt-1 font-medium text-gray-900">Sabtu: 07:00 - 12:00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Initialize map if needed
            document.addEventListener('DOMContentLoaded', function () {
                // You can add map initialization logic here if using a JS map library
                console.log('Location page loaded');
            });
        </script>
    @endpush
</x-layouts.app>