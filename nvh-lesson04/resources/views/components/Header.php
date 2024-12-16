<?php
namespace App\View\Components;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
class Header extends Component
{
    public $name;
    public $fruits;
    public function __construct($name,$fruits)
    {
        $this->name = $name;
        $this->fruits=$fruits;
    }

    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}