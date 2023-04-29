<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class User extends Model{

public $timestamps = false;

protected $primaryKey = 'studid';

protected $table = 'tblstudent'; 
protected $fillable = [
 'lastname', 'firstname', 'middlename', 'bday', 'age'
];}