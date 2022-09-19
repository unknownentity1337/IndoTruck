<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Owner') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Owner</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.owner-list') }}">Data Owner</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="owner" :model="$owner" />
    </div>
</x-app-layout>
