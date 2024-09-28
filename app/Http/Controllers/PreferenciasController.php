use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreferenciasController extends Controller
{
    public function salvarPreferencias(Request $request)
    {
        $user = auth()->user(); // Obtém o usuário autenticado

        // Valida se pelo menos uma preferência foi selecionada
        $request->validate([
            'preferencias' => 'required|array',
        ]);

        // Salva as preferências no banco de dados
        $user->preferencias = json_encode($request->preferencias); // Armazena como JSON
        $user->save();

        // Redireciona para a tela do feed
        return redirect()->route('feed'); // Ajuste para o nome correto da sua rota de feed
    }
}
