@extends('layouts.dashboard')

@section('content')

<div class="flex h-screen overflow-hidden">
    <div class="flex flex-1 flex-col overflow-y-auto">
        <!-- MAIN -->
        <main class="p-6">
            <div class="mx-auto max-w-7xl">

                <!-- BREADCRUMB -->
                <nav class="flex mb-5 text-sm text-gray-500">
                    <span>Pengajuan</span> <span class="mx-2">/</span>
                    <span class="text-gray-800">Form & Tabel</span>
                </nav>

                <!-- FORM -->
                <div class="rounded-2xl border bg-white mb-8">
                    <div class="px-6 py-5 border-b">
                        <h3 class="text-lg font-semibold">➕ Ajukan Barang Baru</h3>
                        <p class="text-sm text-gray-500">Pilih nama barang & kategori, masukkan jumlah</p>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 items-end">

                            <!-- Nama Barang -->
                            <div>
                                <label class="block text-sm mb-1">Nama Barang</label>
                                <select class="w-full h-11 rounded-lg border px-4">
                                    <option>— Pilih Barang —</option>
                                    <option>Laptop Asus</option>
                                    <option>Monitor 24"</option>
                                    <option>Keyboard Mechanical</option>
                                    <option>Mouse Wireless</option>
                                    <option>Printer Laser</option>
                                    <option>Meja Kantor</option>
                                    <option>Kursi Ergonomis</option>
                                </select>
                            </div>

                            <!-- Kategori -->
                            <div>
                                <label class="block text-sm mb-1">Kategori</label>
                                <select class="w-full h-11 rounded-lg border px-4">
                                    <option>— Pilih Kategori —</option>
                                    <option>Elektronik</option>
                                    <option>Peripheral</option>
                                    <option>Perabotan</option>
                                    <option>ATK</option>
                                    <option>Aksesoris</option>
                                </select>
                            </div>

                            <!-- Jumlah -->
                            <div>
                                <label class="block text-sm mb-1">Jumlah</label>
                                <input type="number" min="1" class="w-full h-11 rounded-lg border px-4">
                            </div>

                            <!-- Button -->
                            <div>
                                <button class="w-full h-11 rounded-lg bg-brand-500 text-white">
                                    📤 Ajukan
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="rounded-2xl border bg-white overflow-hidden">

                    <div class="px-6 py-5 border-b flex justify-between">
                        <div>
                            <h3 class="text-lg font-semibold">📋 Daftar Pengajuan</h3>
                            <p class="text-sm text-gray-500">Riwayat pengajuan & status</p>
                        </div>
                        <span class="text-sm bg-gray-100 px-3 py-1 rounded-full">
                            Total: 3
                        </span>
                    </div>

                    <div class="overflow-x-auto p-1">
                        <table class="w-full min-w-[700px]">
                            <thead class="bg-gray-50 border-b">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Nama Barang</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Kategori</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Jumlah</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y">

                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm">1</td>
                                    <td class="px-6 py-4 text-sm font-medium">Laptop Asus</td>
                                    <td class="px-6 py-4 text-sm">Elektronik</td>
                                    <td class="px-6 py-4 text-sm">2</td>
                                    <td class="px-6 py-4">
                                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">
                                            ✅ Diterima Sejumlah
                                        </span>
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm">2</td>
                                    <td class="px-6 py-4 text-sm font-medium">Meja Kantor</td>
                                    <td class="px-6 py-4 text-sm">Perabotan</td>
                                    <td class="px-6 py-4 text-sm">1</td>
                                    <td class="px-6 py-4">
                                        <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs">
                                            ⏳ Diajukan
                                        </span>
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm">3</td>
                                    <td class="px-6 py-4 text-sm font-medium">Keyboard Mechanical</td>
                                    <td class="px-6 py-4 text-sm">Peripheral</td>
                                    <td class="px-6 py-4 text-sm">3</td>
                                    <td class="px-6 py-4">
                                        <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs">
                                            ⏳ Diajukan
                                        </span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </main>
        ```

    </div>

</div>
@endsection