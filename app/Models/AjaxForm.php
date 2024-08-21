<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AjaxForm extends Model
{
    use SoftDeletes;

    protected $table = 'ajax_forms';
    protected $guarded = [];
}
