<?php namespace Devmax\TrackerClient\Skin;

use Backend\Skins\Standard as BackendSkin;
use Illuminate\Support\Facades\Log;

/**
 * Modified backend skin information file.
 *
 * This is modified to include an additional path to override the default layouts.
 *
 */

class CustomSkin extends BackendSkin
{
    /**
     * {@inheritDoc}
     */
    public function getLayoutPaths()
    {
        return [
            plugins_path('/devmax/trackerclient/skin/layouts'),
            $this->skinPath . '/layouts'
        ];
    }
}
