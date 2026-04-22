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
                                        href="/">
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
                                <h3
                                    class="text-base font-medium text-gray-800 dark:text-white/90">
                                    Pengajuan Barang
                                </h3>
                            </div>
                            <div
                                class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                                <div
                                    class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                                    <form
                                        class="dropzone hover:border-brand-500! dark:hover:border-brand-500! rounded-xl border border-dashed! border-gray-300! bg-gray-50 p-7 lg:p-10 dark:border-gray-700! dark:bg-gray-900"
                                        id="demo-upload"
                                        action="/upload">
                                        <div class="dz-message m-0!">
                                            <div class="mb-[22px] flex justify-center">
                                                <div
                                                    class="flex h-[68px] w-[68px] items-center justify-center rounded-full bg-gray-200 text-gray-700 dark:bg-gray-800 dark:text-gray-400">
                                                    <svg
                                                        class="fill-current"
                                                        width="29"
                                                        height="28"
                                                        viewBox="0 0 29 28"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            fill-rule="evenodd"
                                                            clip-rule="evenodd"
                                                            d="M14.5019 3.91699C14.2852 3.91699 14.0899 4.00891 13.953 4.15589L8.57363 9.53186C8.28065 9.82466 8.2805 10.2995 8.5733 10.5925C8.8661 10.8855 9.34097 10.8857 9.63396 10.5929L13.7519 6.47752V18.667C13.7519 19.0812 14.0877 19.417 14.5019 19.417C14.9161 19.417 15.2519 19.0812 15.2519 18.667V6.48234L19.3653 10.5929C19.6583 10.8857 20.1332 10.8855 20.426 10.5925C20.7188 10.2995 20.7186 9.82463 20.4256 9.53184L15.0838 4.19378C14.9463 4.02488 14.7367 3.91699 14.5019 3.91699ZM5.91626 18.667C5.91626 18.2528 5.58047 17.917 5.16626 17.917C4.75205 17.917 4.41626 18.2528 4.41626 18.667V21.8337C4.41626 23.0763 5.42362 24.0837 6.66626 24.0837H22.3339C23.5766 24.0837 24.5839 23.0763 24.5839 21.8337V18.667C24.5839 18.2528 24.2482 17.917 23.8339 17.917C23.4197 17.917 23.0839 18.2528 23.0839 18.667V21.8337C23.0839 22.2479 22.7482 22.5837 22.3339 22.5837H6.66626C6.25205 22.5837 5.91626 22.2479 5.91626 21.8337V18.667Z"
                                                            fill="" />
                                                    </svg>
                                                </div>
                                            </div>

                                            <h4
                                                class="text-theme-xl mb-3 font-semibold text-gray-800 dark:text-white/90">
                                                Drop File Here
                                            </h4>
                                            <span
                                                class="mx-auto mb-5 block w-full max-w-[290px] text-sm text-gray-700 dark:text-gray-400">
                                                Drag and drop your PNG, JPG, WebP, SVG images here or
                                                browse
                                            </span>

                                            <span
                                                class="text-theme-sm text-brand-500 font-medium underline">
                                                Upload File
                                            </span>
                                        </div>
                                    </form>
                                </div>
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
                                <div>
                                    <label
                                        class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Description
                                    </label>
                                    <textarea
                                        placeholder="Enter a description..."
                                        type="text"
                                        rows="6"
                                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"></textarea>
                                </div>
                                <div>
                                    <label
                                        class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Jumlah Stok
                                    </label>
                                    <input
                                        type="text"
                                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                </div>
                                <div class="btn">
                                    <button
                                        class="inline-flex items-center justify-center rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 focus:outline-hidden focus:ring-2 focus:ring-brand-500/50"
                                        type="submit">
                                        Submit
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