<?php

namespace Pratiksh\Adminetic\Http\Livewire\Admin\Profile;

use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
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
        $this->country = $profile->country ?? 'Nepal';
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
                'profile_pic' => $this->profile_pic->store('admin/user', 'public'),
            ]);
            $image = Image::make($this->profile_pic->getRealPath());
            $image->save(public_path('storage/'.$profile->profile_pic));
        }
    }

    public function render()
    {
        $this->emit('initializeProfile');
        $countries = ['Afghanistan', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antarctica', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia and Herzegowina', 'Botswana', 'Bouvet Island', 'Brazil', 'British Indian Ocean Territory', 'Brunei Darussalam', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Christmas Island', 'Cocos (Keeling) Islands', 'Colombia', 'Comoros', 'Congo', 'Congo, the Democratic Republic of the', 'Cook Islands', 'Costa Rica', "Cote d'Ivoire", 'Croatia (Hrvatska)', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'East Timor', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Falkland Islands (Malvinas)', 'Faroe Islands', 'Fiji', 'Finland', 'France', 'France Metropolitan', 'French Guiana', 'French Polynesia', 'French Southern Territories', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Heard and Mc Donald Islands', 'Holy See (Vatican City State)', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran (Islamic Republic of)', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', "Korea, Democratic People's Republic of", 'Korea, Republic of', 'Kuwait', 'Kyrgyzstan', "Lao, People's Democratic Republic", 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libyan Arab Jamahiriya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macau', 'Macedonia, The Former Yugoslav Republic of', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Micronesia, Federated States of', 'Moldova, Republic of', 'Monaco', 'Mongolia', 'Montserrat', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'Netherlands Antilles', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'Northern Mariana Islands', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Reunion', 'Romania', 'Russian Federation', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia (Slovak Republic)', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia and the South Sandwich Islands', 'Spain', 'Sri Lanka', 'St. Helena', 'St. Pierre and Miquelon', 'Sudan', 'Suriname', 'Svalbard and Jan Mayen Islands', 'Swaziland', 'Sweden', 'Switzerland', 'Syrian Arab Republic', 'Taiwan, Province of China', 'Tajikistan', 'Tanzania, United Republic of', 'Thailand', 'Togo', 'Tokelau', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks and Caicos Islands', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'United States Minor Outlying Islands', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Venezuela', 'Vietnam', 'Virgin Islands (British)', 'Virgin Islands (U.S.)', 'Wallis and Futuna Islands', 'Western Sahara', 'Yemen', 'Yugoslavia', 'Zambia', 'Zimbabwe'];

        return view('adminetic::livewire.admin.profile.edit-profile', compact('countries'));
    }
}
