<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'google_id',
            'facebook_id',
            'linkedin_id',
            'name',
            'email',
            'password',
            'company_name',
            'about_company',
            'web-site',
            'mobile_number',
            'state',
            'city',
            'first_name',
            'last_name',
            'adharcard_number',
            'proofid_number',
            'age',
            'gender',
            'job_profile',
            'skills',
            'job_city',
            'education',
            'job_working',
            'currently_working',
            'curlast_company',
            'job_time',
            'salary',
            'language',
            'user_type',
			'website_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'confirm_password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function uimage()
    {
        return $this->hasOne(Uimage::class,'u_id','id');
    }

}
