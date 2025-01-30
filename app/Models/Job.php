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

    // public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder
    // {
    //     return $query->when($filters['search'] ?? null, function ($query, $search) {
    //         $query->where(function ($query) use ($search) {
    //             $query->where('title', 'like', '%' . $search . '%')
    //                 ->orWhere('description', 'like', '%' . $search . '%');
    //         });
    //     })->when($filters['min_salary'] ?? null, function ($query, $minSalary) {
    //         $query->where('salary', '>=', $minSalary);
    //     })->when($filters['max_salary'] ?? null, function ($query, $maxSalary) {
    //         $query->where('salary', '<=', $maxSalary);
    //     })->when($filters['experience'] ?? null, function ($query, $experience) {
    //         $query->where('experience', $experience);
    //     })->when($filters['category'] ?? null, function ($query, $category) {
    //         $query->where('category', $category);
    //     });
    // }
}
