<?php

namespace Pratiksh\Adminetic\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pratiksh\Adminetic\Contracts\SettingRepositoryInterface;
use Pratiksh\Adminetic\Http\Requests\SettingRequest;
use Pratiksh\Adminetic\Models\Admin\Setting;

class SettingController extends Controller
{
    protected $settingRepositoryInterface;

    public function __construct(SettingRepositoryInterface $settingRepositoryInterface)
    {
        $this->settingRepositoryInterface = $settingRepositoryInterface;
        $this->authorizeResource(Setting::class, 'setting');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminetic::admin.setting.index', $this->settingRepositoryInterface->indexSetting());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminetic::admin.setting.create', $this->settingRepositoryInterface->createSetting());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Pratiksh\Adminetic\Http\Requests\SettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {
        $this->settingRepositoryInterface->storeSetting($request);

        return redirect(adminRedirectRoute('setting'))->withSuccess('Setting Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Pratiksh\Adminetic\Models\Admin\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        return view('adminetic::admin.setting.show', $this->settingRepositoryInterface->showSetting($setting));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Pratiksh\Adminetic\Models\Admin\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('adminetic::admin.setting.edit', $this->settingRepositoryInterface->editSetting($setting));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Pratiksh\Adminetic\Http\Requests\SettingRequest  $request
     * @param  \Pratiksh\Adminetic\Models\Admin\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, Setting $setting)
    {
        $this->settingRepositoryInterface->updateSetting($request, $setting);

        return redirect(adminRedirectRoute('setting'))->withInfo('Setting Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Pratiksh\Adminetic\Models\Admin\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $this->settingRepositoryInterface->destroySetting($setting);

        return redirect(adminRedirectRoute('setting'))->withFail('Setting Deleted Successfully.');
    }

    /**
     * Setting Store.
     */
    public function setting_store(Request $request)
    {
        $this->settingRepositoryInterface->setting_store($request);

        return redirect(adminRedirectRoute('setting'))->withInfo('Settings Saved !.');
    }
}
