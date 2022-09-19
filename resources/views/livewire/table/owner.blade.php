<div>
    <x-data-table :data="$data" :model="$owners">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th>Name</th>
                <th>Email</th>
                <th><a wire:click.prevent="sortBy('current_users')" role="button" href="#">
                        Current Vendor
                        @include('components.sort-icon', ['field' => 'current_users'])
                    </a>
                </th>
                <th><a wire:click.prevent="sortBy('max_users')" role="button" href="#">
                        Max Vendor
                        @include('components.sort-icon', ['field' => 'max_users'])
                    </a>
                <th><a wire:click.prevent="sortBy('expired_at')" role="button" href="#">
                        Expired At
                        @include('components.sort-icon', ['field' => 'expired_at'])
                    </a>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($owners as $owner)
                <tr x-data="window.__controller.dataTableController({{ $owner->id }})">
                    <td>{{ $owner->id }}</td>
                    <td>{{ $owner->user->name }}</td>
                    <td>{{ $owner->user->email }}</td>
                    <td>{{ $owner->current_users }}</td>
                    <td>{{ $owner->max_users }}</td>
                    <td>{{ $owner->expired_at }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.owner-edit', ['ownerId' => $owner->id]) }}"
                            class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i
                                class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
