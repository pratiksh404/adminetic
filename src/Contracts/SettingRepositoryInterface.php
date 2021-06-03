<?php

namespace Pratiksh\Adminetic\Contracts;

use Illuminate\Http\Request;
use Pratiksh\Adminetic\Http\Requests\SettingRequest;
use Pratiksh\Adminetic\Models\Admin\Setting;

interface SettingRepositoryInterface
{
    public function indexSetting();

    public function createSetting();

    public function storeSetting(SettingRequest $request);

    public function showSetting(Setting $Setting);

    public function editSetting(Setting $Setting);

    public function updateSetting(SettingRequest $request, Setting $Setting);

    public function destroySetting(Setting $Setting);

    public function setting_store(Request $request);
}
