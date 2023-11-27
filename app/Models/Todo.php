<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class Todo extends Model
{
    use HasFactory;
    protected $table = 'todos';
    protected $fillable = ["text","isActive","created_at","updated_at"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
