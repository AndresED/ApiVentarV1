<?php
namespace apiIdecap\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use apiIdecap\User;
use apiIdecap\Alumno;
use apiIdecap\TarjetaCredito;
use apiIdecap\Programa;
use apiIdecap\Inscripcion;
use apiIdecap\Mensualidad;
use apiIdecap\PMatricula;
use apiIdecap\Matricula;
Use Mail;
class SincronizarController extends Controller
{
    //INSERTS
    public function insertUsers($id,$dni,$nombresyapellidos,$username,$estado,$email,$sincronizado,$password,$telefono,$permiso,$ruta_foto_perfil)
    {
        $codigos = array('0001', '0002', '0003', '0004', '0005', '0006','0007','0008','0009','0010','0011','0012','0013','014');
        $letras = array('á', 'é', 'í', 'ó', 'ú','ñ','Á','É','Í','Ó','Ú','Ñ','/','+');
        $contador=0;
        try {
            $aux = User::where("id","=",$id)->select("nombresyapellidos")->get();
            foreach ($aux as $aux)
            {
                $contador++;
            }
            if($contador==0)
            {
                $usuario=new User();
                $usuario->id=$id;
                $usuario->dni=$dni;
                $usuario->nombresyapellidos = str_replace($codigos, $letras,$nombresyapellidos);
                $usuario->username=str_replace($codigos, $letras,$username);
                $usuario->estado=$estado;
                $usuario->email    = str_replace($codigos, $letras,$email);
                $usuario->sincronizado=1;
                $usuario->password = str_replace($codigos, $letras,$password);
                $usuario->telefono=$telefono;
                $usuario->permiso=$permiso;
                $usuario->ruta_foto_perfil=str_replace($codigos, $letras,$ruta_foto_perfil);
                $usuario->save();
                return response()->json(['mensaje'=>'Usuario insertado'],200);
            }
            else
            {
                return response()->json(['mensaje'=>'El usuario ya ha sido registrado'],200);
            }
            } catch (\Exception $e) {
            echo "Fatal error - ".$e->getMessage();
            return response()->json(['mensaje'=>'No se pudieron procesar los valores','codigo'=>422],422);
            
        }
    }
    public function insertAlumnos($id,$dni,$nombresyapellidos,$email,$departamento,$provincia,$direccion,$fecha_nacimiento,$grado,$profesion,$trabajo,$sincronizado,$telefono)
    {
        $codigos = array('0001', '0002', '0003', '0004', '0005', '0006','0007','0008','0009','0010','0011','0012','0013','014');
        $letras = array('á', 'é', 'í', 'ó', 'ú','ñ','Á','É','Í','Ó','Ú','Ñ','/','+');
        $contador=0;
        try {
            $aux = Alumno::where("dni","=",$dni)->select("nombresyapellidos")->get();
            foreach ($aux as $aux)
            {
                $contador++;
            }
            if($contador==0)
            {   
                $alumnos=new Alumno();
                $alumnos->id=$id;
                $alumnos->dni=$dni;
                $alumnos->nombresyapellidos = str_replace($codigos, $letras,$nombresyapellidos);
                $alumnos->email    = str_replace($codigos, $letras,$email);
                $alumnos->departamento=str_replace($codigos, $letras,$departamento);
                $alumnos->fecha_nacimiento=str_replace($codigos, $letras,$fecha_nacimiento);
                $alumnos->provincia=str_replace($codigos, $letras,$provincia);
                $alumnos->direccion=str_replace($codigos, $letras,$direccion);
                $alumnos->grado=str_replace($codigos, $letras,$grado);
                $alumnos->profesion=str_replace($codigos, $letras,$profesion);
                $alumnos->trabajo = str_replace($codigos, $letras,$trabajo);
                $alumnos->sincronizado = 1;
                $alumnos->telefono=$telefono;
                $alumnos->save();
                return response()->json(['mensaje'=>'Alumno insertado'],200);
            }
            else
            {
                return response()->json(['mensaje'=>'El alumno ya esta registrado'],200);
            }
            } catch (\Exception $e) {
            echo  "Fatal error - ".$e->getMessage();
            return response()->json(['mensaje'=>'No se pudieron procesar los valores','codigo'=>422],422);
        }
    }

    public function insertProgramas($id,$nombre,$estado,$duracion,$cantidad_matricula,$descuento_matricula,$tipo_descuento_matricula,$cantidad_mensualidad,$descuento_mensualidad,$tipo_descuento_mensualidad,$sincronizado)
    {
        $codigos = array('0001', '0002', '0003', '0004', '0005', '0006','0007','0008','0009','0010','0011','0012','0013','014');
        $letras = array('á', 'é', 'í', 'ó', 'ú','ñ','Á','É','Í','Ó','Ú','Ñ','/','+');
        $contador=0;
        try {
                $programas=new Programa();
                $programas->id=$id;
                $programas->nombre=str_replace($codigos, $letras,$nombre);
                $programas->estado    = $estado;
                $programas->duracion    = $duracion;
                $programas->cantidad_matricula=$cantidad_matricula;
                $programas->descuento_matricula=$descuento_matricula;
                $programas->tipo_descuento_matricula=str_replace($codigos, $letras,$tipo_descuento_matricula);
                $programas->cantidad_mensualidad=$cantidad_mensualidad;
                $programas->descuento_mensualidad=$descuento_mensualidad;
                $programas->tipo_descuento_mensualidad=str_replace($codigos, $letras,$tipo_descuento_mensualidad);
                $programas->sincronizado   = 1;
                $programas->save();
                return response()->json(['mensaje'=>'Programa insertado'],200);
            } catch (\Exception $e) {
            echo "Fatal error - ".$e->getMessage();
            return response()->json(['mensaje'=>'No se pudieron procesar los valores','codigo'=>422],422);
        }
    }

    public function insertMatriculas($id,$fecha_matricula,$user_id,$alumno_id,$programa_id,$tipo_tarjeta,$banco_tarjeta,$numero_tarjeta,$mes_tarjeta,$anio_tarjeta,$clave_seguridad_tarjeta,$sincronizado)
    {
        $codigos = array('0001', '0002', '0003', '0004', '0005', '0006','0007','0008','0009','0010','0011','0012','0013','014');
        $letras = array('á', 'é', 'í', 'ó', 'ú','ñ','Á','É','Í','Ó','Ú','Ñ','/','+');
        $contador=0;
        try {
            $aux = Matricula::where("id","=",$id)->select("id")->get();
            foreach ($aux as $aux)
            {
                $contador++;
            }
            if($contador==0)
            {
                $matricula=new Matricula();
                $matricula->id=$id;
                $matricula->fecha_matricula=$fecha_matricula;
                $matricula->user_id=$user_id;
                $matricula->alumno_id=$alumno_id;
                $matricula->programa_id=$programa_id;
                $matricula->tipo_tarjeta=str_replace($codigos, $letras,$tipo_tarjeta);
                $matricula->banco_tarjeta = str_replace($codigos, $letras,$banco_tarjeta);
                $matricula->numero_tarjeta    = $numero_tarjeta;
                $matricula->mes_tarjeta = $mes_tarjeta;
                $matricula->anio_tarjeta = $anio_tarjeta;
                $matricula->clave_seguridad_tarjeta = $clave_seguridad_tarjeta;
                $matricula->sincronizado=1;
                $matricula->save();
                return redirect()->route('enviarCorreo',array(
                'user_id' => $user_id,
                'alumno_id' => $alumno_id,
                'programa_id' => $programa_id,
                'matricula_id' => $id
                ));
            }
            else
            {
                return response()->json(['mensaje'=>'La matricula ya esta registrada'],200);    
            }
            } catch (\Exception $e) {
            echo "Fatal error - ".$e->getMessage();
            return response()->json(['mensaje'=>'No se pudieron procesar los valores','codigo'=>422],422);
        }
    }
    //UPDATE
    public function updateUsers($id,$dni,$nombresyapellidos,$username,$estado,$email,$sincronizado,$password,$telefono,$permiso,$ruta_foto_perfil)
    {
        $contador=0;
        $codigos = array('0001', '0002', '0003', '0004', '0005', '0006','0007','0008','0009','0010','0011','0012','0013','014');
        $letras = array('á', 'é', 'í', 'ó', 'ú','ñ','Á','É','Í','Ó','Ú','Ñ','/','+');
        try {
            
            DB::table('users')->where('id',$id)->update(['nombresyapellidos' => str_replace($codigos, $letras,$nombresyapellidos)]);
            DB::table('users')->where('id',$id)->update(['username' => str_replace($codigos, $letras,$username)]);
            DB::table('users')->where('id',$id)->update(['estado' => $estado]);
            DB::table('users')->where('id',$id)->update(['email' => str_replace($codigos, $letras,$email)]);
            DB::table('users')->where('id',$id)->update(['sincronizado' => 1]);
            DB::table('users')->where('id',$id)->update(['password' => str_replace($codigos, $letras,$password)]);
            DB::table('users')->where('id',$id)->update(['telefono' => $telefono]);
            DB::table('users')->where('id',$id)->update(['permiso' => $permiso]);
            DB::table('users')->where('id',$id)->update(['dni' => str_replace($codigos, $letras,$dni)]);
            //DB::table('users')->where('dni',$dni)->update(['ruta_foto_perfil' => str_replace($codigos,$letras, $request->foto_perfil)]);
            return response()->json(['mensaje'=>'Usuario actualizado'],200);
            } catch (\Exception $e) {
            echo "Fatal error - ".$e->getMessage();
            return response()->json(['mensaje'=>'No se pudieron procesar los valores','codigo'=>304],204);
        }
    }

    public function updateUsersFoto(Request $request,$dni)
    {
        $contador=0;
         $codigos = array('0001', '0002', '0003', '0004', '0005', '0006','0007','0008','0009','0010','0011','0012','0013','014');
        $letras = array('á', 'é', 'í', 'ó', 'ú','ñ','Á','É','Í','Ó','Ú','Ñ','/','+');
        try {
            DB::table('users')->where('dni',$dni)->update(['ruta_foto_perfil' => str_replace($codigos,$letras, $request->foto_perfil)]);
            return response()->json(['mensaje'=>'Usuario actualizado'],200);
            } catch (\Exception $e) {
            echo "Fatal error - ".$e->getMessage();
            return response()->json(['mensaje'=>'No se pudieron procesar los valores','codigo'=>304],204);
        }
    }

    public function updateAlumnos($id,$dni,$nombresyapellidos,$email,$departamento,$provincia,$direccion,$fecha_nacimiento,$grado,$profesion,$trabajo,$sincronizado,$telefono)
    {
        $contador=0;
        $codigos = array('0001', '0002', '0003', '0004', '0005', '0006','0007','0008','0009','0010','0011','0012','0013','014');
        $letras = array('á', 'é', 'í', 'ó', 'ú','ñ','Á','É','Í','Ó','Ú','Ñ','/','+');
        try {
            
            DB::table('alumnos')->where('id',$id)->update(['nombresyapellidos' => str_replace($codigos, $letras,$nombresyapellidos)]);
            DB::table('alumnos')->where('id',$id)->update(['email' => str_replace($codigos, $letras,$email)]);
            DB::table('alumnos')->where('id',$id)->update(['departamento' => str_replace($codigos, $letras,$departamento)]);
            DB::table('alumnos')->where('id',$id)->update(['fecha_nacimiento' => str_replace($codigos, $letras,$fecha_nacimiento)]);
            DB::table('alumnos')->where('id',$id)->update(['provincia' => str_replace($codigos, $letras,$provincia)]);
            DB::table('alumnos')->where('id',$id)->update(['direccion' => str_replace($codigos, $letras,$direccion)]);
            DB::table('alumnos')->where('id',$id)->update(['grado' => str_replace($codigos, $letras,$grado)]);
            DB::table('alumnos')->where('id',$id)->update(['profesion' => str_replace($codigos, $letras,$profesion)]);
            DB::table('alumnos')->where('id',$id)->update(['trabajo' => str_replace($codigos, $letras,$trabajo)]);
            DB::table('alumnos')->where('id',$id)->update(['sincronizado' => 1]);
            DB::table('alumnos')->where('id',$id)->update(['telefono' => $telefono]);
            DB::table('alumnos')->where('id',$id)->update(['dni' => $dni]);
            return response()->json(['mensaje'=>'Alumno actualizado'],200);
        } catch (\Exception $e) {
            echo "Fatal error - ".$e->getMessage();
            return response()->json(['mensaje'=>'No se pudieron procesar los valores','codigo'=>304],304);
        }
    }

    public function updateProgramas($id,$nombre,$estado,$duracion,$cantidad_matricula,$descuento_matricula,$tipo_descuento_matricula,$cantidad_mensualidad,$descuento_mensualidad,$tipo_descuento_mensualidad,$sincronizado)
    {
        $codigos = array('0001', '0002', '0003', '0004', '0005', '0006','0007','0008','0009','0010','0011','0012','0013','014');
        $letras = array('á', 'é', 'í', 'ó', 'ú','ñ','Á','É','Í','Ó','Ú','Ñ','/','+');
        try {
            DB::table('programas')->where('id',$id)->update(['id' => $id]);
            DB::table('programas')->where('id',$id)->update(['nombre' => str_replace($codigos, $letras,$nombre)]);
            DB::table('programas')->where('id',$id)->update(['estado' => $estado]);
            DB::table('programas')->where('id',$id)->update(['duracion' => $duracion]);


            DB::table('programas')->where('id',$id)->update(['cantidad_matricula' => $cantidad_matricula]);
            DB::table('programas')->where('id',$id)->update(['descuento_matricula' => $descuento_matricula]);
            DB::table('programas')->where('id',$id)->update(['tipo_descuento_matricula' => str_replace($codigos, $letras,$tipo_descuento_matricula)]);
            DB::table('programas')->where('id',$id)->update(['cantidad_mensualidad' =>$cantidad_mensualidad]);
            DB::table('programas')->where('id',$id)->update(['descuento_mensualidad' => $descuento_mensualidad]);
            DB::table('programas')->where('id',$id)->update(['tipo_descuento_mensualidad' => str_replace($codigos, $letras,$tipo_descuento_matricula)]);
            DB::table('programas')->where('sincronizado',$id)->update(['id' => 1]);
            return response()->json(['mensaje'=>'programa actualizado'],200);
        } catch (\Exception $e) {
            echo "Fatal error - ".$e->getMessage();
            return response()->json(['mensaje'=>'No se pudieron procesar los valores','codigo'=>304],304);
        }
    }

    public function updateMatriculas($id,$fecha_matricula,$user_id,$alumno_id,$programa_id,$tipo_tarjeta,$banco_tarjeta,$numero_tarjeta,$mes_tarjeta,$anio_tarjeta,$clave_seguridad_tarjeta,$sincronizado)
    {
        try {
            DB::table('matriculas')->where('id',$id)->update(['id' => $id]);
            DB::table('matriculas')->where('id',$id)->update(['fecha_matricula' => $fecha_matricula]);
            DB::table('matriculas')->where('id',$id)->update(['user_id' => $user_id]);
            DB::table('matriculas')->where('id',$id)->update(['programa_id' => $programa_id]);
            DB::table('matriculas')->where('id',$id)->update(['alumno_id' => $alumno_id]);
            DB::table('matriculas')->where('id',$id)->update(['tipo_tarjeta' => str_replace($codigos, $letras,$tipo_tarjeta)]);
            DB::table('matriculas')->where('id',$id)->update(['banco_tarjeta' => str_replace($codigos, $letras,$banco_tarjeta)]);
            DB::table('matriculas')->where('id',$id)->update(['numero_tarjeta' => $numero_tarjeta]);
            DB::table('matriculas')->where('id',$id)->update(['mes_tarjeta' => $mes_tarjeta]);
            DB::table('matriculas')->where('id',$id)->update(['anio_tarjeta' => $anio_tarjeta]);
            DB::table('matriculas')->where('id',$id)->update(['clave_seguridad_tarjeta' => $clave_seguridad_tarjeta]);
            DB::table('matriculas')->where('id',$id)->update(['sincronizado'=> 1]);
                return response()->json(['mensaje'=>'Matriculas actualizado'],200);
            } catch (\Exception $e) {
            echo "Fatal error - ".$e->getMessage();
            return response()->json(['mensaje'=>'No se pudieron procesar los valores','codigo'=>304],304);
        }
    }
    //DELETED
    public function deletedTable($id,$tabla)
    {
        try {

            
             if($tabla="users")
            {
                $registro = User::where('id', $id)->delete();
            }
            if($tabla="programas")
            {
                $registro = Programa::where('id', $id)->delete();
            }
            if($tabla="alumnos")
            {
                $registro = Alumno::where('id', $id)->delete();
            }
            if($tabla="matriculas")
            {
                $registro = Matricula::where('id', $id)->delete();
            }
            return response()->json(['mensaje'=>'Registro borrado'],200);
        } catch (\Exception $e) {
            echo "Fatal error - ".$e->getMessage();
            return response()->json(['mensaje'=>'No se pudieron procesar los valores','codigo'=>422],422);
        }
    }
    public function save(Request $request,$dni)
    {
     
           //CARPETA DONDE SERA ALMACENADO
            $path = public_path();
            //RECUPERANDO ARCHIVO SUBIDO
            $img_1 = $request->file('foto_perfil');
            //RENOMBRANDO
            $aux_1=uniqid();
            $imagen1=$aux_1."".$img_1->getClientOriginalName();
            //MOVIENDO IMAGEN A CARPETA 
             $img_1->move($path, $imagen1);
            //CONVIRTIENDO A BASE 64 STRING
              $f1= fopen($img_1,"rb");
              $foto_reconvertida = fread($f1, filesize($img_1));
              $image64 = base64_encode($foto_reconvertida);
             //ACTUALIZANDO
            try
            {
                DB::table('users')->where('dni',$dni)->update(['ruta_foto_perfil' => $imagen64]);
                return response()->json(['mensaje'=>'Foto actualizada'],200);
            }
            catch (\Exception $e) {
                echo "Fatal error - ".$e->getMessage();
                return response()->json(['mensaje'=>'No se pudieron procesar los valores','codigo'=>304],204);
            }
    }
    public function selectTable($table)
    {
        try {
             
            $registro= DB::table($table)->get();
            return response()->json([$table=>$registro],200);
        } catch (\Exception $e) {
            echo "Fatal error - ".$e->getMessage();
            return response()->json([$table=>'No se pudieron procesar los valores','codigo'=>422],422);
        }

    }
    public function enviarCorreo()
    {
        
        $programa_id=$_GET['programa_id'];
        $user_id=$_GET['user_id'];
        $alumno_id=$_GET['alumno_id'];
        $matricula_id=$_GET['matricula_id'];
        //ENVIANDO CORREO

        //OBTENIENDO DATOS DE PROGRAMA
            $Matricula = Matricula::where("id","=",$matricula_id)->select("fecha_matricula","tipo_tarjeta")->get();
            foreach ($Matricula as $Matricula) {
                $fecha_matricula=$Matricula->fecha_matricula;
                $tarjeta_tipo=$Matricula->tipo_tarjeta;
            }
            //OBTENIENDO DATOS DE PROGRAMA
            $ProgramaF = Programa::where("id","=",$programa_id)->select("nombre","cantidad_matricula","descuento_matricula","tipo_descuento_matricula","cantidad_mensualidad","descuento_mensualidad","tipo_descuento_mensualidad")->get();
            foreach ($ProgramaF as $ProgramaF) {
                $nombre_programa=$ProgramaF->nombre;
                $CantidadM=$ProgramaF->cantidad_matricula;
                $DescuentoM=$ProgramaF->descuento_matricula;
                $TipoDM=$ProgramaF->tipo_descuento_matricula;   
                $CantidadMA=$ProgramaF->cantidad_mensualidad;
                $DescuentoMA=$ProgramaF->descuento_mensualidad;
                $TipoMAM=$ProgramaF->tipo_descuento_mensualidad; 
            }
            if($TipoDM="Porcentaje")
            {
                $total_mensualidad=$CantidadM-(($CantidadM*$DescuentoM)/100);
            }
            else
            {
                $total_mensualidad=$CantidadM-$DescuentoM;
            }
            if($TipoMAM="Porcentaje")
            {
                $total_matricula=$CantidadMA-(($CantidadMA*$DescuentoMA)/100);
            }
            else
            {
                $total_matricula=$CantidadMA-$DescuentoMA;
            }
            
            //OBTENIENDO DATOS DEL USUARIO
            $usuarioF = User::where("id","=",$user_id)->select("nombresyapellidos")->get();
            foreach ($usuarioF as $usuarioF) {
                $vendedor=$usuarioF->nombresyapellidos;
            }
            //OBTENIENDO DATOS DEL ALUMNO
            $alumnoF = Alumno::where("id","=",$alumno_id)->select("dni","nombresyapellidos","telefono","profesion","email")->get();
            foreach ($alumnoF as $alumnoF) {
                $alumno_dni=$alumnoF->dni;   
                $alumno_nombre=$alumnoF->nombresyapellidos;   
                $alumno_telefono=$alumnoF->telefono;
                $alumno_profesion=$alumnoF->profesion;
                $alumno_email=$alumnoF->email;
            }
            Mail::send('emails.factura', [
                "alumno"=>$alumno_nombre,
                "vendedor"=>$vendedor,
                "dni"=>$alumno_dni,
                "telefono"=>$alumno_telefono,
                "profesion"=>$alumno_profesion,
                "email"=>$alumno_email,
                "fecha_matricula"=>$fecha_matricula,
                "fecha_emision"=>date("Y-m-d"),
                "tarjeta"=>$tarjeta_tipo,
                "programa"=>$nombre_programa,
                "matricula"=>$total_matricula,
                "mensualidad"=>$total_mensualidad
                ], function ($m) use ($alumnoF) {
            $m->to($alumnoF->email, $alumnoF->nombresyapellidos)->subject('Factura de registro de matricula - IDECAP');
        });
    }
}
