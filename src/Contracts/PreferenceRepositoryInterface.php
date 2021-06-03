<?php

namespace Pratiksh\Adminetic\Contracts;

use Pratiksh\Adminetic\Http\Requests\PreferenceRequest;
use Pratiksh\Adminetic\Models\Admin\Preference;

interface PreferenceRepositoryInterface
{
    public function indexPreference();

    public function createPreference();

    public function storePreference(PreferenceRequest $request);

    public function showPreference(Preference $Preference);

    public function editPreference(Preference $Preference);

    public function updatePreference(PreferenceRequest $request, Preference $Preference);

    public function destroyPreference(Preference $Preference);
}
