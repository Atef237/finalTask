<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guarded =[];                 // بنحط المصقوفه دي بدل ما نكتب الحقول كلها بتاعة الجدول
    public $timestamp = true;               // اذا كانت القيمة صح يقوم باضافة الوقت والتاريخ للانشاء والتحديث

}
