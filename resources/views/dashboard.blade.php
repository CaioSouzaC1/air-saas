<x-layouts.app>

    <p>Dashboard</p>

    <p>Usuário logado: {{ Auth::user()->email ?? 'Nenhum usuário' }}</p>

</x-layouts.app>
