@extends('profile.layout')

@section('profile_content')
    <div class="p-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Bảng điều khiển</h1>
            <p class="mt-2 text-gray-600">Xin chào <span class="font-semibold">{{ $user->name }}</span>, chào mừng bạn quay lại!</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
            <!-- Card 1: Số dư ví tiền -->
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm opacity-50">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Số dư ví tiền</p>
                        <div class="mt-2">
                            <span class="inline-block rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                                Đang triển khai
                            </span>
                        </div>
                    </div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100">
                        <i class="fas fa-wallet text-blue-600"></i>
                    </div>
                </div>
            </div>

            <!-- Card 2: Cấp bậc -->
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm opacity-50">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Cấp bậc</p>
                        <div class="mt-2">
                            <span class="inline-block rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                                Đang triển khai
                            </span>
                        </div>
                    </div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-100">
                        <i class="fas fa-medal text-emerald-600"></i>
                    </div>
                </div>
            </div>

            <!-- Card 3: Max Out Hoàn Vốn -->
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm opacity-50">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Max Out Hoàn Vốn</p>
                        <div class="mt-2">
                            <span class="inline-block rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                                Đang triển khai
                            </span>
                        </div>
                    </div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-orange-100">
                        <i class="fas fa-chart-bar text-orange-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transaction History -->
        <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
            <div class="border-b border-gray-200 px-6 py-4">
                <h2 class="text-lg font-semibold text-gray-900">Danh sách giao dịch</h2>
            </div>

            <!-- Search & Filter -->
            <div class="border-b border-gray-200 px-6 py-4 space-y-4">
                <div class="flex flex-col gap-4 md:flex-row md:items-end">
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Từ khóa tìm kiếm</label>
                        <input type="text" placeholder="Tìm kiếm..." class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Trạng thái</label>
                        <select class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500">
                            <option>Tất cả trạng thái</option>
                            <option>Thành toán</option>
                            <option>Chờ xử lý</option>
                            <option>Từ chối</option>
                        </select>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ngày</label>
                        <input type="date" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>
                </div>
            </div>

            <!-- Transaction Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="border-b border-gray-200 bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold text-gray-900">ID</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-900">Tiền</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-900">Mã đơn hàng</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-900">Loại giao dịch</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-900">Vị</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-900">Trạng thái</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-900">Chi chú</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center gap-3">
                                    <i class="fas fa-inbox text-4xl text-gray-300"></i>
                                    <p class="text-gray-500 font-medium">Chưa có giao dịch nào</p>
                                    <p class="text-sm text-gray-400">Danh sách giao dịch của bạn sẽ hiển thị tại đây</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-between border-t border-gray-200 px-6 py-4">
                <div class="text-sm text-gray-600">
                    Chưa có dữ liệu giao dịch
                </div>
                <div class="flex gap-2">
                    <button class="rounded-lg border border-gray-300 px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="rounded-lg border border-gray-300 px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50" disabled>
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
