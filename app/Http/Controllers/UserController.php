<?php
namespace apiIdecap\Http\Controllers;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use apiIdecap\User;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth.basic',['only'=>['registroUsuario','actualizarUsuario','eliminarUsuario']]);
    }*/
    
	public function registroUsuario(Request $request)
    {
        /*$this->validate($request, [
            'dni' => 'required|unique:users',
            'nombres' => 'required',
            'apellidos' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'telefono' => 'required',
            'cargo' => 'required',
        ]);*/
        try{
            $usuario=new User();
            $usuario->dni=$request->dni;
            $usuario->username=$request->username;
            $usuario->nombresyapellidos = strtoupper($request->nombres." ".$request->apellidos);
            $usuario->email    = $request->email;
            $usuario->password = bcrypt($request->password);
            $usuario->estado=$request->estado;
			$usuario->telefono=$request->telefono;
			$usuario->permiso=$request->permiso;
			$usuario->ruta_foto_perfil=$request->ruta_foto_perfil;
            $usuario->save();
        }
        catch(Exception $e)
        {
            return "Fatal error - ".$e->getMessage();
        }
        return "Inserción exitosa";
    }
    public function actualizarUsuario(Request $request,$id)
    {
        try{
        	$user = User::find($id);
        	if ($request->password){$user->password = bcrypt($request->password);}
        	if ($request->username){$user->username =$request->username;}
        	if ($request->dni){$user->dni =$request->dni;}
        	if ($request->nombresyapellidos){$user->nombresyapellidos =strtoupper($request->nombres." ".$request->apellidos);}
        	if ($request->email){$user->email =$request->email;}
        	if ($request->estado){$user->estado = $request->estado;}
        	if ($request->cargo){$user->cargo = $request->cargo;}
        	if ($request->telefono){$user->telefono = $request->telefono;}
        	if ($request->permiso){$user->permiso =$request->permiso;}
        	if ($request->ruta_foto_perfil){$user->ruta_foto_perfil =$request->ruta_foto_perfil;}
            $user->save();
        }
        catch(Exception $e)
        {
            return "Fatal error - ".$e->getMessage();
        }
        return "Actualización exitosa";
    }
    public function eliminarUsuario($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
        } catch (\Exception $e) {
            abort(500);
        }
        return "Usuario eliminado";
    }
    public function buscarUsuario($nombresyapellidos)
    {
        $search="%".$nombresyapellidos."%";
        $users = DB::table('users')
                ->select('users.*')->where([
                      ['nombresyapellidos', 'like', $search],
                  ])->get();
        return response()->json($users);
    }
    public function listaUsuarios()
    {
        $usuarios = DB::table('users')
                ->select('users.*')->where([
                      //['id', '=', $id],
                  ])->get();     
        return response()->json($usuarios);
    }
    public function datosUsuario($id)
	{
	    $usuarios = DB::table('users')
	            ->select('users.*')->where([
	                  ['dni', '=', $id],
	              ])->get();     
	    return response()->json($usuarios);
	}
    public function missingMethod($parameters = array())
	{
		abort(404);
	}
}
