<?php 
namespace App\Models;

use CodeIgniter\Model;

class Mcontacts extends Model{

    /////////////////atributos////////////

    protected $table      = 'contacts'; //nombre de la tabla
    protected $primaryKey = 'id';// idde la tabla libros
    protected $allowedFields=['fullname','phone','email'];//resto de los campos de la bd


    // Uncomment below if you want add primary key
    
}