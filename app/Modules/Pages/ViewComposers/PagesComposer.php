<?php

namespace App\Modules\Pages\ViewComposers;

use App\Modules\Pages\Repository\PageRepository;
use Illuminate\View\View;

class PagesComposer
{
    public $pages = [];

    /**
     * Create a Home composer.
     *
     *  @param HomeRepository $Home
     *
     * @return void
     */
    public function __construct(PageRepository $page)
    {
        $this->pages =  $page->getAllActive();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('pages' , $this->pages);
    }
}
