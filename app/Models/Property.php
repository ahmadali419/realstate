<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Property extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // Property.php
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'property_features'); // Replace 'feature_property' with your actual pivot table name
    }
    public function images()
    {
        return $this->belongsToMany(PropertyImage::class, 'property_images','property_id','image'); // Replace 'feature_property' with your actual pivot table name
    }

    public function propertyImages(){
        return $this->hasMany(PropertyImage::class);

    }
    public function propertyFeatures(){
        return $this->hasMany(propertyFeature::class);

    }
   
  
    public function user()
        {
            return $this->belongsTo(User::class);
        }

    // Feature.php
    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }
}
