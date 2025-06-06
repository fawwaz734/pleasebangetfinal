<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
Use App\Models\Orderdetail; // Pastikan untuk mengimpor model Orderdetail jika diperlukan


class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; 
    public $incrementing = false; 
    protected $keyType = 'string'; 

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Mengisi kolom 'id' dengan UUID baru sebelum menyimpan
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];

    public function reviews()
    {
        return $this->hasMany(Orderdetail::class, 'product_id', 'id');
    }
}

