<x-layouts.app>

    <div class="flex flex-col gap-4 items-center">
    
        <h1 class="text-center text-3xl font-bold text-stone-900 my-2"><span class="text-primary"> Focus </span> on work, leave the care management to us</h1>

        <h2 class="text-center font-light text-stone-800 text-sm">In an extremely simple way, register your customers and machines. Using the QR code, your customer will be able to see all the services provided and request new ones.</h2>

        <a href="/login" class="block">
            <x-button icon='o-user-circle' class="btn-primary text-sky-50">
                I already have an account
            </x-button>
        </a>

        <div class="w-full flex flex-row gap-2 items-center justify-between my-6">
            <div class="bg-primary flex-1 h-px" ></div>
            <p class="uppercase text-primary">Or</p>
            <div class="bg-primary flex-1 h-px" ></div>
        </div>


        <h3 class="text-xl text-center font-semibold text-stone-900">Why create an <span class="text-primary uppercase"> air-saas </span> account?</h3>

        <h4 class="text-center font-light text-stone-800 text-sm">Free, modern and more efficient than writing down in a notebook.</h4>

        <livewire:home.feature-list-item icon='o-user-plus' title="Register a customer in 30 seconds!" subtitle="Write only the most important fields."/>

        <livewire:home.feature-list-item icon='o-radio' title="Register customer machines." subtitle="They will be able to view all maintenance carried out."/>

        <livewire:home.feature-list-item icon='o-qr-code' title="Simplified login via QR Code." subtitle="Just by reading the QR code the customer is redirected to the maintenance list for that machine."/>

        <livewire:home.feature-list-item icon='o-calendar-days' title="Customers can request maintenance." subtitle="With each request, an email will be sent notifying which machine needs repair or maintenance."/>

        <livewire:home.feature-list-item icon='o-banknotes' title="Again, it's free!" subtitle="Costs less than pen and paper as air-saas is free"/>

        <a href="/create-account" class="block mb-4">
            <x-button icon='o-user-circle' class="btn-primary text-sky-50">
                Create a free account
            </x-button>
        </a>

    </div>

</x-layouts.app>
