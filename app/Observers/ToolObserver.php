<?php

namespace App\Observers;

use App\Models\Tool;
use App\Service\AssignmentService;

class ToolObserver
{
    public function updating(Tool $tool): void
    {
        $oldTool = Tool::find($tool->id);

        if($oldTool->user_id !== $tool->user_id){

            is_null($oldTool->user_id)
                ? AssignmentService::logAssignment('release', $tool)
                : AssignmentService::logAssignment('capture', $oldTool);
        }
    }

    /**
     * Handle the Tool "created" event.
     *
     * @param  \App\Models\Tool  $tool
     * @return void
     */
    public function created(Tool $tool)
    {
        //
    }

    /**
     * Handle the Tool "updated" event.
     *
     * @param  \App\Models\Tool  $tool
     * @return void
     */
    public function updated(Tool $tool)
    {
    }

    /**
     * Handle the Tool "deleted" event.
     *
     * @param  \App\Models\Tool  $tool
     * @return void
     */
    public function deleted(Tool $tool)
    {
        //
    }

    /**
     * Handle the Tool "restored" event.
     *
     * @param  \App\Models\Tool  $tool
     * @return void
     */
    public function restored(Tool $tool)
    {
        //
    }

    /**
     * Handle the Tool "force deleted" event.
     *
     * @param  \App\Models\Tool  $tool
     * @return void
     */
    public function forceDeleted(Tool $tool)
    {
        //
    }
}
