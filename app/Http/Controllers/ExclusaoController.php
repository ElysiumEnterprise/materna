<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function destroy($idPerfil)
    {
        // Encontrar o usuário pelo ID
        $user = User::findOrFail($idPerfil);

        // Deletar a foto de perfil se existir
        if ($user->foto) {
            Storage::delete($user->foto);
        }

        // Excluir o usuário do banco de dados
        $user->delete();

        return response()->json(['message' => 'Perfil excluído com sucesso!'], 200);
    }
}

?>
