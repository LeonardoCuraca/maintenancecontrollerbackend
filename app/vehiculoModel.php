<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehiculoModel extends Model
{
    protected $table = 'vehiculo';//Definir
    /*protected $fillable = ['id', 'placa', 'marca' , 'tipo_vehiculo' , 'n_ejes' ,
                           'alto' , 'ancho' , 'largo'];*/

    protected $fillable = ['id_vehiculo','placa','prefijo','fk_id_tipovehiculo',
                           'fk_id_carroceria','fk_id_marca','fk_id_modelo',
                           'fk_id_categoria', 'fk_id_empresa' ,'fk_id_status',
                           'serie_chasis','fecha','ejes','carga_util','carga_neta',
                           'carga_bruta','alto','ancho','largo', 'observacion'];                       
}
