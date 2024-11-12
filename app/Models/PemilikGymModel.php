<?php namespace App\Models;

use CodeIgniter\Model;

class PemilikGymModel extends Model
{
    protected $table = 'pemilikgym';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'email','username','password','nomor_telepon'];
}
