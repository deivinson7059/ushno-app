<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\mcontacts;
class Ccontacts extends Controller{
    
    public function index(){

        $listacontactos= new mcontacts();// se crea el objeto de la clase mcontacts

        $resultadodatos['lista'] =$listacontactos->findAll();// se crea un arreglo para aplicar el metodo findall

      

        $vistas= view('vcabecera').
                 view('vcontacts',$resultadodatos).  //muerstra la vista  con el resultado
                 view('vpie');

       return   $vistas ;
    }


    public function vistacrear(){

     
        $vistas= view('vcabecera').
                 view('vcreatecontact'). 
                 view('vpie');

       return   $vistas ;
    }


    public function guardarcontacto(){
        $nuevocontacto= new mcontacts();// se crea el objeto de la clase mcontacts

        $datos=[
             'fullname'=> $this->request->getVar('nombre'),
             'phone'=> $this->request->getVar('telefono'),
             'email'=> $this->request->getVar('email')

        ];

     
             
        $nuevocontacto->insert($datos);
        echo "ingresado a la base de datos";

    }

     public function deletecontact($id){
               
        $borrarcontacto= new mcontacts();// se crea el objeto de la clase mcontacts
        $borrarcontacto->where('id',$id)->delete($id);
        return $this->response->redirect(base_url('/contactslist'));
        
    }

    public function editcontact($id){
              
    
     $editardato= new mcontacts();// se crea el objeto de la clase mcontacts
     //consultamos los datos
    // $datos['lista']=$editardato->where('id',$id)->first();
     $datos['contact'] =$editardato->where('id',$id)->first();
      print_r($datos);
      
     $vistas=    view('vcabecera').
                 view('veditcontact',$datos). 
                 view('vpie');
  
      
                 return   $vistas ;
                 
                 
    }

    function updatecontact(){
        $updatecontact= new mcontacts();// se crea el objeto de la clase mcontacts

        $datos=[
            
             'fullname'=> $this->request->getVar('nombre'),
             'phone'=> $this->request->getVar('telefono'),
             'email'=> $this->request->getVar('email')

        ];
        $id=$this->request->getVar('idcontact');
        $updatecontact->update($id,$datos);
        echo "actualizado a la base de datos";
        return $this->response->redirect(base_url('/contactslist'));
    }


}