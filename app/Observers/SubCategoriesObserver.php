<?php

namespace App\Observers;

use App\Models\SubCategories;

class SubCategoriesObserver
{
    /**
     * Handle the sub categories "created" event.
     *
     * @param  \App\Models\SubCategories  $subCategories
     * @return void
     */
    public function created(SubCategories $subCategories)
    {
        //
    }

    /**
     * Handle the sub categories "updated" event.
     *
     * @param  \App\Models\SubCategories  $subCategories
     * @return void
     */
    public function updated(SubCategories $subCategories)
    {
        $categories = $subCategories->categories;
        foreach ($categories as $category) {
            if ($category->language->active == 1) {
                $category->update(['active' => $subCategories->active]);
            }
        }

        $sub_Categories = $subCategories->sub_sub_categories;
        foreach ($sub_Categories as $sub_category) {
            if ($sub_category->language->active == 1) {
                $sub_category->update(['active' => $subCategories->active]);
            }
        }
    }

    /**
     * Handle the sub categories "deleted" event.
     *
     * @param  \App\Models\SubCategories  $subCategories
     * @return void
     */
    public function deleted(SubCategories $subCategories)
    {
        $subCategories->categories()->delete();
        $subCategories->sub_sub_categories()->delete();
    }

    /**
     * Handle the sub categories "restored" event.
     *
     * @param  \App\Models\SubCategories  $subCategories
     * @return void
     */
    public function restored(SubCategories $subCategories)
    {
        //
    }

    /**
     * Handle the sub categories "force deleted" event.
     *
     * @param  \App\Models\SubCategories  $subCategories
     * @return void
     */
    public function forceDeleted(SubCategories $subCategories)
    {
        //
    }
}
