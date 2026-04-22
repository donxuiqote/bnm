@extends('layouts.dashboard')
@section('content')

<div class="min-h-screen">
    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="grid gap-6">
            <section class="xl:col-span-1 rounded-3xl border border-gray-200 bg-white shadow-sm">
                <div class="border-b border-gray-200 px-6 py-5">
                    <h2 class="text-lg font-semibold text-gray-900">Form Tambah / Edit User</h2>
                </div>

                <form class="space-y-5 p-6">
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" placeholder="Masukkan nama lengkap" class="h-12 w-full rounded-xl border border-gray-300 px-4 text-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100" />
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700">NIP / ID Pegawai</label>
                        <input type="text" placeholder="Masukkan NIP atau ID pegawai" class="h-12 w-full rounded-xl border border-gray-300 px-4 text-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100" />
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700">Bagian / Divisi</label>
                        <select class="h-12 w-full rounded-xl border border-gray-300 px-4 text-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100">
                            <option value="">Pilih divisi</option>
                            <option>Pusat Pengembangan & Penilaian Kompetensi</option>
                            <option>Pusat Pelatihan</option>
                            <option>Data & Sistem Informasi</option>
                            <option>Umum / Pimpinan, Humas, & Protokol</option>
                            <option>Umum / Rumah Tangga</option>
                            <option>Umum / Keuangan</option>
                            <option>Perencanaan & Kerja Sama</option>
                        </select>
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700">No. HP</label>
                        <input type="text" placeholder="08xxxxxxxxxx" class="h-12 w-full rounded-xl border border-gray-300 px-4 text-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100" />
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" placeholder="nama@email.com" class="h-12 w-full rounded-xl border border-gray-300 px-4 text-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100" />
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" placeholder="Minimal 8 karakter" class="h-12 w-full rounded-xl border border-gray-300 px-4 text-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100" />
                        <p class="mt-2 text-xs text-gray-500">Simpan password ke database dengan bcrypt, bukan MD5.</p>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <label class="flex items-center gap-2 rounded-xl border border-gray-200 px-4 py-3 text-sm text-gray-700">
                            <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600" checked />
                            Remember me
                        </label>
                        <label class="flex items-center gap-2 rounded-xl border border-gray-200 px-4 py-3 text-sm text-gray-700">
                            <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600" checked />
                            Logout otomatis
                        </label>
                    </div>

                    <div class="grid gap-3 sm:grid-cols-2">
                        <button type="button" class="h-12 rounded-xl bg-blue-600 text-sm font-semibold text-white hover:bg-blue-700">Simpan User</button>
                        <button type="reset" class="h-12 rounded-xl border border-gray-300 text-sm font-semibold text-gray-700 hover:bg-gray-50">Reset</button>
                    </div>
                </form>
            </section>

        </div>
    </main>
</div>

@endsection