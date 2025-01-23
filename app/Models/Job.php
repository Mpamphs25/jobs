<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    
    protected $table = 'lara_jobs';

    protected $fillable = ['title','description','location','salary','category','experience'];

    public static array $expierience = ['entry','intermediate','senior'];

    public static array $categories = ['IT','Finance','Sales','Marketing'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
