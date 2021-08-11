<?php

namespace App\Observers;

use App\Models\MainCategories;

class MainCategoriesObserver
{
    /**
     * Handle the main categories "created" event.
     *
     * @param  \App\Models\MainCategories  $mainCategories
     * @return void
     */
    public function created(MainCategories $mainCategories)
    {
        //
    }

    /**
     * Handle the main categories "updated" event.
     *
     * @param  \App\Models\MainCategories  $mainCategories
     * @return void
     */
    public function updated(MainCategories $mainCategories)
    {
        $categories = $mainCategories->categories;
        foreach ($categories as $category) {
            if ($category->language->active == 1) {
                $category->update(['active' => $mainCategories->active]);
            }
        }

        $vendors =  $mainCategories->vendors;
        foreach ($vendors as $vendor) {
            if ($vendor->active != null || $vendor->active === 0) {
                $vendor->update(['active' => $mainCategories->active]);
            }
        }

        $subCategories = $mainCategories->subCategories;
        foreach ($subCategories as $subCategory) {
            if ($subCategory->language->active == 1) {
                $subCategory->update(['active' => $mainCategories->active]);
            }
        }
    }

    /**
     * Handle the main categories "deleted" event.
     *
     * @param  \App\Models\MainCategories  $mainCategories
     * @return void
     */
    public function deleted(MainCategories $mainCategories)
    {
        $mainCategories->categories()->delete();
        $mainCategories->vendors()->delete();
    }

    /**
     * Handle the main categories "restored" event.
     *
     * @param  \App\Models\MainCategories  $mainCategories
     * @return void
     */
    public function restored(MainCategories $mainCategories)
    {
        //
    }

    /**
     * Handle the main categories "force deleted" event.
     *
     * @param  \App\Models\MainCategories  $mainCategories
     * @return void
     */
    public function forceDeleted(MainCategories $mainCategories)
    {
        //
    }
}
