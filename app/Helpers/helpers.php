<?php
if (!function_exists('visitor')) {
    /**
     * Access visitor through helper.
     *
     * @return \App\Helpers\Visitor
     */
    function visitor()
    {
        return app(\App\Helpers\Visitor::class);
    }
}
