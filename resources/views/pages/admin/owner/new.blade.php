<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Produk Owner Baru') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Owner</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.user-new') }}">Buat Produk Owner Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:admin.create-owner action="createOwner" />
    </div>
</x-app-layout>
