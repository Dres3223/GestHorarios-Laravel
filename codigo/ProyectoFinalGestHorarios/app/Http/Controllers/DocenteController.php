<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Docente;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        //
        $docentes = \App\Models\Docente::all();
        return view("docente.docentes", ["docentes" => $docentes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        try {
            $docente = new Docente();
            $docente->nombres = $request->txtnombres;
            $docente->apellidos = $request->txtapellidos;
            $docente->tipo_identificacion = $request->txttipo_identificacion;
            $docente->identificacion = $request->txtidentificacion;
            $docente->tipo_docente = $request->txttipo_docente;
            $docente->tipo_contrato = $request->txttipo_contrato;
            $docente->area = $request->txtarea;
            $docente->user_id = $request->txtusuario;
            $docente->save();

            $this->sendEmail($docente);

            return back()->with("correcto", "Docente registrada correctamente");
        } catch (\Throwable $th) {
            return back()->with("error", "Error al registrar la docente");
        }
    }
    private function sendEmail(docente $docente)
    {
        $mail = new PHPMailer(true);
        try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'gestihorarios@gmail.com'; 
        $mail->Password = 'obot wtuw mvjz ixar'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587; 
        $mail->setFrom('gestihorarios@gmail.com', 'GestiHorarios');
        $mail->addAddress($docente->user->email, $docente->nombres . ' ' . $docente->apellidos);

        $mail->isHTML(true);  
        $mail->Subject = 'Notificacion de creacion de cuenta';
        $mail->Body = "
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                    }
                    .content {
                        margin: 20px;
                    }
                    .footer {
                        margin-top: 20px;
                        font-size: 0.9em;
                        color: #555;
                    }
                </style>
            </head>
            <body>
                <div class='content'>
                    <p>Estimado(a) <strong>{$docente->nombres} {$docente->apellidos}</strong>,</p>
                    <p>Se ha creado una cuenta para usted en la aplicación web <strong>GestiHorarios</strong>.</p>
                    <p><strong>Detalles de su cuenta:</strong></p>
                    <ul>
                        <li><strong>Tipo de Identificación:</strong> {$docente->tipo_identificacion}</li>
                        <li><strong>Identificación:</strong> {$docente->identificacion}</li>
                        <li><strong>Tipo de Docente:</strong> {$docente->tipo_docente}</li>
                        <li><strong>Tipo de Contrato:</strong> {$docente->tipo_contrato}</li>
                        <li><strong>Área:</strong> {$docente->area}</li>
                    </ul>
                    <p>Atentamente,</p>
                    <p><strong>Oficina de Sistemas de Información</strong><br>
                    Institución Universitaria Colegio Mayor del Cauca</p>
                </div>
                <div class='footer'>
                    <p>Por favor, no responda a este mensaje.</p>
                </div>
            </body>
            </html>";

            $mail->send();
        } catch (Exception $e) {
            error_log('Error al enviar el correo electrónico: ' . $mail->ErrorInfo);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        try {
            $docente = Docente::find($request->txtid);
            if ($docente) {
                $docente->nombres = $request->txtnombres;
                $docente->apellidos = $request->txtapellidos;
                $docente->tipo_identificacion = $request->txttipo_identificacion;
                $docente->identificacion = $request->txtidentificacion;
                $docente->tipo_docente = $request->txttipo_docente;
                $docente->tipo_contrato = $request->txttipo_contrato;
                $docente->area = $request->txtarea;
                $docente->estado = $request->txtestado;
                $docente->save();
                return back()->with("correcto", "Docente actualizado correctamente");
            } else {
                return back()->with("error", "No se encontró el docente para actualizar");
            }
        } catch (\Throwable $th) {
            return back()->with("error", "Error al actualizar la información del docente");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $docente = Docente::find($id);
            if ($docente) {
                $docente->delete();
                return back()->with("correcto", "Docente eliminado correctamente");
            } else {
                return back()->with("error", "No se encontró el docente para eliminar");
            }
        } catch (\Throwable $th) {
            return back()->with("error", "Error al eliminar el docente");
        }
    }
}