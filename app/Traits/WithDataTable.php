<?php

namespace App\Traits;


trait WithDataTable
{

    public function get_pagination_data()
    {
        switch ($this->name) {

            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.user-new'),
                            'create_new_text' => 'Buat User Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'owner':
                $owners = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.owner',
                    "owners" => $owners,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.owner-new'),
                            'create_new_text' => 'Buat Produk Owner Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;


            default:
                # code...
                break;
        }
    }
}