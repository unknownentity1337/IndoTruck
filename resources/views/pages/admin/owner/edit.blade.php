<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Owner') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.owner-list') }}">Owner</a></div>
            <div class="breadcrumb-item"><a href="#">Edit Owner</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:admin.create-owner action="updateOwner" :ownerId="request()->ownerId" />
    </div>
</x-app-layout>
