<x-app-layout>
    <x-panel class="w-full mx-auto my-5">
        SOURCE: 
                
        <a class="underline text-blue-600" href="https://laracasts.com/series/modals-with-the-tall-stack" target="_blank">
            https://laracasts.com/series/modals-with-the-tall-stack
        </a>
    </x-panel>
    <x-panel class="w-full mx-auto my-5">
        <h2 class="font-bold mb-3 underline text-lg">Alpine Modal Examples: Show Hash based Alpine Modal (Reusing Same Modal)</h2>
        <p>     
            <a href="#user-delete-modal" class="underline text-blue-600">
                Show User Delete Confirm Modal
            </a>
        </p>
        <p>     
            <a href="#something-else-modal" class="underline text-blue-600">
                Show Something else Modal
            </a>
        </p>
        <div class="my-3">    
            <form 
                action="" 
                method="POST" 
                x-data 
                @submit.prevent="
                    location.hash='#user-delete-modal-2';
                "
                id="delete-user-form"
            > 
                @csrf

                <x-modal-practice.button type="sunmit" class="bg-blue-400 hover:bg-blue-500">
                    Delete User
                </x-modal-practice.button>
                 (This is inside the form, so clicking continue button on modal
                    should communicate back as yes to submit this form)
            </form>
        </div>
    </x-panel>

    @livewire('delete-user')

    @push('modals')

    <x-modal-practice.confirmation-modal name="user-delete-modal">
        <x-slot name="title">
            User Delete Confirm Modal
        </x-slot>

        This is User Delete Confirm Modal

        <x-slot name="footer">
            <a href="#" class="bg-gray-400 hover:bg-grey-500 text-xs uppercase py-2 px-4 transition-all rounded text-white duration-200 mr-2">Cancel</a> 
            <x-modal-practice.button class="bg-blue-400 hover:bg-blue-500">Continue</x-modal-practice.button>
        </x-slot>
    </x-modal-practice.confirmation-modal>

    <x-modal-practice.confirmation-modal name="something-else-modal">
        <x-slot name="title">
            Something else
        </x-slot>
        I am some thing else modal
        <x-slot name="footer">
            <a href="#" class="bg-gray-400 hover:bg-grey-500 text-xs uppercase py-2 px-4 transition-all rounded text-white duration-200 mr-2">Cancel</a> 
            <x-modal-practice.button class="bg-blue-400 hover:bg-blue-500">Continue</x-modal-practice.button>
        </x-slot>
    </x-modal-practice.confirmation-modal>
        
    <x-modal-practice.confirmation-modal name="user-delete-modal-2">
            <x-slot name="title">
                Are you Really want to delete?
            </x-slot>
    
            Continuing will delete your account permanently
    
            <x-slot name="footer">
                <a href="#" class="bg-gray-400 hover:bg-grey-500 text-xs uppercase py-2 px-4 transition-all rounded text-white duration-200 mr-2">Cancel</a> 
                <x-modal-practice.button 
                    class="bg-blue-400 hover:bg-blue-500"
                    @click="document.querySelector('#delete-user-form').submit()"
                >
                    Continue
                </x-modal-practice.button>
            </x-slot>
    </x-modal-practice.confirmation-modal>

    @endpush

</x-app-layout>