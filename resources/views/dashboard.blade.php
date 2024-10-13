<x-layouts.app>

    <div class="breadcrumbs text-sm">
        <ul>
          <li>Dashboard</li>
        </ul>
      </div>

    <p>Usuário logado: {{ Auth::user()->email ?? 'Nenhum usuário' }}</p>

</x-layouts.app>
