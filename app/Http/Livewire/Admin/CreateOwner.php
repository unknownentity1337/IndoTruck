<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Owner;
use App\Models\User;

class CreateOwner extends Component
{
    public $user;
    public $owner;
    public $ownerId;
    public $action;
    public $button;


    protected function getRules()
    {
        $rules = ($this->action == "createOwner") ? [
            'owner.user_id' => 'required|unique:owners,user_id'
        ] :
            [
                'owner.max_users' => 'required',
                'owner.expired_at' => 'required'
            ];
        return $rules;
    }

    public function createOwner()
    {
        $this->resetErrorBag();
        $this->validate();
        Owner::create($this->owner);
        $this->emit('saved');
        $this->reset('owner');
    }

    public function updateOwner()
    {
        $this->resetErrorBag();
        $this->validate();
        Owner::query()
            ->where('id', $this->ownerId)
            ->update([
                "max_users" => $this->owner->max_users,
                "expired_at" => $this->owner->expired_at,
            ]);
        $this->emit('saved');
    }

    public function mount()
    {
        if (!$this->owner && $this->ownerId) {
            $this->owner = Owner::find($this->ownerId);
        }
        $this->user = User::where('role', 2)->get();
        $this->button = create_button($this->action, "Owner");
    }

    public function render()
    {

        return view('livewire.admin.create-owner');
    }
}