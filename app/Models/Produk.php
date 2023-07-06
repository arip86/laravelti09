<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriProduk;

//query builder
//eloquent


class Produk extends Model
{
    use HasFactory;
    //memanggil table yang akan dikelola
    protected $table = 'produk';
    //mendeklarasikan kolom yang ada didalam table
    public $timestamps = false;
    protected $fillable = [
        'kode',
        'nama',
        'harga_jual',
        'harga_beli',
        'stok',
        'min_stok',
        'deskripsi',
        'kategori_produk_id'
    ];
    public function KategoriProduk(){
        return $this->belongsTo(KategoriProduk::class);
    }
    public function getAllData(){
        return DB::table('produk')
        ->join('kategori_produk', 'produk.kategori_produk_id', '=', 'kategori_produk.id')
        ->select('produk.*', 'kategori_produk.nama as nama')
        ->get();

    }

}
