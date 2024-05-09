<div class="my-5">
    <x-panel class="w-full mx-auto">
        <h2 class="font-bold mb-3 underline text-lg">
            Livewire Alpine Modal Examples
        </h2>
        <p>     
            See laracast video 
            Basically $showDeleteUserModal is tracked server side which is entagled with alpine 
            state show. 
            When delete button is clicked livewire wire:click=confirmDelete($userId) 
            method is called which sets showDeleteUserModal attribute to true 
            and sets currentUser(at mount its new User) 
           and when modal's confirm button is clicked it calls delete method 
            which deletes that current user and set $showDeleteUserModal to false.<br/><br/>
            <b>This example uses  
                wire:click="confirmDelete($user->id)"
                
                wire:click="$set("showDeleteUserModal", false)" 

                wire:click="delete"
                $entangle etc
            </b>
        </p>
    </x-panel>
</div>
