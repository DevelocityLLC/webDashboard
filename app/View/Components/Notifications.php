<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Notifications extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $tasknotifications;
    public $reqnotifications;
    public function __construct($tasknotifications, $reqnotifications)
    {
        $this->tasknotifications = $tasknotifications;
        $this->reqnotifications = $reqnotifications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $tasknotifications = $this->tasknotifications; 
        $reqnotifications = $this->reqnotifications; 

        return $tasknotifications != null ?
                             view('components.notifications', compact('tasknotifications'))->render()
                            :
                            view('components.notifications', compact('reqnotifications'))->render(); 

    }
}
