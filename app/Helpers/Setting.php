<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Modules\Setting\Models\Settings;

class Setting {
    public static function get_setting() {
        $data = Settings::first();
        return $data;
    }
}
