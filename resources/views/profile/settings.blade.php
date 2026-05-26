@extends('profile.layout')

@section('profile_content')
    <div class="p-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Cài đặt tài khoản</h1>
            <p class="mt-2 text-gray-600">Quản lý thông tin cá nhân của bạn</p>
        </div>

        <!-- Settings Card -->
        <div class="max-w-2xl rounded-lg border border-gray-200 bg-white shadow-sm">
            <div class="border-b border-gray-200 px-6 py-4">
                <h2 class="text-lg font-semibold text-gray-900">Thông tin cá nhân</h2>
            </div>

            <form class="space-y-6 p-6">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">Họ và tên</label>
                        <input 
                            type="text" 
                            id="name" 
                            value="{{ $user->name }}"
                            disabled
                            class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-gray-900 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500"
                        >
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-900 mb-2">Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            value="{{ $user->email }}"
                            disabled
                            class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-gray-900 focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500"
                        >
                    </div>

                    <!-- Created At -->
                    <div>
                        <label for="created_at" class="block text-sm font-semibold text-gray-900 mb-2">Ngày tạo tài khoản</label>
                        <input 
                            type="text" 
                            id="created_at" 
                            value="{{ $user->created_at->format('d/m/Y H:i') }}"
                            disabled
                            class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-gray-900"
                        >
                    </div>

                    <!-- Updated At -->
                    <div>
                        <label for="updated_at" class="block text-sm font-semibold text-gray-900 mb-2">Cập nhật lần cuối</label>
                        <input 
                            type="text" 
                            id="updated_at" 
                            value="{{ $user->updated_at->format('d/m/Y H:i') }}"
                            disabled
                            class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-gray-900"
                        >
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-6">
                    <p class="text-sm text-gray-600 mb-4">Để cập nhật thông tin, vui lòng liên hệ với hỗ trợ khách hàng.</p>
                    <a href="mailto:support@greenvide.local" class="inline-flex items-center gap-2 rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700">
                        <i class="fas fa-envelope"></i>
                        Liên hệ hỗ trợ
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
