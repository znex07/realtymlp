<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use App\Property;
use DB;
class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
       
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_code',
        'user_type',
        'user_subscription',
        'user_fname',
        'user_lname',
        'email',
        'password',
        'user_phone',
        'current_address',
        'lat',
        'lang',
        'referrer_id',
        'activation_code',
        'broker_name',
        'broker_web',
        'broker_address',
        'broker_desc',
        'headline',
        'descibe',
        'sharables'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['user_password', 'remember_token'];

    protected $appends = [
        'full_name',
    ];

    public function getFullNameAttribute()
    {
        return ucfirst($this->user_fname) . ' ' . ucfirst($this->user_lname);
    }

    public function ownedgroups()
    {
        return $this->hasMany('App\Group');
    }

    public function joinedgroups()
    {
        return $this->belongsToMany('App\Group')
                    ->withTimestamps();
    }

    public function joinedgroupsproperties()
    {
        return $this->hasMany('App\Property', 'App\Group');
    }
    public function getSharedAffiliateName($property_id){
        return  DB::table('property_user')->where('property_id','=',$property_id);

    }
    public function getAvailableSharedListings($id) {
        $user_shared_by_me = DB::table('user_subscribe')->where('id', '=', $id)->pluck('shared_by_me');
        return $user_shared_by_me;
    }
    public function getNumListings($id, $type) {
        $user_avail_listings = DB::table('user_subscribe')->where('id', '=', $id)->pluck('listings');
        $user_total_listings = DB::table('subscription')->where('id', '=', $id)->pluck('listings');

        if($type == 'available'){
            return $user_avail_listings;
        } elseif ($type == 'total') {
            return $user_total_listings;
        }
    }
    public function getNumRequirements($id, $type) {
        $user_avail_requirements = DB::table('user_subscribe')->where('id', '=', $id)->pluck('requirements');
        $user_total_requirements = DB::table('subscription')->where('id', '=', $id)->pluck('requirements');

        if($type == 'available'){
            return $user_avail_requirements;
        } elseif ($type == 'total') {
            return $user_total_requirements;
        }
    }
    public function getNumAffiliate($id, $type) {

        $user_avail_affiliate = DB::table('user_subscribe')->where('id', '=', $id)->pluck('affiliates');
        $user_total_affiliate = DB::table('subscription')->where('id', '=', $id)->pluck('affiliates');

        if($type == 'available'){
            return $user_avail_affiliate;
        } elseif ($type == 'total') {
            return $user_total_affiliate;
        }
    }
    public function getAvailableSharedToMe($id){
        $user_shared_to_me = DB::table('user_subscribe')->where('id', '=', $id)->pluck('shared_to_me');
        return $user_shared_to_me;
    }
    public function getSubscriptionType($subscription_id){
        $subscription_listings = DB::table('subscription')->where('id', '=', $subscription_id)->pluck('listings');
            return $subscription_listings;
    }
    public function getSubscriptionTypeName($subscription_id){
        $subscription_type_name = DB::table('subscription')->where('id', '=', $subscription_id)->pluck('name');
            return $subscription_type_name;
    }
    public function updateAvailableListings($id)
    {
        $user_listings = DB::table('user_subscribe')->where('id', '=', $id)->pluck('listings');
//        dd($user_listings);
        // $user_listings->update($user_listings - 1);
    }

    public function getProfileImageAttribute()
    {
        if ($this->attributes['profile_image'] === '') {
            return 'basic.jpg';
        }

        return $this->attributes['profile_image'];
    }
    public function disableProperty($id, $visibility){

        $disabled_property = Property::where('id','=',$id)->first();
        $disabled_property->visibility = $visibility;
        $disabled_property->save();
    }
    public function disableRequirement($id, $visibility){
        $disabled_requirement = Requirements::where('id','=',$id)->first();
        $disabled_requirement->visibility = $visibility;
        $disabled_requirement->save();
    }
    public function properties()
    {
        return $this->hasMany('App\Property');
    }
    public function requirements()
    {
        return $this->hasMany('App\Requirements');
    }

    public function pictures()
    {
        return $this->hasMany('App\FilePic');
    }

    public function shares()
    {
        return $this->belongsToMany('App\Property')->withPivot('sharables')->withPivot('user_fullname')->withPivot('ownership_type')->withPivot('ownership_id')->withTimestamps();
    }

    public function group_property()
    {
        return $this->belongsToMany('App\Group')->withTimestamps();
    }

    public function affiliates()
    {
        return $this->belongsToMany('App\User', 'user_user', 'user_id', 'affiliate_id')
            ->withPivot('is_confirmed', 'is_confirmable')
            ->withTimestamps();
    }

    public function confirmedAffiliates()
    {
        return $this->affiliates()
            ->where('is_confirmed', true);
    }

    public function pendingAffiliates()
    {
        return $this->affiliates()
            ->where('is_confirmed', false)
            ->where('is_confirmable', false);
    }

    public function newAffiliates()
    {
        return $this->affiliates()
            ->where('is_confirmed', false)
            ->where('is_confirmable', true);
    }

    public function newMessage(){
        return $this->hasMany('App\Thread','to_id')->where('is_unread',false);
    }

    public function scopeBy($query,$by,$order)
    {
        return $query->orderBy($by,$order);
    }

    public function threads()
    {
        return $this->hasMany('App\Thread')->orderBy('created_at', 'asc');
//        return $this->hasMany('App\Thread')->groupBy('to_id')->orderBy('created_at', 'asc');
    }

    public function toArray()
    {
        $data = parent::toArray();
        $data['profile_image'] = $data['profile_image'] === '' ? 'basic.jpg' : $data['profile_image'];

        return $data;
    }

    public function scopeMembers($qry)
    {
      return $qry->where('user_type', 1);
    }
    public function scopePublicAgents($qry)
    {
      return $qry->where('status', 1);
    }
    public function getMsg($id){
       return str_limit( Thread::where('to_id',$id)->limit(1)->orderBy('created_at','desc')->pluck('subject'),20);
    }

}
