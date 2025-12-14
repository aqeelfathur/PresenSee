@extends('layouts.app')

@section('title', 'Daftar Siswa Kelas')
@section('page-title', 'Daftar Siswa Kelas')

@section('page-subtitle')
    {{ $mapelKelas->mapel->nama_mapel }} • Kelas {{ $mapelKelas->kelas->kode_kelas }}
@endsection

@section('content')
<div class="space-y-6">

    {{-- Info Kelas --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-lg font-bold text-gray-900">
                    {{ $mapelKelas->mapel->nama_mapel }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Kelas {{ $mapelKelas->kelas->kode_kelas }}
                </p>
            </div>

            <div class="flex items-center gap-6">
                <div class="text-center">
                    <p class="text-xs text-gray-500">Total Siswa</p>
                    <p class="text-xl font-bold text-[#004680]">
                        {{ $totalSiswa }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Daftar Siswa --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-sm font-semibold text-gray-800">
                Daftar Siswa
            </h3>
        </div>

        @if ($siswa->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-100">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                No
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                NIS
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Nama Siswa
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Wali Murid
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                No. HP Wali
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach ($siswa as $index => $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800 font-medium">
                                    {{ $item->nis }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 font-semibold">
                                    {{ $item->nama_siswa }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $item->nama_walimurid ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $item->no_handphone_walimurid ?? '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            {{-- Empty State --}}
            <div class="py-16 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1z"/>
                </svg>
                <p class="text-sm font-medium text-gray-600">
                    Belum ada siswa di kelas ini
                </p>
            </div>
        @endif
    </div>

</div>
@endsection
