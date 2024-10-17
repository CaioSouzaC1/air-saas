<header class="flex h-14 border-b border-secondary py-2 justify-between max-w-md mx-auto px-4 sticky top-0 bg-base-100 z-50">
    <a href="/"> 
        <img class="w-10 h-10" src="/images/brand/logo.svg" alt="xdxd">
    </a>
    <x-drawer wire:model="showDrawer" class="w-9/12 lg:w-1/3 !px-4">
            <x-menu class="border border-dashed w-full">
    
                @php 
                    if(Auth::user()->type === "worker") {
                        @endphp
                            <x-menu-item title="Dashboard" icon="o-building-storefront" link="/dashboard"/>
                            <x-menu-separator />
                            <x-menu-sub title="Clients" icon="o-user-group">
                                    <x-menu-item title="Register new" icon="o-user-plus" link="/clients/register" />
                                    <x-menu-item title="Full List" icon="o-clipboard-document-list" link="/clients" />
                            </x-menu-sub>
                            <x-menu-separator />
                            <x-menu-sub title="Machines" icon="o-radio">
                                <x-menu-item title="Register new" icon="o-swatch" link="/machines/register" />
                                <x-menu-item title="Full List" icon="o-clipboard-document-list" link="/machines" />
                            </x-menu-sub>
                        @php
                    } elseif(Auth::user()->type === "client") {
                        @endphp
                            <x-menu-item title="Machines" icon="o-radio" link="/my/machines" />
                        @php
                    }
                @endphp

            </x-menu>
            <div class="grid grid-cols-2 gap-4 my-4">
                <x-button label="Close" wire:click="closeDrawer" icon="o-x-circle" class="w-full"/>
                @php 
                    if(Auth::user()) {
                        @endphp
                            <x-button label="Logout" wire:click="logout" icon="o-arrow-left-end-on-rectangle" class="w-full"/>
                        @php
                    } else {
                        @endphp
                            <x-button label="Login" wire:click="login" icon="o-arrow-right-end-on-rectangle" class="w-full"/>
                        @php
                    }
                @endphp
            </div>
    </x-drawer>
    <x-button class="btn-sm btn-primary text-sky-50" icon='o-bars-4' wire:click="openDrawer" />
</header>

