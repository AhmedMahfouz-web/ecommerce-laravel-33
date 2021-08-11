<?php

namespace App\Observers;

use App\Models\Languages;

class LanguagesObserver
{
    /**
     * Handle the languages "created" event.
     *
     * @param  \App\Models\Languages  $languages
     * @return void
     */
    public function created(Languages $languages)
    {
        //
    }

    /**
     * Handle the languages "updated" event.
     *
     * @param  \App\Models\Languages  $languages
     * @return void
     */
    public function updated(Languages $languages)
    {
        foreach ($languages->main_category as $main_category) {
            if ($main_category->main_category->active == $languages->active) {
                $main_category->update(['active' => $languages->active]);
            }
        }

        foreach ($languages->sub_category as $sub_category) {
            if ($sub_category->main_category->active == $languages->active) {
                if ($sub_category->sub_categories->active == $languages->active) {
                    $sub_category->update(['active' => $languages->active]);
                }
            }
        }
    }

    /**
     * Handle the languages "deleted" event.
     *
     * @param  \App\Models\Languages  $languages
     * @return void
     */
    public function deleted(Languages $languages)
    {
        //
    }

    /**
     * Handle the languages "restored" event.
     *
     * @param  \App\Models\Languages  $languages
     * @return void
     */
    public function restored(Languages $languages)
    {
        //
    }

    /**
     * Handle the languages "force deleted" event.
     *
     * @param  \App\Models\Languages  $languages
     * @return void
     */
    public function forceDeleted(Languages $languages)
    {
        //
    }
}
