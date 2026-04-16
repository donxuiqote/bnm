@extends('layouts.dashboard')
@section('content')
<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
    <!-- ===== Sidebar Start ===== -->

    <!-- ===== Content Area Start ===== -->
    <div
        class="relative flex flex-1 flex-col overflow-x-hidden overflow-y-auto">
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
                        <div
                            class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                            <div class="px-5 py-4 sm:px-6 sm:py-5">
                                <h3
                                    class="text-base font-medium text-gray-800 dark:text-white/90">
                                    Pengajuan Barang
                                </h3>
                            </div>
                            <div
                                class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                                <!-- Elements -->
                                <div>
                                    <label
                                        class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Nama Barang
                                    </label>
                                    <input
                                        type="text"
                                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                </div>

                                <!-- Elements -->
                                <div>
                                    <label
                                        class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Kategori
                                    </label>
                                    <div
                                        x-data="{ isOptionSelected: false }"
                                        class="relative z-20 bg-transparent">
                                        <select
                                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                            :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                            @change="isOptionSelected = true">
                                            <option
                                                value=""
                                                class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                                Pilih kategori barang
                                            </option>
                                            <option
                                                value=""
                                                class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                                ATK
                                            </option>
                                            <option
                                                value=""
                                                class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                                Elektronik
                                            </option>
                                            <option
                                                value=""
                                                class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                                Dapur
                                            </option>
                                        </select>
                                        <span
                                            class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                            <svg
                                                class="stroke-current"
                                                width="20"
                                                height="20"
                                                viewBox="0 0 20 20"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396"
                                                    stroke=""
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                            <div class="px-5 py-4 sm:px-6 sm:py-5">
                                <h3
                                    class="text-base font-medium text-gray-800 dark:text-white/90">
                                    Select Inputs
                                </h3>
                            </div>
                            <div
                                class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                                <!-- Elements -->
                                <div>
                                    <label
                                        class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Select Input
                                    </label>
                                    <div
                                        x-data="{ isOptionSelected: false }"
                                        class="relative z-20 bg-transparent">
                                        <select
                                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                            :class="isOptionSelected && 'text-gray-800 dark:text-white/90'"
                                            @change="isOptionSelected = true">
                                            <option
                                                value=""
                                                class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                                Select Option
                                            </option>
                                            <option
                                                value=""
                                                class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                                Marketing
                                            </option>
                                            <option
                                                value=""
                                                class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                                Template
                                            </option>
                                            <option
                                                value=""
                                                class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                                                Development
                                            </option>
                                        </select>
                                        <span
                                            class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                            <svg
                                                class="stroke-current"
                                                width="20"
                                                height="20"
                                                viewBox="0 0 20 20"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396"
                                                    stroke=""
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </div>
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
                            options[i].getAttribute("selected") :
                            false,
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