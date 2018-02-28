<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Check the value is null or not.
     * If null, return to the index of the category.
     *
     * @param null $value The value that should be checked
     * @param string $category The category that should be redirected
     * @return \Illuminate\Http\RedirectResponse|null
     */
    protected function checkNull($value = null, $category = 'admin') {
        if ($value == null) {
            return redirect()->route("{$category}.index");
        }
        return null;
    }

    /**
     * Convert nl2br(text) to textarea
     *
     * @param string $text
     * @return string
     */
    protected function br2nl($text){
        return preg_replace('/<br\\s*?\/??>/i','',$text);
    }

}
