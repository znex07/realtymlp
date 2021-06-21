<?php
namespace App;

use App\Department;
use App\Location;
use App\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{

    // use SoftDeletes;
    protected $dates = ['deleted_at'];
    //
    protected $table = 'properties';
    // protected $appends = ['convert_listing_type','province_name','city_name','classification_name'];
    protected $fillable = [
        'property_code',
        'listing_type',
        'condition_type',
        'ownership_type',
        'availability_type',
        'property_title',
        'property_classifications',
        'property_types',
        'bldg_name',
        'province',
        'province_title',
        'city',
        'city_title',
        'brgy',
        'street_address',
        'village',
        'google_lang',
        'google_lat',
        'map_options',
        'lot_area',
        'floor_area',
        'bedrooms',
        'bathrooms',
        'maid_room',
        'parking',
        'balcony',
        'property_price',
        'rental_price',
        'rental_stat',
        'selling_price',
        'selling_stat',
        'description',
        'user_id',
        'property_status',
        'property_stat',
        'sharables',
        'files_metadata',
        'tagging',
        'personal_notes',
        'visibility'
    ];
    /* ======================================
                    Relations
    =======================================*/

    public function getConvertedJasonAttribute()
    {
        return json_decode($this->sharables);
    }
    public function unshared()
    {
        $more_damn = collect([]);
            foreach ($this->shares as $demn)
            {
                $more_damn->push($demn->id);
            }

        return $this->owner->ConfirmedAffiliates()->whereNotIn('affiliate_id',$more_damn);
    }
    public function unshared_group()
    {
        $more_damn_group = collect([]);
        foreach ($this->groups as $demn_group)
        {
            $more_damn_group->push($demn_group->id);
        }

        return $this->owner->joinedgroups()->whereNotIn('group_id',$more_damn_group);
    }
    public function getPropertyUser($property_id)
    {
        $map = PropertyUser::where('property_id','=',$property_id)->pluck('sharables');
        return json_decode($map);
    }
    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function property_logs() {

        return $this->hasMany('App\Property_Log','property_code','property_code');
    }

    public function cat_condition_type()
    {
        return $this->hasOne('App\Category', 'category_id', 'condition_type')
                    ->where('code', 4);
    }

    public function cat_ownership_type()
    {
        return $this->hasOne('App\Category', 'category_id', 'ownership_type')
                    ->where('code', 6);
    }

    public function cat_availability_type()
    {
        return $this->hasOne('App\Category', 'category_id', 'availability_type')
                    ->where('code', 5);
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id' , 'id');
    }

    public function files()
    {
        return $this->hasMany('App\FilePic', 'property_code', 'property_code');
    }

    public function images()
    {
        return $this->files()->where('file_category', 1)->orderBy('status', 'desc');
    }
    public function cimages()
    {
        return $this->files()->where('file_category', 1);
    }

    public function thumbnail()
    {
        return $this->images()->where('status', 1)->first();
    }

    public function documents()
    {
        return $this->files()->where('file_category', 2);
    }

    public function shares()
    {
        return $this->belongsToMany('App\User')
                    ->withPivot('sharables')
            ->withPivot('user_fullname')
            ->withPivot('ownership_type')
            ->withPivot('ownership_id')
                    ->withTimestamps();
    }

    public function groups()
    {
      return $this->belongsToMany('App\Group')
                  ->withPivot('sharables')
                  ->withTimestamps();
    }

    public function groupsname()
    {
        return $this->belongsToMany('App\Group')
            ->withPivot('group_title')
            ->withTimestamps();
    }


    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function fulldddress()
    {
      return $this->hasOne('App\LocationProperty','property_code','property_code');
    }

    public function dept_classification()
    {
      return $this->hasOne('App\Department', 'id','property_classifications');
    }

    public function dept_type()
    {
      return $this->hasOne('App\Department', 'id','property_types');
    }

    public function getPublishedDepartmentAttribute()
    {
        if ($this->property_classification > -1 && $this->property_type > 0 && ($this->departmentType && $this->departmentClassification)) {
            return $this->departmentType->department_name .', '. $this->departmentClassification->department_name;
        }
        else if ($this->property_classification > 0 && $this->property_type < 1 && $this->departmentClassification) {
            return $this->departmentClassification->department_name;
        }
        return '';
    }

    public function trans_listing_type()
    {
      return $this->hasOne('App\Transaction', 'id', 'listing_type');
    }

    public function loc_province()
    {
        return $this->hasOne('App\Location', 'id', 'province');
    }

    public function loc_city()
    {
        return $this->hasOne('App\Location', 'id', 'city');
    }

    /* ======================================
                    Attributes
    =======================================*/
    // use this
    public function getFormattedAddressAttribute()
    {
      return formatAddress($this->province_name, $this->city_name, $this->brgy, $this->street_address, $this->village);
    }
    // use this
    public function getFormattedDepartmentsAttribute()
    {
      return $this->dept_classification->department_name .', '. $this->dept_type->department_name;
    }
    // use this
    public function getFormattedPriceStatAttribute()
    {
        if($this != null) {

            if (!$this->PriceStat()->isEmpty()) {
                $stat = '';
                $price = 0;
                if ($this->PriceStat()->get('stat') !== 'gross' && $this->PriceStat()->get('stat') !== 'per_month') {
                    $unit = $this->PriceStat()->get('stat') === 'sqm_lot_area' ? $this->lot_area : $this->floor_area;
                    if ($this->listing_type == 2) {
                        $price = gross_price($this->PriceStat()->get('price'), $unit);
                        return formatPrice($price);
                    } elseif ($this->listing_type == 1) {
                        return formatPrice($this->PriceStat()->get('price')) . '/w' . substr(str_replace('_', ' ', $this->PriceStat()->get('stat')), 4);
                    }
                }
                return formatPrice($this->PriceStat()->get('price'));
            } else if ($this->PriceStat()->isEmpty()) {
                return 'Open For Venture';
            }
        }
        return '';
    }

    public function getFormattedPricePerAttribute()
    {
        if (!$this->PriceStat()->isEmpty()) {
            $stat = $this->PriceStat()->get('stat');
            $price = 0;
            if ($stat !== 'gross' && $stat != 'per_month') {
                $unit = $stat === 'sqm_lot_area' ? $this->lot_area : $this->floor_area;
                if ($unit) {
                    if ($this->listing_type == 2) 
                        return formatPrice($this->PriceStat()->get('price'), $unit);
                }
            }
        }
    }

    public function getElipsedAddressAttribute($add)
    {
        return str_limit($add, 40);
    }

    public function getLocationsAttribute()
    {
        return [
            'province' => $this->province_name,
            'city' => $this->city_name,
            'brgy' => $this->brgy,
            'street_address' => $this->street_address,
            'village' => $this->village
        ];
    }

    /* ======================================
                      Scopes
    =======================================*/
    public function scopePublicProperties($query)
    {
      return $query->where('property_status', 1);
    }

    public function scopePrivateProperties($query)
    {
      return $query->where('property_status', 2);
    }

    public function scopeQuickProperties($query)
    {
      return $query->where('property_status', 3);
    }

    /* ======================================
                      Others
    =======================================*/
    public function getConvertListingTypeAttribute()
    {
        $listing_type = $this->listing_type;

        if(empty($listing_type))
            return '';

        $ltype = empty($listing_type) ? '' : explode('-', $this->listing_type);
        $types = [];
        foreach ($ltype as $type => $value) {
            $value = intval($value);
            $trans = \App\Transaction::select('title')->find($value);
            array_push($types, $trans->title);
        }
        return $types;
    }

    public function PriceStat()
    {
      $trans = $this->trans_listing_type;
      if ($trans->id == 1) {
        return collect([
          'price' => $this->rental_price,
          'stat' => $this->rental_stat,
        ]);
      }
      else if ($trans->id == 2) {
        return collect([
          'price' => $this->selling_price,
          'stat' => $this->selling_stat,
        ]);
      }
      else if ($trans->id == 4) {
        return collect([
        ]);
      }
    }

    public function getPropertyAttributesAttribute()
    {
        return json_encode([
            'lot_area' => floatval($this->lot_area) > 0 ? floatval($this->lot_area) : '',
            'floor_area' => floatval($this->floor_area) > 0 ? floatval($this->floor_area) : '',
            'bedrooms' => intval($this->bedrooms) > 0 ? intval($this->bedrooms) : '',
            'bathrooms' => intval($this->bathrooms) > 0 ? intval($this->bathrooms) : '',
            'parking' => intval($this->parking) > 0 ? intval($this->parking) : '',
            'balcony' => intval($this->balcony) > 0 ? intval($this->balcony) : ''
        ]);
    }

    public function getProvinceNameAttribute()
    {
        $province = Location::where('id', '=', $this->province)->select('name')->get();
        if ($province->count())
          return $province[0]->name;
        return '';
    }

    public function getCityNameAttribute()
    {
        $city = Location::where('id', '=', $this->city)->select('name')->get();
        if ($city->count())
          return $city[0]->name;
        return '';
    }

    // di na gagamitin
    public function getPublishedAddressAttribute()
    {
      $city = $this->city_name;
      $province = $this->province_name;
      $address = $this->street_address . ' '. $this->village;
      $address = empty($address) ? $address . ' ,' : '';
      $full = $address . $city . ', ' . $province;
      if ($address == '' && $city == '' && $province)
        return null;
      return $full;
    } 
    
    public function getIsPrivateAttribute()
    {
      return $this->property_status == 2 ? true : false;
    }

    public function getSharableDataAttribute()
    {
        $data = [
            'id' => $this->id,
            'location' => [
                'brgy' => $this->brgy ? true : false,
                'street_address' => $this->street_address ? true : false,
                'village' => $this->village ? true : false,
            

            ],
            'details' => [
                // 'price' => ,
                'bedrooms' => $this->bedrooms ? true : false,
                'bathrooms' => $this->bedrooms ? true : false,
                'parking' => $this->parking ? true : false,
                'balcony' => $this->balcony ? true : false,
                'description' => $this->description ? true : false,
            ],
            'attachments' => [
                'images' => [],
                'documents' => [],
            ]

        ];
        if ($this->images()->count()) {
            foreach ($this->images as $image) {
                array_push($data['attachments']['images'], $image);
            }
        }
        if ($this->documents()->count()) {
            foreach ($this->documents as $document) {
                array_push($data['attachments']['documents'], $document);
            }
        }

        return $data;
    }

    public function getFilterContentsAttribute()
    {
        $data = [
            'listing_type' => $this->listing_type,
            'condition_type' => $this->condition_type,
            'availability_type' => $this->availability_type,
            'ownership_type' => $this->ownership_type,
            'property_classifications' => $this->property_classifications,
            'property_types' => $this->property_types,
            'province' => $this->province,
            'city' => $this->city,
        ];

        return json_encode($data);
    }

    public function getPublishedPropertyStatusAttribute()
    {
        $status = 0;
        if ($this->property_status <= 2 && $this->property_status > 0)
            $status = $this->property_status == 1 ? 'public_listing' : 'private_listing';
        return $status;
    }

    public function getPublishedStatAttribute()
    {
        if (!$this->PriceStat()->isEmpty()) {
            if ($this->PriceStat()->get('stat') !== 'gross' && $this->PriceStat()->get('stat') !== 'per_month')
                return formatPrice($this->PriceStat()->get('price')) .'/sqm';
            else
                return formatPrice($this->PriceStat()->get('price')) .'/month';
        }
    }

    public function getPublishedPriceAttribute()
    {
        $lastPrice = [];
//        dd(!$this->PriceStat());
        if ( !$this->PriceStat()->isEmpty() ) {
            $baseStat = $this->PriceStat()->get('stat');
            $basePrice = $this->PriceStat()->get('price');
            $unit = $baseStat === 'sqm_lot_area' ? $this->lot_area : $this->floor_area;
            if ( $this->listing_type == 2 ) {
                if ( $baseStat !== 'gross') {

                    $suffix = trim(str_replace("_"," ",$baseStat), "sqm ");
                    if ($unit) {
                        $price = formatPrice(gross_price($basePrice, $unit));
                        $lastPrice['primary'] = '&#8369; ' . $price;
                        $lastPrice['secondary'] = '&#8369; ' . formatPrice($basePrice) .'/sqm on '. $suffix;
                    }
                    else {
                        $lastPrice['primary'] = '&#8369; ' . formatPrice($basePrice);
                        $lastPrice['secondary'] = '';
                    }
                }
                else {
                    $suffix = trim(str_replace("_"," ",$unit), "sqm ");
                    $price = $basePrice;
                    $lastPrice['primary'] = '&#8369; ' . $price;
                    $lastPrice['secondary'] = '';
                }
            }
            else {
                if ( $baseStat !== 'per_month') {
                    $suffix = trim(str_replace("_"," ",$baseStat), "sqm ");
                    if ($unit) {
                        $price = formatPrice(gross_price($basePrice, $unit));
                        $lastPrice['primary'] = '&#8369; ' . $price .'/month';
                        $lastPrice['secondary'] = '&#8369; ' . formatPrice($basePrice) .'/sqm on '. $suffix;
                    }
                    else {
                        $lastPrice['primary'] = '&#8369; ' . formatPrice($basePrice);
                        $lastPrice['secondary'] = '';
                    }
                }
                else {
                    // $suffix = trim(str_replace("_"," ",$unit), "sqm ");
                    $price = formatPrice(gross_price($basePrice, $unit));
                    $lastPrice['primary'] = '&#8369; ' . formatPrice($basePrice) . '/month';
                    $lastPrice['secondary'] = '';
                }
            }
            return collect($lastPrice);
        }
        return collect(['primary' => 'For Joint Venture', 'secondary' => '']);
    }

    public function getMoveToAttribute()
    {
        return $this->property_status <= 2 && $this->property_status == 1  ? 'Private' : 'Public';
    }
    public function scopeSearchLocation($query, $location, $listing_type){
        if($location) $query->where('listing_type', $listing_type)
            ->where('city_title','LIKE', '%' . $location . '%');
    }
}

