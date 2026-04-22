@extends('layouts.dashboard')
@section('content')
<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen">
    <!-- ===== Sidebar Start ===== -->

    <!-- ===== Content Area Start ===== -->
    <div
        class="relative flex flex-1 flex-col">
        <!-- Small Device Overlay Start -->
        <div
            @click="sidebarToggle = false"
            :class="sidebarToggle ? 'block lg:hidden' : 'hidden'"
            class="fixed w-full h-screen z-9 bg-gray-900/50"></div>
        <!-- ===== Header End ===== -->

        <!-- ===== Main Content Start ===== -->
        <main>
            <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
                <!-- Breadcrumb Start -->
                <div x-data="{ pageName: `Form Elements`}">
                    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                        <h2
                            class="text-xl font-semibold text-gray-800 dark:text-white/90"
                            x-text="pageName"></h2>

                        <nav>
                            <ol class="flex items-center gap-1.5">
                                <li>
                                    <a
                                        class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                                        href="index.html">
                                        Home
                                        <svg
                                            class="stroke-current"
                                            width="17"
                                            height="16"
                                            viewBox="0 0 17 16"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366"
                                                stroke=""
                                                stroke-width="1.2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </li>
                                <li
                                    class="text-sm text-gray-800 dark:text-white/90"
                                    x-text="pageName"></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Breadcrumb End -->

                <!-- ====== Form Elements Section Start -->
                <div class="grid grid-cols-1 gap-6">
                    <div class="space-y-6">
                        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">

                            <div class="px-5 py-4 sm:px-6 sm:py-5">
                                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                                    Detail Pengajuan Barang
                                </h3>
                            </div>

                            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">

                                <!-- Gambar -->
                                <div class="flex justify-center">
                                    <img src="https://picsum.photos/id/37/200/300" class="rounded-lg" alt="">
                                </div>

                                <!-- Nama Barang -->
                                <div>
                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Nama
                                    </label>
                                    <p class="text-gray-800 dark:text-white/90">Endin Rahmanda</p>
                                </div>

                                <!-- Kategori -->
                                <div>
                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        NIP
                                    </label>
                                    <p class="text-gray-800 dark:text-white/90">320320320</p>
                                </div>

                                <!-- Deskripsi -->
                                <div>
                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Divisi
                                    </label>
                                    <p class="text-gray-800 dark:text-white/90">
                                        Divisi IT
                                    </p>
                                </div>

                                <!-- Jumlah -->
                                <div>
                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        email
                                    </label>
                                    <p class="text-gray-800 dark:text-white/90">endin.rahmanda@example.com</p>
                                </div>

                                <!-- Jumlah -->
                                <div>
                                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Pengajuan
                                    </label>
                                    <button
                                        class="inline-flex items-center justify-center rounded-lg bg-blue-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-600">
                                        Lihat Pengajuan
                                    </button>
                                </div>

                                <!-- Tombol Aksi -->
                                <div class="flex gap-3">
                                    <button
                                        class="inline-flex items-center justify-center rounded-lg bg-green-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-green-600">
                                        Edit akun
                                    </button>

                                    <button
                                        class="inline-flex items-center justify-center rounded-lg bg-red-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-red-600">
                                        Hapus akun
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ====== Form Elements Section End -->
            </div>


        </main>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
</div>
<!-- ===== Page Wrapper End ===== -->

<script>
    function dropdown() {
        return {
            options: [],
            selected: [],
            show: false,
            open() {
                this.show = true;
            },
            close() {
                this.show = false;
            },
            isOpen() {
                return this.show === true;
            },
            select(index, event) {
                if (!this.options[index].selected) {
                    this.options[index].selected = true;
                    this.options[index].element = event.target;
                    this.selected.push(index);
                } else {
                    this.selected.splice(this.selected.lastIndexOf(index), 1);
                    this.options[index].selected = false;
                }
            },
            remove(index, option) {
                this.options[option].selected = false;
                this.selected.splice(index, 1);
            },
            loadOptions() {
                const options = document.getElementById("select").options;
                for (let i = 0; i < options.length; i++) {
                    this.options.push({
                        value: options[i].value,
                        text: options[i].innerText,
                        selected: options[i].getAttribute("selected") != null ?
                            options[i].getAttribute("selected") : false,
                    });
                }
            },
            selectedValues() {
                return this.selected.map((option) => {
                    return this.options[option].value;
                });
            },
        };
    }
</script>
<script defer src="bundle.js"></script>


@endsection