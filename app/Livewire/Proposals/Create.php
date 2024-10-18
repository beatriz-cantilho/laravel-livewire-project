<?php

namespace App\Livewire\Proposals;

use App\Models\Project;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    public Project $project;

    public bool $modal = false;


    #[Rule(['required', 'email'])]
    public string $email = '';


    #[Rule(['required', 'numeric', 'min:1'])]
    public int $hours = 0;

    public function save()
    {
        $this->validate();

        $this->project->proposals()
        ->updateOrCreate([
            ['email' => $this->email],
            ['hours' => $this->hours]
        ]);
    }

    public function render()
    {
        return view('livewire.proposals.create');
    }
}
