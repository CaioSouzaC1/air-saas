<?php

namespace App\Livewire\Home;

use Livewire\Component;


/**
 * Summary of FeatureListItem
 * 
 * @property string $icon
 * @property string $title
 * @property string $subtitle
 */
class FeatureListItem extends Component
{

    public string $icon;
    public string $title;
    public string $subtitle;

    public function render()
    {
        return view('livewire.home.feature-list-item');
    }
}
