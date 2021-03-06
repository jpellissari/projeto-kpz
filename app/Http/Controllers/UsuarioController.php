<?php
namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Rafwell\Simplegrid\Grid;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Grid = new Grid(Usuario::query(), 'UsuariosGrid');

        $Grid->fields([
            'cpf'=>'CPF',
            'ativo'=>'Ativo',
            'nome'=>'Nome',
            'fone'=>'Telefone',
            'celular'=>'Celular',
            'email'=>'Email',
            'created_at'=>'Data Cadastro'
        ])


            ->processLine(function($row){
                $row['cpf'] = strlen($row['cpf']) == 11 ? ($row['cpf']) : ( "0".$row['cpf']);
                $row['fone'] = $row['fone'] == 0 ? '-' : '(' . substr($row['fone'], 0, 2) . ')' . substr($row['fone'], 2, 4) . '-' . substr($row['fone'], 6);
                $row['celular'] = $row['celular'] == 0 ? '-' : '(' . substr($row['celular'], 0, 2) . ')' . substr($row['celular'], 2, 5) . '-' . substr($row['celular'], 7);
                $row['ativo'] = $row['ativo'] == 1 ? 'Sim' : 'Não';
                $row['created_at'] = date('d/m/Y', strtotime($row['created_at']));
                return $row;
            })


            ->actionFields([
                'emp_no' //The fields used for process actions. those not are showed
            ])
            ->advancedSearch([
                'cpf'=>['type'=>'integer','label'=>'Código'],
                'ativo'=>['type'=>'integer', 'label'=>'Ativo'],
                'nome'=>['type'=>'text', 'label'=>'Nome'],
                'fone'=>['type'=>'text', 'label'=>'Telefone'],
                'celular'=>['type'=>'text', 'label'=>'Celular'],
                'email'=>['type'=>'text', 'label'=>'E-mail'],
                'created_at'=>['type'=>'date', 'label'=>'Data Cadastro'],
            ]);

        $Grid->action('Editar', 'usuarios/{cpf}/edit', [
            'confirm'=>'Deseja editar esse registro?',
            'method'=>'GET',
        ])
        ->action('Deletar', 'usuarios/{cpf}', [
            'confirm'=>'Deseja mesmo deletar esse registro?',
            'method'=>'DELETE',
        ]);

        $Grid->checkbox(true, 'emp_no');
        $Grid->bulkAction('Deletar itens selecionados', 'usuarios/bulk-delete');

        return view('auth.index', ['grid'=>$Grid]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new Usuario;
        $usuario->cpf = $request->cpf;
        $usuario->ativo = $request->ativo;
        $usuario->tipoAcesso = $request->tipoAcesso;
        $usuario->nome = $request->nome;
        $usuario->fone = $request->fone;
        $usuario->celular = $request->celular;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
//        $usuario->created_at = $request->created_at;
//        $usuario->updated_at = $request->updated_at;
        $usuario->remember_token = $request->remember_token;
//        dd($usuario);
        $usuario-> save();
        return redirect()->route('usuarios.index')->with('message', 'Usuário Criado Com Sucesso');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id)
        $retorno = Usuario::where('cpf', '=', $id)->first();
        if(count($retorno) == 0)
        {
            Session::flash('produto_nencontrado', 'Usuário não encontrado.');
            return redirect('/usuarios');
        }


        return view('auth.edit')->with('usuario', $retorno);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($id);
        $usuario = Usuario::where('cpf', '=', $id)->first();
        $usuario->cpf = $request->cpf;
        $usuario->ativo = $request->ativo;
        $usuario->tipoAcesso = $request->tipoAcesso;
        $usuario->nome = $request->nome;
        $usuario->fone =$request->fone;
        $usuario->celular =$request->celular;
        $usuario->email =$request->email;
        $usuario->password = bcrypt($request->password);
//        $usuario->created_at =$request->created_at;
//        $usuario->updated_at =$request->updated_at;
        $usuario->remember_token = $request->remember_token;
        $usuario-> save();
        return redirect()->route('usuarios.index')->with('message', 'Usuário Editado Com Sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::where('cpf', '=', $id)->first();
        $usuario->ativo = 0;
        $usuario-> save();
        return redirect()->route('usuarios.index')->with('alert-success','Usuário Removido com Sucesso!');
    }

    public function Logout(){
        Auth::logout();

        session()->flash('message', 'Logout Bem Sucedido');

        return redirect('/login');
    }
}