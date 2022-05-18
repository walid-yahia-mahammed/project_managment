<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Task;
use Illuminate\Support\Carbon;
class taskCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    private $taskId;
    
    public function __construct($taskId)
    {
        $this->taskId = $taskId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $task = Task::where('id',$this->taskId)->get()->first();
        $task->since = $task->updated_at->diffForHumans();
        switch($task->state){
            case 'done':
                $class = 'badge-success';
                break;
            case 'doing':
                $class = 'badge-warning';
                break;
            default : 
                $class = 'badge-danger';

        }
        return view('components.task-card',['task'=>$task,'stateclass'=>$class]);
    }

    public function updatedsins($date){
        $sinces = (array)Carbon::now()->diffFor($date);
        foreach($sinces as $key => $since){
            if($since !=0){
                return [$key , $since];
            }
        }
        //dd($since);
        return $since;
    }
}
