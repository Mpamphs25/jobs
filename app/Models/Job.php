<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    
    protected $table = 'lara_jobs';

    protected $fillable = ['title','description','location','salary','category','experience'];

    public static array $expierience = ['Entry','Intermediate','Senior'];

    public static array $categories = ['IT','Finance','Sales','Marketing'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeFilterJobsByTitleOrDescription($query,$searchField)
    {
  
        return $query->when($searchField, function($query) use ($searchField){
            $query->where('title', 'like', '%' . $searchField . '%')
                  ->orWhere('description', 'like', '%' . $searchField . '%');
        });
    }

    public function scopeFilterJobsByMinSalary($query, $searchField)
    {
        return $query->when($searchField, function ($query) use ($searchField) {
            $cleanedSearchField = str_replace(',', '', $searchField);
            $query->where('salary', '>=', $cleanedSearchField);
        }); 
    }

    public function scopeFilterJobsByMaxSalary($query, $searchField)
    {
        $cleanedSearchField = str_replace(',', '', $searchField);

        return $query->when($searchField, function ($query) use ($cleanedSearchField) {
            return $query->where('salary', '<=', $cleanedSearchField);
        });
    }

    public function scopeFilterJobsByExpierience($query, $radio)
    {
        return $query->when($radio, fn($query) => $query->where('experience', $radio));
    }

    public function scopeFilterJobsByCategory($query, $radio)
    {
        return $query->when($radio, fn($query) => $query->where('category', $radio));
    }
}
