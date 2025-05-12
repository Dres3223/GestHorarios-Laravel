<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $table = 'horarios';
    public $timestamps = false;
    public function Docente()
    {
        return $this->belongsTo('App\Models\Docente', 'docente_id');
    } 
    public function Ambiente()
    {
        return $this->belongsTo('App\Models\Ambiente', 'ambiente_id');
    } 
    public function Labor()
    {
        return $this->belongsTo('App\Models\Labor', 'labor_id');
    } 
    public function PeriodoAcademico()
    {
        return $this->belongsTo('App\Models\PeriodosAcademico', 'periodo_academico_id');
    } 
}