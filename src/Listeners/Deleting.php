<?php

namespace Wildside\Userstamps\Listeners;
use Encore\Admin\Facades\Admin;

class Deleting {

    /**
     * When the model is being deleted.
     *
     * @param Illuminate\Database\Eloquent $model
     * @return void
     */
    public function handle($model)
    {
        if (! $model -> isUserstamping()) {
            return;
        }

        if (is_null($model -> {$model -> getDeletedByColumn()})) {
            $model -> {$model -> getDeletedByColumn()} = Admin::user()->id;
        }

        $model -> save();
    }
}
