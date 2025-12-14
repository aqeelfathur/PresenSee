@extends('layouts.app')

@section('title', 'Daftar Sesi Kelas')
@section('page-title', 'Daftar Sesi Kelas')

@section('page-subtitle')
    {{ $mapelKelas->kelas->kode_kelas }} • {{ $mapelKelas->mapel->nama_mapel }}
@endsection

@section('content')

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-gray-900">Daftar Sesi / Pertemuan</h2>
            <p class="text-sm text-gray-500 mt-0.5">
                Total {{ $sesiData->count() }} pertemuan
            </p>
        </div>

        <a href="{{ route('guru.daftar-kelas') }}"
            class="inline-flex items-center gap-1 px-4 py-2 
                    bg-gray-100 text-gray-700 text-sm font-semibold 
                    rounded-xl hover:bg-gray-200 transition">
                ← Kembali
        </a>

    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Pertemuan</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Tanggal</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Jam</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase">Durasi</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase">Kehadiran</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase">Status</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse ($sesiData as $sesi)
                <tr class="hover:bg-gray-50 transition">
                    <!-- Pertemuan -->
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">
                        Pertemuan {{ $sesi['pertemuan_ke'] }}
                    </td>

                    <!-- Tanggal -->
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $sesi['tanggal'] }}
                    </td>

                    <!-- Jam -->
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $sesi['jam'] }}
                    </td>

                    <!-- Durasi -->
                    <td class="px-6 py-4 text-sm text-center text-gray-700">
                        {{ $sesi['durasi'] }}
                    </td>

                    <!-- Kehadiran -->
                    <td class="px-6 py-4 text-sm text-center font-semibold text-gray-900">
                        {{ $sesi['kehadiran'] }}
                    </td>

                    <!-- Status -->
                    <td class="px-6 py-4 text-center">
                        @if ($sesi['status'] === 'upcoming')
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                                Belum dimulai
                            </span>
                        @elseif ($sesi['status'] === 'ongoing')
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                Berlangsung
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                Selesai
                            </span>
                        @endif
                    </td>

                    <!-- Aksi -->
                    <td class="px-6 py-4 text-center">
                        @if ($sesi['aksi'] === 'belum-dimulai')
                            <button disabled
                                class="px-3 py-1.5 text-xs font-medium rounded-lg bg-gray-200 text-gray-500 cursor-not-allowed">
                                Belum dimulai
                            </button>

                        @elseif ($sesi['aksi'] === 'berlangsung')
                            <a href="{{ route('guru.presensi-kamera', $sesi['id_sesi']) }}"
                               class="inline-flex items-center gap-1 px-3 py-1.5 bg-green-600 text-white text-xs font-medium rounded-lg hover:bg-green-700 transition">
                                Presensi
                            </a>

                        @else
                            <button
                                class="px-3 py-1.5 text-xs font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                                Download
                            </button>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center">
                        <p class="text-sm font-medium text-gray-600">
                            Belum ada sesi untuk kelas ini
                        </p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
