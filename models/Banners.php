<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model {
    protected $table = 'banners';
    protected $fillable = [
        'banner_home_desktop', 
        'banner_home_mobile',
        'banner_contato_mobile',
        'banner_contato_desktop',
        'banner_quem_somos_desktop',
        'banner_quem_somos_mobile',
        'banner_depoimentos_mobile',
        'banner_depoimentos_desktop',
        'banner_engenharia_desktop',
        'banner_engenharia_mobile',
        'banner_arquitetura_mobile',
        'banner_arquitetura_desktop',
        'banner_obras_desktop',
        'banner_obras_mobile',
        'banner_interiores_mobile',
        'banner_interiores_desktop'
    ];
    public $timestamps = false;
}
