@extends('layouts.app')

@section('title', 'Trang cá nhân - GreenTech')

@section('content')
    <div class="w-full min-w-0 bg-[#f8fafc]">
        <div class="container-site py-8 lg:py-10">
            <div class="flex flex-col gap-8 lg:flex-row lg:gap-10">
                {{-- Sidebar: full width on mobile, fixed width on desktop --}}
                <aside class="w-full shrink-0 lg:w-64">
                    <div class="card p-4 lg:sticky lg:top-24">
                        <div class="mb-4 flex items-center gap-3 rounded-lg border border-[#d1fae5] bg-[#ecfdf5] p-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#059669] text-lg font-semibold text-white">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div class="min-w-0">
                                <p class="truncate font-semibold text-[#1f2937]">{{ $user->name }}</p>
                                <p class="truncate text-xs text-[#64748b]">{{ $user->email }}</p>
                            </div>
                        </div>

                        <nav class="space-y-1">
                            <a href="{{ route('profile.dashboard') }}" @class([
                                'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium',
                                'bg-[#ecfdf5] text-[#059669]' => request()->routeIs('profile.dashboard'),
                                'text-[#64748b] hover:bg-[#f8fafc]' => ! request()->routeIs('profile.dashboard'),
                            ])>
                                <i class="fas fa-chart-line w-5 text-center" aria-hidden="true"></i>
                                Bảng điều khiển
                            </a>
                            <a href="{{ route('profile.settings') }}" @class([
                                'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium',
                                'bg-[#ecfdf5] text-[#059669]' => request()->routeIs('profile.settings'),
                                'text-[#64748b] hover:bg-[#f8fafc]' => ! request()->routeIs('profile.settings'),
                            ])>
                                <i class="fas fa-cog w-5 text-center" aria-hidden="true"></i>
                                Cài đặt tài khoản
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="border-t border-[#f1f5f9] pt-2">
                                @csrf
                                <button type="submit" class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-red-600 hover:bg-red-50">
                                    <i class="fas fa-sign-out-alt w-5 text-center" aria-hidden="true"></i>
                                    Đăng xuất
                                </button>
                            </form>
                        </nav>
                    </div>
                </aside>

                <div class="min-w-0 flex-1">
                    @yield('profile_content')
                </div>
            </div>
        </div>
    </div>
@endsection
