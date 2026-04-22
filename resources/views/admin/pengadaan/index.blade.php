@extends('layouts.dashboard')
@section('content')


<main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

    <!-- PETUNJUK ADMIN - bentuk kotak dengan border kiri biru, rounded, font sesuai contoh -->
    <div class="mb-6 bg-blue-50 border-l-4 border-blue-500 rounded-r-xl p-4 shadow-sm card-shadow">
        <div class="flex items-start gap-3">
            <div class="text-blue-600 text-lg leading-5">📋</div>
            <div>
                <h3 class="font-semibold text-gray-800 text-sm">Petunjuk Admin Pengadaan</h3>
                <p class="text-xs text-gray-600 mt-0.5">Klik pada badge status untuk mengubah persetujuan barang. Pilih "Disetujui semua", "Disetujui sebagian" (dengan jumlah), atau "Ditolak".</p>
            </div>
        </div>
    </div>

    <!-- RINGKASAN STATISTIK: bentuk kotak dengan icon bulat, font tebal, bayangan ringan seperti gambar -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-5 mb-6">
        <div class="bg-white rounded-xl border border-gray-100 p-3 flex items-center gap-3 shadow-sm card-shadow">
            <div class="bg-blue-100 p-2.5 rounded-full"><span class="text-blue-600 text-xl">📦</span></div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Pengadaan</p>
                <p class="text-2xl font-extrabold text-gray-800" x-text="items.length"></p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 p-3 flex items-center gap-3 shadow-sm card-shadow">
            <div class="bg-green-100 p-2.5 rounded-full"><span class="text-green-600 text-xl">✅</span></div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Disetujui semua</p>
                <p class="text-2xl font-extrabold text-green-700" x-text="items.filter(i => i.status === 'Disetujui semua').length"></p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 p-3 flex items-center gap-3 shadow-sm card-shadow">
            <div class="bg-yellow-100 p-2.5 rounded-full"><span class="text-yellow-600 text-xl">⚠️</span></div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Disetujui sebagian</p>
                <p class="text-2xl font-extrabold text-yellow-700" x-text="partialCount"></p>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 p-3 flex items-center gap-3 shadow-sm card-shadow">
            <div class="bg-red-100 p-2.5 rounded-full"><span class="text-red-600 text-xl">❌</span></div>
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Ditolak</p>
                <p class="text-2xl font-extrabold text-red-700" x-text="items.filter(i => i.status === 'Ditolak').length"></p>
            </div>
        </div>
    </div>

    <!-- TABEL DAFTAR PENGAJUAN (tidak ada perubahan fitur) -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-md overflow-hidden">
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-200 px-6 py-4 bg-gray-50/30">
            <div>
                <h2 class="text-lg font-semibold text-gray-900">Daftar Pengadaan</h2>
                <p class="text-xs text-gray-500 mt-0.5">Menampilkan <span x-text="paginatedItems.length"></span> dari <span x-text="items.length"></span> data</p>
            </div>
            <button @click="showModal = true" class="inline-flex cursor-pointer items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition-all duration-200 hover:bg-blue-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Nama Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Kode</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Jumlah Stock</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                    </tr>
                </thead>
<tbody class="divide-y divide-gray-200 bg-white">

    <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 text-sm font-medium text-gray-900">Sepatu Running Pro</td>
        <td class="px-6 py-4 text-sm text-gray-600">MAP-001</td>
        <td class="px-6 py-4 text-sm text-gray-600">Footwear</td>
        <td class="px-6 py-4 text-sm text-gray-700">120</td>
        <td class="px-6 py-4 text-sm">
            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">✅ Disetujui semua</span>
        </td>
    </tr>

    <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 text-sm font-medium text-gray-900">Kaos Olahraga Dri-Fit</td>
        <td class="px-6 py-4 text-sm text-gray-600">MAP-002</td>
        <td class="px-6 py-4 text-sm text-gray-600">Apparel</td>
        <td class="px-6 py-4 text-sm text-gray-700">80</td>
        <td class="px-6 py-4 text-sm">
            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold">⚠️ Disetujui 20</span>
        </td>
    </tr>

    <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 text-sm font-medium text-gray-900">Tas Gym Active</td>
        <td class="px-6 py-4 text-sm text-gray-600">MAP-003</td>
        <td class="px-6 py-4 text-sm text-gray-600">Accessories</td>
        <td class="px-6 py-4 text-sm text-gray-700">30</td>
        <td class="px-6 py-4 text-sm">
            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-semibold">❌ Ditolak</span>
        </td>
    </tr>

    <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 text-sm font-medium text-gray-900">Celana Training Elite</td>
        <td class="px-6 py-4 text-sm text-gray-600">MAP-004</td>
        <td class="px-6 py-4 text-sm text-gray-600">Apparel</td>
        <td class="px-6 py-4 text-sm text-gray-700">60</td>
        <td class="px-6 py-4 text-sm">
            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">✅ Disetujui semua</span>
        </td>
    </tr>

    <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 text-sm font-medium text-gray-900">Topi Olahraga UV</td>
        <td class="px-6 py-4 text-sm text-gray-600">MAP-005</td>
        <td class="px-6 py-4 text-sm text-gray-600">Accessories</td>
        <td class="px-6 py-4 text-sm text-gray-700">45</td>
        <td class="px-6 py-4 text-sm">
            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">✅ Disetujui semua</span>
        </td>
    </tr>

</tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="border-t border-gray-200 px-6 py-3 bg-gray-50/20 flex flex-wrap items-center justify-between gap-3">
            <div class="text-xs text-gray-500">Halaman <span x-text="currentPage"></span> dari <span x-text="totalPages"></span></div>
            <div class="flex gap-2">
                <button @click="goToPage(currentPage - 1)" :disabled="currentPage === 1" :class="{'opacity-50 cursor-not-allowed': currentPage === 1}" class="px-3 py-1.5 text-sm rounded-lg border border-gray-300 bg-white text-gray-700">Sebelumnya</button>
                <template x-for="page in totalPages" :key="page">
                    <button @click="goToPage(page)" :class="{'bg-blue-600 text-white border-blue-600': currentPage === page}" class="px-3 py-1.5 text-sm rounded-lg border transition-all" x-text="page"></button>
                </template>
                <button @click="goToPage(currentPage + 1)" :disabled="currentPage === totalPages" :class="{'opacity-50 cursor-not-allowed': currentPage === totalPages}" class="px-3 py-1.5 text-sm rounded-lg border border-gray-300 bg-white text-gray-700">Berikutnya</button>
            </div>
        </div>
    </div>
</main>

<!-- MODAL Tambah Pengadaan (fitur tidak berubah) -->
<div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-black/50 p-4" @click.self="showModal = false">
    <div class="relative w-full max-w-lg rounded-lg bg-white shadow-xl">
        <div class="flex items-center justify-between border-b border-gray-200 p-5">
            <h3 class="text-xl font-semibold text-gray-900">Tambah Pengadaan</h3>
            <button @click="showModal = false" class="text-gray-400 hover:text-gray-600">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="space-y-5 p-6">
            <div>
                <label class="mb-1.5 block text-sm font-medium text-gray-700">Nama Barang</label>
                <input type="text" x-model="formNamaBarang" placeholder="Masukkan nama barang" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm">
            </div>
            <div>
                <label class="mb-1.5 block text-sm font-medium text-gray-700">Kategori</label>
                <select x-model="formKategori" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm">
                    <option value="" disabled>Pilih kategori</option>
                    <option value="Footwear">Footwear</option>
                    <option value="Apparel">Apparel</option>
                    <option value="Accessories">Accessories</option>
                    <option value="Equipment">Equipment</option>
                </select>
            </div>
            <div>
                <label class="mb-1.5 block text-sm font-medium text-gray-700">Kode Barang</label>
                <input type="text" x-model="formKode" placeholder="Contoh: MAP-011" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm">
            </div>
            <div>
                <label class="mb-1.5 block text-sm font-medium text-gray-700">Jumlah Stock</label>
                <input type="number" x-model="formJumlahStock" min="0" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm">
            </div>
            <p class="text-xs text-gray-400">*Status awal: Menunggu Persetujuan</p>
        </div>
        <div class="flex justify-end gap-3 border-t border-gray-200 p-5">
            <button @click="showModal = false" class="rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700">Batal</button>
            <button @click="addItem" class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm">Submit</button>
        </div>
    </div>
</div>

<!-- MODAL Ubah Status (fitur tetap) -->
<div x-show="statusModal.open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-black/50 p-4" @click.self="statusModal.open = false">
    <div class="relative w-full max-w-md rounded-lg bg-white shadow-xl">
        <div class="flex items-center justify-between border-b border-gray-200 p-5">
            <h3 class="text-xl font-semibold text-gray-900">Ubah Status Persetujuan</h3>
            <button @click="statusModal.open = false" class="text-gray-400 hover:text-gray-600">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6 space-y-4">
            <p class="text-sm text-gray-600 mb-3">
                <span class="font-semibold text-gray-900" x-text="statusModal.item?.namaBarang"></span>
            </p>

            <!-- Disetujui semua hijau -->
            <button @click="updateStatus('Disetujui semua')" class="w-full text-left px-4 py-3 rounded-lg transition-all flex items-center gap-3 bg-green-50 border-2 border-green-300 hover:bg-green-100">
                <span class="text-xl">✅</span>
                <div>
                    <p class="font-medium text-green-700">Disetujui semua</p>
                    <p class="text-xs text-gray-500">Menyetujui seluruh jumlah barang</p>
                </div>
            </button>

            <!-- Disetujui sebagian kuning -->
            <div class="rounded-lg p-3 bg-yellow-50 border-2 border-yellow-300">
                <div class="flex items-center gap-3 mb-3">
                    <span class="text-xl">⚠️</span>
                    <div>
                        <p class="font-medium text-yellow-700">Disetujui sebagian</p>
                        <p class="text-xs text-gray-500">Menyetujui sejumlah tertentu</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 pl-9">
                    <label class="text-sm text-gray-600 font-medium">Jumlah disetujui:</label>
                    <input type="number" x-model="statusModal.partialAmount" placeholder="Masukkan jumlah" class="w-40 rounded-lg border border-yellow-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <button @click="updateStatus('Disetujui ' + statusModal.partialAmount)" :disabled="!statusModal.partialAmount || statusModal.partialAmount <= 0" class="px-4 py-2 bg-yellow-500 text-white rounded-lg text-sm font-medium hover:bg-yellow-600 disabled:opacity-50 disabled:cursor-not-allowed transition-all">
                        Terapkan
                    </button>
                </div>
            </div>

            <!-- Ditolak merah -->
            <button @click="updateStatus('Ditolak')" class="w-full text-left px-4 py-3 rounded-lg transition-all flex items-center gap-3 bg-red-50 border-2 border-red-300 hover:bg-red-100">
                <span class="text-xl">❌</span>
                <div>
                    <p class="font-medium text-red-700">Ditolak</p>
                    <p class="text-xs text-gray-500">Menolak pengadaan ini</p>
                </div>
            </button>
        </div>
        <div class="flex justify-end border-t border-gray-200 p-5">
            <button @click="statusModal.open = false" class="rounded-lg bg-gray-100 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-200 transition-all">Batal</button>
        </div>
    </div>
</div>
<script>
    function appData() {
        return {
            items: [{
                    id: 1,
                    namaBarang: 'Sepatu Running Pro',
                    kode: 'MAP-001',
                    kategori: 'Footwear',
                    jumlahStock: 120,
                    status: 'Disetujui semua'
                },
                {
                    id: 2,
                    namaBarang: 'Kaos Olahraga Dri-Fit',
                    kode: 'MAP-002',
                    kategori: 'Apparel',
                    jumlahStock: 80,
                    status: 'Disetujui 20'
                },
                {
                    id: 3,
                    namaBarang: 'Tas Gym Active',
                    kode: 'MAP-003',
                    kategori: 'Accessories',
                    jumlahStock: 30,
                    status: 'Ditolak'
                },
                {
                    id: 4,
                    namaBarang: 'Celana Training Elite',
                    kode: 'MAP-004',
                    kategori: 'Apparel',
                    jumlahStock: 60,
                    status: 'Disetujui semua'
                },
                {
                    id: 5,
                    namaBarang: 'Topi Olahraga UV',
                    kode: 'MAP-005',
                    kategori: 'Accessories',
                    jumlahStock: 45,
                    status: 'Disetujui semua'
                },
                {
                    id: 6,
                    namaBarang: 'Matras Yoga Premium',
                    kode: 'MAP-006',
                    kategori: 'Equipment',
                    jumlahStock: 25,
                    status: 'Disetujui 50'
                },
                {
                    id: 7,
                    namaBarang: 'Botol Minum Tritan',
                    kode: 'MAP-007',
                    kategori: 'Accessories',
                    jumlahStock: 100,
                    status: 'Disetujui semua'
                },
                {
                    id: 8,
                    namaBarang: 'Rompi Training Berat',
                    kode: 'MAP-008',
                    kategori: 'Apparel',
                    jumlahStock: 15,
                    status: 'Ditolak'
                },
                {
                    id: 9,
                    namaBarang: 'Pelindung Lutut',
                    kode: 'MAP-009',
                    kategori: 'Accessories',
                    jumlahStock: 50,
                    status: 'Disetujui semua'
                },
                {
                    id: 10,
                    namaBarang: 'Hand Grip Adjustable',
                    kode: 'MAP-010',
                    kategori: 'Equipment',
                    jumlahStock: 75,
                    status: 'Menunggu Persetujuan'
                }
            ],
            showModal: false,
            formNamaBarang: '',
            formKategori: '',
            formKode: '',
            formJumlahStock: 0,
            currentPage: 1,
            rowsPerPage: 5,

            statusModal: {
                open: false,
                item: null,
                partialAmount: ''
            },

            get totalPages() {
                return Math.ceil(this.items.length / this.rowsPerPage);
            },

            get paginatedItems() {
                const start = (this.currentPage - 1) * this.rowsPerPage;
                return this.items.slice(start, start + this.rowsPerPage);
            },

            get partialCount() {
                return this.items.filter(item => {
                    const s = item.status;
                    return s !== 'Disetujui semua' && s !== 'Ditolak' && s !== 'Menunggu Persetujuan' && s.includes('Disetujui');
                }).length;
            },

            goToPage(page) {
                if (page >= 1 && page <= this.totalPages) {
                    this.currentPage = page;
                }
            },

            openStatusModal(item) {
                this.statusModal.item = item;
                this.statusModal.partialAmount = '';
                const match = item.status.match(/Disetujui (\d+)/);
                if (match) {
                    this.statusModal.partialAmount = match[1];
                }
                this.statusModal.open = true;
            },

            updateStatus(newStatus) {
                if (this.statusModal.item) {
                    const index = this.items.findIndex(i => i.id === this.statusModal.item.id);
                    if (index !== -1) {
                        this.items[index].status = newStatus;
                    }
                }
                this.statusModal.open = false;
                this.statusModal.item = null;
                this.statusModal.partialAmount = '';
            },

            addItem() {
                if (!this.formNamaBarang || !this.formKategori || !this.formKode) {
                    alert('Harap lengkapi Nama Barang, Kategori, dan Kode.');
                    return;
                }
                const newId = Math.max(...this.items.map(i => i.id)) + 1;
                this.items.push({
                    id: newId,
                    namaBarang: this.formNamaBarang,
                    kode: this.formKode,
                    kategori: this.formKategori,
                    jumlahStock: parseInt(this.formJumlahStock) || 0,
                    status: 'Menunggu Persetujuan'
                });
                this.formNamaBarang = '';
                this.formKategori = '';
                this.formKode = '';
                this.formJumlahStock = 0;
                this.showModal = false;
                this.currentPage = 1;
            }
        };
    }
</script>
@endsection