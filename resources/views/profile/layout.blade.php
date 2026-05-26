@extends('layouts.app')

@section('title', 'Trang cá nhân - GreenTech')

@section('content')
    <div class="flex min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <aside class="w-64 border-r border-gray-200 bg-white shadow-sm">
            <div class="space-y-1 p-4">
                <!-- User Info -->
                <div class="mb-6 rounded-lg border border-emerald-100 bg-emerald-50 p-4">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="h-12 w-12 flex items-center justify-center rounded-full bg-emerald-600 text-white font-semibold text-lg">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">{{ $user->name }}</p>
                            <p class="text-xs text-gray-500">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>

                <!-- Menu Items -->
                <nav class="space-y-1">
                    <a href="{{ route('profile.dashboard') }}" @class([
                        'flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition',
                        'bg-emerald-50 text-emerald-700' => request()->routeIs('profile.dashboard'),
                        'text-gray-600 hover:bg-gray-50 hover:text-emerald-600' => !request()->routeIs('profile.dashboard'),
                    ])>
                        <i class="fas fa-chart-line w-5 text-center"></i>
                        <span>Bảng điều khiển</span>
                    </a>

                    <a href="javascript:void(0)" class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-emerald-600">
                        <i class="fas fa-shopping-cart w-5 text-center"></i>
                        <span>Quản lý đơn hàng</span>
                    </a>

                    <a href="javascript:void(0)" class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-emerald-600">
                        <i class="fas fa-tree w-5 text-center"></i>
                        <span>Cây của tôi</span>
                    </a>

                    <a href="javascript:void(0)" class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-emerald-600">
                        <i class="fas fa-history w-5 text-center"></i>
                        <span>Lịch sử rút tiền</span>
                    </a>

                    <a href="javascript:void(0)" class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-emerald-600">
                        <i class="fas fa-undo w-5 text-center"></i>
                        <span>Lịch sử hoàn hàng</span>
                    </a>

                    <a href="javascript:void(0)" class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-emerald-600">
                        <i class="fas fa-users w-5 text-center"></i>
                        <span>Danh sách thành viên</span>
                    </a>

                    <a href="javascript:void(0)" class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-emerald-600">
                        <i class="fas fa-link w-5 text-center"></i>
                        <span>Tiếp thị liên kết</span>
                    </a>

                    <a href="javascript:void(0)" class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-emerald-600">
                        <i class="fas fa-bell w-5 text-center"></i>
                        <span>Thông báo</span>
                    </a>

                    <a href="{{ route('profile.settings') }}" @class([
                        'flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition',
                        'bg-emerald-50 text-emerald-700' => request()->routeIs('profile.settings'),
                        'text-gray-600 hover:bg-gray-50 hover:text-emerald-600' => !request()->routeIs('profile.settings'),
                    ])>
                        <i class="fas fa-cog w-5 text-center"></i>
                        <span>Cài đặt tài khoản</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="pt-2 border-t border-gray-200">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-red-600 transition hover:bg-red-50">
                            <i class="fas fa-sign-out-alt w-5 text-center"></i>
                            <span>Đăng xuất</span>
                        </button>
                    </form>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1">
            @yield('profile_content')
        </main>
    </div>
@endsection
