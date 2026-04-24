@extends('layouts.user')
@section('content')


<main class="mx-auto max-w-6xl px-5 py-6 sm:px-6 lg:px-8 pb-12">

    <!-- BANNER PETUNJUK UNTUK USER (ringan & informatif) -->
    <div class="mb-8 bg-white border-l-4 border-indigo-400 rounded-2xl shadow-sm p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div class="flex items-start gap-3">
            <div class="bg-indigo-50 p-2 rounded-full text-indigo-500 text-xl">📝</div>
            <div>
                <h3 class="font-semibold text-gray-800 text-md">Ajukan pengadaan baru</h3>
                <p class="text-sm text-gray-500 max-w-md">Isi kategori, nama barang, jumlah, dan deskripsi. Pengajuanmu akan diproses oleh admin.</p>
            </div>
        </div>
        <button @click="bukaModalTambah()" class="inline-flex cursor-pointer items-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-md hover:bg-indigo-700 transition-all duration-200 hover:shadow-lg active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Ajukan Pengadaan
        </button>
    </div>

    <!-- RINGKASAN CEPAT (dari pengajuan user sendiri) -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-2xl border border-gray-200 p-4 shadow-sm flex items-center gap-3 transition-smooth hover:shadow-md">
            <div class="bg-sky-100 p-2.5 rounded-xl"><span class="text-sky-600 text-xl">📦</span></div>
            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">Total</p>
                <p class="text-2xl font-black text-gray-800" x-text="items.length"></p>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-4 shadow-sm flex items-center gap-3">
            <div class="bg-amber-100 p-2.5 rounded-xl"><span class="text-amber-600 text-xl">⏳</span></div>
            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">Menunggu</p>
                <p class="text-2xl font-black text-amber-600" x-text="items.filter(i => i.status === 'Menunggu Persetujuan').length"></p>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-4 shadow-sm flex items-center gap-3">
            <div class="bg-emerald-100 p-2.5 rounded-xl"><span class="text-emerald-600 text-xl">✅</span></div>
            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">Disetujui</p>
                <p class="text-2xl font-black text-emerald-700" x-text="items.filter(i => i.status === 'Disetujui semua' || (i.status.includes('Disetujui') && i.status !== 'Menunggu Persetujuan')).length"></p>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-4 shadow-sm flex items-center gap-3">
            <div class="bg-rose-100 p-2.5 rounded-xl"><span class="text-rose-500 text-xl">❌</span></div>
            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">Ditolak</p>
                <p class="text-2xl font-black text-rose-600" x-text="items.filter(i => i.status === 'Ditolak').length"></p>
            </div>
        </div>
    </div>

    <!-- DAFTAR PENGAJUAN USER (kartu / tabel modern) tampilan user friendly -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-md overflow-hidden">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-gray-100 px-6 py-4 bg-gray-50/40">
            <div>
                <h2 class="text-lg font-bold text-gray-800">📋 Riwayat Pengadaan Saya</h2>
                <p class="text-xs text-gray-500 mt-0.5">Menampilkan <span x-text="paginatedItems.length"></span> dari <span x-text="items.length"></span> permintaan</p>
            </div>
            <div class="relative">
                <input type="text" x-model="searchQuery" placeholder="Cari barang / kategori..." class="pl-9 pr-4 py-2 text-sm rounded-xl border border-gray-300 w-64 focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400 transition">
                <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <!-- Tampilan daftar: versi card di mobile, tabel di desktop lebih enak -->
        <div class="overflow-x-auto block">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 hidden sm:table-header-group">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">

                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900">
                            Sepatu Safety Pro
                            <div class="text-xs text-gray-400">SP-001</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-indigo-50 text-indigo-700 px-2.5 py-1 rounded-full text-xs">Footwear</span>
                        </td>
                        <td class="px-6 py-4 text-sm">25</td>
                        <td class="px-6 py-4 text-sm text-gray-600">Kebutuhan untuk area produksi</td>
                        <td class="px-6 py-4">
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">✅ Disetujui semua</span>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900">
                            Jaket Outdoor
                            <div class="text-xs text-gray-400">JK-022</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-indigo-50 text-indigo-700 px-2.5 py-1 rounded-full text-xs">Apparel</span>
                        </td>
                        <td class="px-6 py-4 text-sm">12</td>
                        <td class="px-6 py-4 text-sm text-gray-600">Untuk tim lapangan</td>
                        <td class="px-6 py-4">
                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs">⚠️ Disetujui 8</span>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900">
                            Power Bank 20000mAh
                            <div class="text-xs text-gray-400">PB-09</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-indigo-50 text-indigo-700 px-2.5 py-1 rounded-full text-xs">Elektronik</span>
                        </td>
                        <td class="px-6 py-4 text-sm">20</td>
                        <td class="px-6 py-4 text-sm text-gray-600">Cadangan listrik</td>
                        <td class="px-6 py-4">
                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs">❌ Ditolak</span>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900">
                            Matras Yoga
                            <div class="text-xs text-gray-400">MY-77</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-indigo-50 text-indigo-700 px-2.5 py-1 rounded-full text-xs">Equipment</span>
                        </td>
                        <td class="px-6 py-4 text-sm">8</td>
                        <td class="px-6 py-4 text-sm text-gray-600">Fasilitas gym</td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs">⏳ Menunggu</span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="border-t border-gray-100 px-6 py-3 bg-gray-50/30 flex flex-wrap items-center justify-between gap-3">
            <div class="text-xs text-gray-500">Halaman <span x-text="currentPage"></span> dari <span x-text="totalPages"></span></div>
            <div class="flex gap-2">
                <button @click="goToPage(currentPage - 1)" :disabled="currentPage === 1" :class="{'opacity-40 cursor-not-allowed': currentPage === 1}" class="px-3 py-1.5 text-sm rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition">Sebelumnya</button>
                <template x-for="page in Math.min(totalPages, 5)" :key="page">
                    <button @click="goToPage(page)" :class="{'bg-indigo-600 text-white border-indigo-600': currentPage === page, 'border-gray-300 bg-white text-gray-700': currentPage !== page}" class="px-3 py-1.5 text-sm rounded-lg border transition-all" x-text="page"></button>
                </template>
                <button @click="goToPage(currentPage + 1)" :disabled="currentPage === totalPages" :class="{'opacity-40 cursor-not-allowed': currentPage === totalPages}" class="px-3 py-1.5 text-sm rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition">Berikutnya</button>
            </div>
        </div>
    </div>
</main>

<!-- MODAL TAMBAH PENGAJUAN (USER) - Desain sesuai gambar: kategori, nama barang, jumlah, deskripsi -->
<div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-black/60 p-4" @click.self="tutupModal()">
    <div class="relative w-full max-w-xl rounded-2xl bg-white shadow-2xl transform transition-all duration-200 scale-100">
        <div class="flex items-center justify-between border-b border-gray-200 p-5 bg-gray-50/50 rounded-t-2xl">
            <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2"><span class="text-indigo-500">📝</span> Formulir Pengadaan</h3>
            <button @click="tutupModal()" class="text-gray-400 hover:text-gray-600 transition rounded-full p-1 hover:bg-gray-100">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6 space-y-5">
            <!-- Kategori (pilih kategori) -->
            <div>
                <label class="mb-1.5 block text-sm font-semibold text-gray-700">Kategori <span class="text-red-500">*</span></label>
                <select x-model="formKategori" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400 transition">
                    <option value="" disabled selected>Pilih kategori</option>
                    <option value="Footwear">Footwear (Sepatu)</option>
                    <option value="Apparel">Apparel (Pakaian)</option>
                    <option value="Accessories">Accessories (Aksesoris)</option>
                    <option value="Equipment">Equipment (Peralatan)</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <!-- Nama Barang -->
            <div>
                <label class="mb-1.5 block text-sm font-semibold text-gray-700">Nama Barang <span class="text-red-500">*</span></label>
                <input type="text" x-model="formNamaBarang" placeholder="Masukkan nama barang" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-300">
            </div>
            <!-- Jumlah (1 sebagai default) -->
            <div>
                <label class="mb-1.5 block text-sm font-semibold text-gray-700">Jumlah <span class="text-red-500">*</span></label>
                <div class="flex items-center gap-2">
                    <input type="number" x-model="formJumlah" min="1" value="1" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm focus:ring-2 focus:ring-indigo-300">
                </div>
                <p class="text-xs text-gray-400 mt-1">Minimal 1</p>
            </div>
            <!-- Deskripsi (textarea) sesuai gambar -->
            <div>
                <label class="mb-1.5 block text-sm font-semibold text-gray-700">Deskripsi</label>
                <textarea x-model="formDeskripsi" rows="3" placeholder="Tuliskan deskripsi pengadaan... (spesifikasi, alasan kebutuhan, dll)" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm resize-none focus:ring-2 focus:ring-indigo-300"></textarea>
                <p class="text-xs text-gray-400 mt-1">Opsional, tapi disarankan untuk memperjelas kebutuhan.</p>
            </div>
            <div class="bg-indigo-50/50 p-3 rounded-xl text-xs text-indigo-700 flex items-start gap-2">
                <span>ℹ️</span>
                <span>Pengajuan akan langsung terdaftar dengan status <strong>"Menunggu Persetujuan"</strong>. Admin akan memproses permintaan Anda.</span>
            </div>
        </div>
        <div class="flex justify-end gap-3 border-t border-gray-100 p-5 bg-gray-50/40 rounded-b-2xl">
            <button @click="tutupModal()" class="rounded-xl border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 transition">Batal</button>
            <button @click="simpanPengadaan()" class="rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 transition active:scale-95">Buat Pengadaan</button>
        </div>
    </div>
</div>

@endsection