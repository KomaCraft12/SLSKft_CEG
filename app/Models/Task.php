<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }

    public function workers()
    {
        return $this->belongsToMany(Worker::class, 'task_worker');
    }
}
