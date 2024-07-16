<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionButton extends Component
{
    public string $color;
    public string $localization;
    /**
     * Create a new component instance.
     */
    public function __construct(public string $href, public string $type)
    {
        if ($type == 'create') {
            $this->color = 'primary';
            $this->localization = __('keywords.add_new');
        } elseif ($type == 'edit') {
            $this->color = 'warning';
            $this->localization = __('keywords.edit_button');
        } elseif ($type == 'show') {
            $this->color = 'success';
            $this->localization = __('keywords.show_button');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action-button');
    }
}
