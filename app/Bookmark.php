<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bookmark
 * @package App\Models
 *
 * @property int $user_id
 * @property int $product_id
 *
 * @property Product $product
 * @property User $user
 */

class Bookmark extends Model
{
    protected $table = 'bookmarks';
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
