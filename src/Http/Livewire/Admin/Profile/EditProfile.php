<?php

namespace Pratiksh\Adminetic\Http\Livewire\Admin\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use Pratiksh\Adminetic\Models\Admin\Profile;

class EditProfile extends Component
{
    use WithFileUploads;

    public $username;
    public $profile_pic;
    public $gender;
    public $martial_status;
    public $blood_group;
    public $country;
    public $address;
    public $phone_no = [];
    public $email;
    public $birthday;
    public $facebook;
    public $instagram;
    public $twitter;
    public $linkedin;
    public $father_name;
    public $mother_name;

    public $profile;

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
        $this->user_id = $profile->user_id;
        $this->username = $profile->username;
        $this->profile_pic = $profile->profile_pic;
        $this->status = $profile->getRawOriginal('status');
        $this->gender = $profile->getRawOriginal('gender');
        $this->martial_status = $profile->getRawOriginal('martial_status');
        $this->blood_group = $profile->getRawOriginal('blood_group');
        $this->country = $profile->country;
        $this->address = $profile->address;
        $this->phone_no = $profile->phone_no;
        $this->email = $profile->email;
        $this->birthday = $profile->birthday;
        $this->facebook = $profile->facebook;
        $this->instagram = $profile->instagram;
        $this->twitter = $profile->twitter;
        $this->linkedin = $profile->linkedin;
        $this->father_name = $profile->father_name;
        $this->mother_name = $profile->mother_name;
    }
    public function submit()
    {
        // Validate Data
        $validatedData = $this->validate([
            'username' => 'nullable|max:100',
            'profile_pic' => 'nullable|file|image|max:5000',
            'gender' => 'nullable|numeric|max:3',
            'martial_status' => 'nullable|numeric|max:8',
            'blood_group' => 'nullable|numeric|max:15',
            'country' => 'nullable|max:50',
            'address' => 'nullable|max:255',
            'phone_no' => 'nullable|max:10',
            'email' => 'nullable|max:255',
            'birthday' => 'nullable|nullable',
            'facebook' => 'nullable|max:255',
            'instagram' => 'nullable|max:255',
            'twitter' => 'nullable|max:255',
            'linkedin' => 'nullable|max:255',
            'father_name' => 'nullable|max:255',
            'mother_name' => 'nullable|max:255',
        ]);
        // Update Profile
        $this->profile->update($validatedData);
        $this->uploadProfile($this->profile);
        // Initialize Events
        $this->emit('profile_updated');
    }

    protected function uploadProfile($profile)
    {
        if (isset($this->profile_pic)) {

            $profile->update([
                'profile_pic' => $this->profile_pic->store('admin/user', 'public')
            ]);
            $image = Image::make($this->profile_pic->getRealPath());
            $image->save(public_path('storage/' . $profile->profile_pic));
        }
    }

    public function render()
    {
        $this->emit('initializeProfile');
        $countries = json_decode(Http::get('https://restcountries.eu/rest/v2/all'));
        return view('adminetic::livewire.admin.profile.edit-profile', compact('countries'));
    }
}
