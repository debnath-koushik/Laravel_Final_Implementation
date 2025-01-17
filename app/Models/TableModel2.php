<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableModel2 extends Model
{
    use HasFactory;

    protected $table  = "view_table2";
    public $timestamps = false;
}
