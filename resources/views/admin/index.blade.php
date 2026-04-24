@extends('layouts.admin')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jspdf@2.5.1/dist/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jspdf-autotable@3.8.2/dist/jspdf.plugin.autotable.min.js"></script>

<style>
    body {
        font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    .soft-shadow {
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.06);
    }

    .gradient-slate {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    }

    .nav-active {
        background: #eef4ff;
        color: #2563eb;
        font-weight: 600;
    }

    .menu-panel {
        background: #f8fbff;
        border-radius: 20px;
    }

    .mini-badge-blue {
        background: #eef4ff;
        color: #2563eb;
    }

    .mini-badge-green {
        background: #eafbf3;
        color: #059669;
    }

    .mini-badge-orange {
        background: #fff6e8;
        color: #d97706;
    }

    .mini-badge-pink {
        background: #fff1f5;
        color: #e11d48;
    }

    .chart-card {
        border-radius: 28px;
        background: white;
        padding: 24px;
    }

    .chart-wrap-sm {
        position: relative;
        height: 250px;
    }

    .chart-wrap-md {
        position: relative;
        height: 320px;
    }

    .period-btn {
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #475569;
        padding: 9px 14px;
        border-radius: 14px;
        font-size: 12px;
        font-weight: 600;
        transition: 0.2s ease;
        cursor: pointer;
    }

    .period-btn:hover {
        background: #f8fafc;
    }

    .period-btn.active {
        background: #2563eb;
        color: #fff;
        border-color: #2563eb;
    }
</style>
<div class="min-h-screen">
    <div class="flex-1">
        <main class="px-4 py-8 sm:px-6 lg:px-8">
            <section class="mb-6 overflow-hidden rounded-[28px] gradient-slate text-white soft-shadow">
                <div class="grid gap-6 px-6 py-7 lg:grid-cols-[1.7fr_1fr] lg:px-8">
                    <div>
                        <p class="text-sm font-semibold text-blue-200">Selamat Datang</p>
                        <h1 class="mt-2 text-3xl font-bold leading-tight">Dashboard Evaluasi Pengajuan dan Pengadaan</h1>
                        <p class="mt-3 max-w-3xl text-sm leading-6 text-slate-300">
                            Pantau tren aktual pengajuan dan pengadaan, status proses, aktivitas bagian, serta evaluasi permintaan secara lebih profesional dan ringkas.
                        </p>
                    </div>

                    <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-1">
                        <button onclick="exportExcel()" class="rounded-2xl bg-emerald-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-emerald-600">
                            Export Excel
                        </button>
                        <button onclick="exportPDF()" class="rounded-2xl bg-rose-500 px-5 py-3 text-sm font-semibold text-white transition hover:bg-rose-600">
                            Export PDF + Chart
                        </button>
                    </div>
                </div>
            </section>

            <section class="mb-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-[26px] bg-white p-5 soft-shadow">
                    <div class="mb-4 flex items-center justify-between">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-orange-100 text-2xl">📦</div>
                        <span class="rounded-full px-3 py-1 text-xs font-semibold mini-badge-orange">Stock</span>
                    </div>
                    <p class="text-sm text-slate-500">Stock Barang</p>
                    <p class="mt-2 text-3xl font-bold text-slate-900">245</p>
                    <p class="mt-2 text-sm text-slate-500">Stock aktif.</p>
                </div>

                <div class="rounded-[26px] bg-white p-5 soft-shadow">
                    <div class="mb-4 flex items-center justify-between">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-100 text-2xl">📝</div>
                        <span class="rounded-full px-3 py-1 text-xs font-semibold mini-badge-blue">Pengajuan</span>
                    </div>
                    <p class="text-sm text-slate-500">Data Pengajuan</p>
                    <p class="mt-2 text-3xl font-bold text-slate-900">18</p>
                    <p class="mt-2 text-sm text-slate-500">Permintaan masuk.</p>
                </div>

                <div class="rounded-[26px] bg-white p-5 soft-shadow">
                    <div class="mb-4 flex items-center justify-between">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-100 text-2xl">🛒</div>
                        <span class="rounded-full px-3 py-1 text-xs font-semibold mini-badge-green">Pengadaan</span>
                    </div>
                    <p class="text-sm text-slate-500">Data Pengadaan</p>
                    <p class="mt-2 text-3xl font-bold text-slate-900">12</p>
                    <p class="mt-2 text-sm text-slate-500">Tahap pengadaan.</p>
                </div>

                <div class="rounded-[26px] bg-white p-5 soft-shadow">
                    <div class="mb-4 flex items-center justify-between">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-pink-100 text-2xl">📊</div>
                        <span class="rounded-full px-3 py-1 text-xs font-semibold mini-badge-pink">Evaluasi</span>
                    </div>
                    <p class="text-sm text-slate-500">Permintaan Aktif</p>
                    <p class="mt-2 text-3xl font-bold text-slate-900">9</p>
                    <p class="mt-2 text-sm text-slate-500">Masih diproses.</p>
                </div>
            </section>

            <!-- Chart utama dengan filter periode -->
            <section class="mb-6">
                <div class="chart-card soft-shadow">
                    <div class="mb-5 flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-slate-900">Pergerakan Pengajuan vs Pengadaan</h2>
                            <p class="mt-1 text-sm text-slate-500">Tren aktual pengajuan dan data yang diproses ke pengadaan berdasarkan periode.</p>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <button class="period-btn active" data-period="harian">Harian</button>
                            <button class="period-btn" data-period="mingguan">Mingguan</button>
                            <button class="period-btn" data-period="bulanan">Bulanan</button>
                            <button class="period-btn" data-period="tahunan">Tahunan</button>
                        </div>
                    </div>

                    <div class="chart-wrap-md">
                        <canvas id="movementChart"></canvas>
                    </div>
                </div>
            </section>

            <!-- Row 1 -->
            <section id="evaluationCharts" class="mb-6">
                <div class="grid gap-6 xl:grid-cols-2">
                    <div class="chart-card soft-shadow">
                        <div class="mb-4">
                            <h2 class="text-lg font-bold text-slate-900">Status Pengajuan</h2>
                            <p class="mt-1 text-sm text-slate-500">Distribusi pengajuan berdasarkan tahap proses.</p>
                        </div>
                        <div class="chart-wrap-sm">
                            <canvas id="submissionStatusChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card soft-shadow">
                        <div class="mb-4">
                            <h2 class="text-lg font-bold text-slate-900">Status Pengadaan</h2>
                            <p class="mt-1 text-sm text-slate-500">Distribusi hasil evaluasi admin.</p>
                        </div>
                        <div class="chart-wrap-sm">
                            <canvas id="procurementStatusChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="mt-6 grid gap-6 xl:grid-cols-3">
                    <div class="rounded-[28px] bg-white p-6 soft-shadow">
                        <div class="mb-4">
                            <h2 class="text-xl font-bold text-slate-900">Peminta Paling Aktif</h2>
                            <p class="mt-1 text-sm text-slate-500">Siapa yang paling sering mengajukan barang.</p>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-4">
                                <div>
                                    <p class="font-semibold text-slate-900">Rizky Ramadhan</p>
                                    <p class="text-sm text-slate-500">Operasional</p>
                                </div>
                                <span class="rounded-full bg-blue-50 px-3 py-1 text-sm font-semibold text-blue-700">6 Kali</span>
                            </div>

                            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-4">
                                <div>
                                    <p class="font-semibold text-slate-900">Nadia Putri</p>
                                    <p class="text-sm text-slate-500">Keuangan</p>
                                </div>
                                <span class="rounded-full bg-emerald-50 px-3 py-1 text-sm font-semibold text-emerald-700">4 Kali</span>
                            </div>

                            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-4">
                                <div>
                                    <p class="font-semibold text-slate-900">Fajar Hidayat</p>
                                    <p class="text-sm text-slate-500">SDM</p>
                                </div>
                                <span class="rounded-full bg-amber-50 px-3 py-1 text-sm font-semibold text-amber-700">3 Kali</span>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[28px] bg-white p-6 soft-shadow">
                        <div class="mb-4">
                            <h2 class="text-xl font-bold text-slate-900">Barang yang Paling Sering Diminta</h2>
                            <p class="mt-1 text-sm text-slate-500">Barang yang paling banyak muncul dalam pengajuan.</p>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-4">
                                <div>
                                    <p class="font-semibold text-slate-900">Sepatu Running Pro</p>
                                    <p class="text-sm text-slate-500">Footwear</p>
                                </div>
                                <span class="rounded-full bg-blue-50 px-3 py-1 text-sm font-semibold text-blue-700">5 Kali</span>
                            </div>

                            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-4">
                                <div>
                                    <p class="font-semibold text-slate-900">Kaos Olahraga Dri-Fit</p>
                                    <p class="text-sm text-slate-500">Apparel</p>
                                </div>
                                <span class="rounded-full bg-emerald-50 px-3 py-1 text-sm font-semibold text-emerald-700">4 Kali</span>
                            </div>

                            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-4">
                                <div>
                                    <p class="font-semibold text-slate-900">Topi Olahraga UV</p>
                                    <p class="text-sm text-slate-500">Accessories</p>
                                </div>
                                <span class="rounded-full bg-amber-50 px-3 py-1 text-sm font-semibold text-amber-700">3 Kali</span>
                            </div>
                        </div>
                    </div>

                    <div class="chart-card soft-shadow">
                        <div class="mb-4">
                            <h2 class="text-xl font-bold text-slate-900">Bagian Paling Sering Minta</h2>
                            <p class="mt-1 text-sm text-slate-500">Perbandingan frekuensi permintaan antar bagian.</p>
                        </div>
                        <div class="chart-wrap-sm">
                            <canvas id="divisionRequestChart"></canvas>
                        </div>
                    </div>
                </div>
            </section>

            <section class="rounded-[28px] bg-white soft-shadow">
                <div class="flex flex-col gap-4 border-b border-slate-200 px-6 py-5 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Tabel Evaluasi Pengajuan dan Pengadaan</h2>
                        <p class="mt-1 text-sm text-slate-500">
                            Menampilkan nama peminta, bagian, barang, jumlah, status, dan sumber proses.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <input
                            type="text"
                            placeholder="Cari nama / bagian / barang..."
                            class="h-11 rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100" />
                        <select class="h-11 rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-100">
                            <option>Semua Status</option>
                            <option>Pengajuan</option>
                            <option>Diproses</option>
                            <option>Disetujui semua</option>
                            <option>Disetujui sebagian</option>
                            <option>Ditolak</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table id="evaluationTable" class="min-w-full divide-y divide-slate-200 text-sm">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-6 py-4 text-left font-semibold text-slate-600">Nama Peminta</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-600">Bagian</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-600">Nama Barang</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-600">Kode</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-600">Kategori</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-600">Jumlah</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-600">Status</th>
                                <th class="px-6 py-4 text-left font-semibold text-slate-600">Sumber</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white">
                            <tr>
                                <td class="px-6 py-4 font-medium text-slate-900">Rizky Ramadhan</td>
                                <td class="px-6 py-4">Operasional</td>
                                <td class="px-6 py-4">Sepatu Running Pro</td>
                                <td class="px-6 py-4">MAP-001</td>
                                <td class="px-6 py-4">Footwear</td>
                                <td class="px-6 py-4">120</td>
                                <td class="px-6 py-4"><span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">Disetujui semua</span></td>
                                <td class="px-6 py-4">Pengadaan</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-medium text-slate-900">Nadia Putri</td>
                                <td class="px-6 py-4">Keuangan</td>
                                <td class="px-6 py-4">Kaos Olahraga Dri-Fit</td>
                                <td class="px-6 py-4">MAP-002</td>
                                <td class="px-6 py-4">Apparel</td>
                                <td class="px-6 py-4">80</td>
                                <td class="px-6 py-4"><span class="rounded-full bg-yellow-50 px-3 py-1 text-xs font-semibold text-yellow-700">Disetujui sebagian</span></td>
                                <td class="px-6 py-4">Pengadaan</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-medium text-slate-900">Fajar Hidayat</td>
                                <td class="px-6 py-4">SDM</td>
                                <td class="px-6 py-4">Tas Gym Active</td>
                                <td class="px-6 py-4">MAP-003</td>
                                <td class="px-6 py-4">Accessories</td>
                                <td class="px-6 py-4">30</td>
                                <td class="px-6 py-4"><span class="rounded-full bg-red-50 px-3 py-1 text-xs font-semibold text-red-700">Ditolak</span></td>
                                <td class="px-6 py-4">Pengadaan</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-medium text-slate-900">Rizky Ramadhan</td>
                                <td class="px-6 py-4">Operasional</td>
                                <td class="px-6 py-4">Celana Training Elite</td>
                                <td class="px-6 py-4">MAP-004</td>
                                <td class="px-6 py-4">Apparel</td>
                                <td class="px-6 py-4">60</td>
                                <td class="px-6 py-4"><span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">Disetujui semua</span></td>
                                <td class="px-6 py-4">Pengadaan</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-medium text-slate-900">Alya Safira</td>
                                <td class="px-6 py-4">Marketing</td>
                                <td class="px-6 py-4">Topi Olahraga UV</td>
                                <td class="px-6 py-4">MAP-005</td>
                                <td class="px-6 py-4">Accessories</td>
                                <td class="px-6 py-4">45</td>
                                <td class="px-6 py-4"><span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">Disetujui semua</span></td>
                                <td class="px-6 py-4">Pengadaan</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-medium text-slate-900">Nadia Putri</td>
                                <td class="px-6 py-4">Keuangan</td>
                                <td class="px-6 py-4">Agency Website</td>
                                <td class="px-6 py-4">PGJ-001</td>
                                <td class="px-6 py-4">Active</td>
                                <td class="px-6 py-4">3900</td>
                                <td class="px-6 py-4"><span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700">Pengajuan</span></td>
                                <td class="px-6 py-4">Pengajuan</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</div>

<script>
    Chart.defaults.font.family = 'Inter, ui-sans-serif, system-ui, sans-serif';
    Chart.defaults.color = '#64748b';

    const commonGrid = {
        color: 'rgba(148,163,184,0.14)'
    };

    const commonTicks = {
        color: '#64748b',
        font: {
            size: 11
        }
    };

    const movementData = {
        harian: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            pengajuan: [12, 15, 10, 18, 14, 11, 16],
            pengadaan: [8, 9, 11, 12, 10, 9, 13]
        },
        mingguan: {
            labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
            pengajuan: [4, 6, 3, 5],
            pengadaan: [2, 3, 4, 3]
        },
        bulanan: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            pengajuan: [20, 24, 18, 27, 23, 30],
            pengadaan: [16, 18, 17, 20, 21, 24]
        },
        tahunan: {
            labels: ['2021', '2022', '2023', '2024', '2025'],
            pengajuan: [120, 145, 160, 180, 210],
            pengadaan: [95, 110, 135, 150, 175]
        }
    };

    let movementChart, submissionStatusChart, procurementStatusChart, divisionRequestChart;

    function createMovementChart(period = 'harian') {
        const ctx = document.getElementById('movementChart');
        const selected = movementData[period];

        if (movementChart) {
            movementChart.destroy();
        }

        movementChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: selected.labels,
                datasets: [{
                        label: 'Pengajuan Aktual',
                        data: selected.pengajuan,
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37,99,235,0.10)',
                        fill: true,
                        tension: 0.4,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        pointBackgroundColor: '#2563eb',
                        borderWidth: 3
                    },
                    {
                        label: 'Pengadaan Aktual',
                        data: selected.pengadaan,
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16,185,129,0.08)',
                        fill: true,
                        tension: 0.4,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        pointBackgroundColor: '#10b981',
                        borderWidth: 3
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            boxWidth: 10
                        }
                    },
                    tooltip: {
                        backgroundColor: '#0f172a',
                        titleColor: '#fff',
                        bodyColor: '#e2e8f0',
                        padding: 12,
                        borderColor: '#1e293b',
                        borderWidth: 1
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: commonTicks
                    },
                    y: {
                        beginAtZero: true,
                        grid: commonGrid,
                        ticks: commonTicks
                    }
                }
            }
        });
    }

    submissionStatusChart = new Chart(document.getElementById('submissionStatusChart'), {
        type: 'bar',
        data: {
            labels: ['Masuk', 'Diproses', 'Diteruskan'],
            datasets: [{
                label: 'Jumlah',
                data: [18, 10, 7],
                backgroundColor: ['#3b82f6', '#6366f1', '#06b6d4'],
                borderRadius: 14,
                borderSkipped: false,
                barThickness: 28
            }]
        },
        options: {
            indexAxis: 'y',
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#0f172a',
                    titleColor: '#fff',
                    bodyColor: '#e2e8f0',
                    padding: 12
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    grid: commonGrid,
                    ticks: commonTicks
                },
                y: {
                    grid: {
                        display: false
                    },
                    ticks: commonTicks
                }
            }
        }
    });

    procurementStatusChart = new Chart(document.getElementById('procurementStatusChart'), {
        type: 'doughnut',
        data: {
            labels: ['Disetujui semua', 'Disetujui sebagian', 'Ditolak'],
            datasets: [{
                data: [3, 1, 1],
                backgroundColor: ['#22c55e', '#f59e0b', '#ef4444'],
                borderWidth: 0,
                hoverOffset: 8
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        pointStyle: 'circle',
                        boxWidth: 10
                    }
                },
                tooltip: {
                    backgroundColor: '#0f172a',
                    titleColor: '#fff',
                    bodyColor: '#e2e8f0',
                    padding: 12
                }
            },
            cutout: '70%'
        }
    });

    divisionRequestChart = new Chart(document.getElementById('divisionRequestChart'), {
        type: 'bar',
        data: {
            labels: ['Operasional', 'Keuangan', 'SDM', 'Marketing', 'IT'],
            datasets: [{
                label: 'Frekuensi Permintaan',
                data: [6, 4, 3, 2, 1],
                backgroundColor: ['#2563eb', '#10b981', '#f59e0b', '#8b5cf6', '#06b6d4'],
                borderRadius: 14,
                borderSkipped: false,
                barThickness: 20
            }]
        },
        options: {
            indexAxis: 'y',
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#0f172a',
                    titleColor: '#fff',
                    bodyColor: '#e2e8f0',
                    padding: 12
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    grid: commonGrid,
                    ticks: commonTicks
                },
                y: {
                    grid: {
                        display: false
                    },
                    ticks: commonTicks
                }
            }
        }
    });

    document.querySelectorAll('.period-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.period-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            createMovementChart(this.dataset.period);
        });
    });

    createMovementChart('harian');

    async function exportExcel() {
        const table = document.getElementById('evaluationTable');
        const workbook = XLSX.utils.table_to_book(table, {
            sheet: "Dashboard Evaluasi"
        });
        XLSX.writeFile(workbook, 'dashboard-evaluasi-admin.xlsx');
    }

    async function exportPDF() {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF('l', 'pt', 'a4');
        const pageWidth = doc.internal.pageSize.getWidth();

        doc.setFontSize(18);
        doc.text('Dashboard Evaluasi Pengajuan dan Pengadaan', 40, 35);

        doc.setFontSize(10);
        doc.text('Laporan evaluasi admin beserta visualisasi chart.', 40, 55);

        const movementImg = movementChart.toBase64Image('image/png', 1);
        const submissionImg = submissionStatusChart.toBase64Image('image/png', 1);
        const procurementImg = procurementStatusChart.toBase64Image('image/png', 1);
        const divisionImg = divisionRequestChart.toBase64Image('image/png', 1);

        doc.setFontSize(12);
        doc.text('1. Pergerakan Pengajuan vs Pengadaan', 40, 82);
        doc.addImage(movementImg, 'PNG', 40, 92, pageWidth - 80, 180);

        doc.addPage('a4', 'landscape');
        doc.setFontSize(16);
        doc.text('2. Chart Evaluasi', 40, 35);

        doc.text('Status Pengajuan', 40, 60);
        doc.addImage(submissionImg, 'PNG', 40, 70, 220, 180);

        doc.text('Status Pengadaan', 290, 60);
        doc.addImage(procurementImg, 'PNG', 290, 70, 220, 180);

        doc.text('Bagian Paling Sering Minta', 540, 60);
        doc.addImage(divisionImg, 'PNG', 540, 70, 220, 180);

        doc.addPage('a4', 'landscape');
        doc.setFontSize(16);
        doc.text('3. Tabel Evaluasi', 40, 35);

        doc.autoTable({
            html: '#evaluationTable',
            startY: 50,
            styles: {
                fontSize: 8.5,
                cellPadding: 6
            },
            headStyles: {
                fillColor: [37, 99, 235]
            }
        });

        doc.save('dashboard-evaluasi-admin.pdf');
    }
</script>


@endsection