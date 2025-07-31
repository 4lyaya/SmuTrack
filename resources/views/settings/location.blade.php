<x-layouts.app>
    <x-slot name="title">Lokasi Sekolah</x-slot>

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Lokasi Sekolah</h1>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('settings.location') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="school_name" class="block text-sm font-medium text-gray-700">Nama Sekolah</label>
                    <input type="text" id="school_name" name="school_name"
                        value="{{ old('school_name', $schoolName) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('school_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="school_address" class="block text-sm font-medium text-gray-700">Alamat Sekolah</label>
                    <textarea id="school_address" name="school_address" rows="3" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('school_address', $schoolAddress) }}</textarea>
                    @error('school_address')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.app>
