<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Owner') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data user baru') }}
        </x-slot>
        <x-slot name="form">

            @if ($action == 'createOwner')
                <div class="form-group col-span-6 sm:col-span-5">
                    <x-jet-label for="user_id" value="{{ __('Role') }}" />
                    <select wire:model.defer="owner.user_id" id="user_id"
                        class="mt-1 block w-full form-control shadow-none">
                        <option value="">-- SELECT OWNER --</option>
                        @forelse ($user as $r)
                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                        @empty
                        @endforelse
                    </select>
                    <x-jet-input-error for="owner.user_id" class="mt-2" />
                </div>
            @else
                <div class="form-group col-span-6 sm:col-span-5">
                    <x-jet-label for="user_id" value="{{ __('Owner') }}" />
                    <small>Nama Owner</small>
                    <x-jet-input id="user_id" type="text" class="mt-1 block w-full"
                        value="{{ $this->owner->user->name }}" readonly="true" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>
            @endif

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="max_users" value="{{ __('Max Vendor') }}" />
                <x-jet-input id="max_users" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="owner.max_users" />
                <x-jet-input-error for="owner.max_users" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="expired_at" value="{{ __('Expired At') }}" />
                <x-jet-input id="expired_at" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="owner.expired_at" />
                <x-jet-input-error for="owner.expired_at" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>

        </x-slot>
    </x-jet-form-section>

    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>
