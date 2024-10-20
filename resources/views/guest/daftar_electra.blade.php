@extends('User/template/main_template')

@section('title', 'Pendaftaran Electra | Evolution 2023')

@section('container')
    {{-- make a form title --}}
    <div class="flex flex-col justify-center items-center p-12 mx-auto ">
        <h1 class="text-4xl font-bold ">Pendaftaran Electra</h1>
        <p class="">Evolution 2023</p>
    </div>
    <!-- component -->
    <div class="flex flex-col justify-center items-center p-12 mx-20">

        <div class="mx-auto w-full max-w-[550px]">
            <form action="" method="POST">
                @csrf
                <div class="mb-10">
                    <label for="nama_tim" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nama Tim
                    </label>
                    <input type="text" name="nama_tim" id="nama_tim" placeholder="Nama Tim"
                        class="border-black w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-10">
                    <label for="nama_ketua" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nama Ketua
                    </label>
                    <input type="nama_ketua" name="nama_ketua" id="nama_ketua" placeholder="Nama Ketua"
                        class="border-black w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-10">
                    <label for="kelas_ketua" class="mb-3 block text-base font-medium text-[#07074D]">
                        Kelas Ketua
                    </label>
                    <div class="flex items-center mb-4">
                        <input id="10" type="radio" value="10" name="kelas_ketua"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="10" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kelas
                            10</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input checked id="11" type="radio" value="11" name="kelas_ketua"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="11" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kelas
                            11</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input checked id="12" type="radio" value="12" name="kelas_ketua"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="12" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kelas
                            12</label>
                    </div>
                </div>
                <div class="mb-10">
                    <label for="nama_anggota" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nama Anggota
                    </label>
                    <input type="nama_anggota" name="nama_anggota" id="nama_anggota" placeholder="Nama Anggota"
                        class="border-black w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-10">
                    <label for="kelas_anggota" class="mb-3 block text-base font-medium text-[#07074D]">
                        Kelas Anggota
                    </label>
                    <div class="flex items-center mb-4">
                        <input id="10" type="radio" value="10" name="kelas_anggota"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="10" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kelas
                            10</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input checked id="11" type="radio" value="11" name="kelas_anggota"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="11" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kelas
                            11</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input checked id="12" type="radio" value="12" name="kelas_anggota"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="12" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kelas
                            12</label>
                    </div>
                </div>
                <div class="mb-10">
                    <label for="sekolah" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nama Sekolah
                    </label>
                    <input type="sekolah" name="sekolah" id="sekolah" placeholder="Nama Sekolah"
                        class="border-black w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-10">
                    <label for="alamat_sekolah" class="mb-3 block text-base font-medium text-[#07074D]">
                        Alamat Sekolah
                    </label>
                    <input type="alamat_sekolah" name="alamat_sekolah" id="alamat_sekolah" placeholder="Alamat Sekolah"
                        class="border-black w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-10">
                    <label for="nomor_hp_ketua" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nomor Handphone Ketua
                    </label>
                    <input type="nomor_hp_ketua" name="nomor_hp_ketua" id="nomor_hp_ketua"
                        placeholder="Nomor Handphone Ketua"
                        class="border-black w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    <div>
                        <p class="text-xs text-[#6B7280] mt-2">*Pastikan nomor handphone yang anda masukkan aktif</p>
                    </div>
                </div>
                <div class="mb-10">
                    <label for="nomor_hp_anggota" class="mb-3 block text-base font-medium text-[#07074D]">
                        Nomor Handphone Anggota
                    </label>
                    <input type="nomor_hp_anggota" name="nomor_hp_anggota" id="nomor_hp_anggota"
                        placeholder="Nomor Handphone Anggota"
                        class="border-black w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    <div>
                        <p class="text-xs text-[#6B7280] mt-2">*Pastikan nomor handphone yang anda masukkan aktif</p>
                    </div>
                </div>
                <div class="mb-10">
                    <label for="region" class="mb-3 block text-base font-medium text-[#07074D]">
                        Kota Asal
                    </label>
                    <input type="region" name="region" id="region" placeholder="Kota Asal"
                        class="border-black w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <button
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                    Submit
                </button>
        </div>
        </form>
    </div>

    </div>
@endsection
