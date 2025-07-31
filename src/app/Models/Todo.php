<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Todo extends Model
{
    use HasFactory;
    // fillable ile database uzerinden cekebileccigimiz degiskenleri belirtiriz
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'category_id',
        'status',
        'priority',
        'due_date',
        'completed_at',
        'is_starred'
    ];

    // Elequent orm ile iliskileri tanimlariz kolayca
    // todo user ve categorye sahip oldugu icin belongsTo kullaniriz
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
}
