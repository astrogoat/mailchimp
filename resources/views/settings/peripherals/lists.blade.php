<div x-data="{
    create: {
        show: false,
    }
}" class="w-full">
    <x-fab::layouts.panel
        class="mb-10"
        title="Create new list"
        x-cloak
        x-show="create.show"
    >
        <form wire:submit.prevent="create" class="w-full gap-4 mb-4">
            <x-fab::forms.input
                size="xs"
                label="List Name"
                class="w-full mb-4"
                wire:model="create.name"
                help="The name of the audience list"
            />
            <x-fab::forms.input
                size="xs"
                label="Permission reminder"
                class="w-full mb-4"
                wire:model="create.permission_reminder"
                help="Remind recipients how they signed up to your list. E.g. 'You signed up for updates on our website.'"
            />
            <x-fab::forms.select
                label="Email type"
                help="Whether the list supports multiple formats for emails. When set to Yes, subscribers can choose whether they want to receive HTML or plain-text emails. When set to No, subscribers will receive HTML emails, with a plain-text alternative backup."
                wire:model="create.email_type_option"
            >
                <option value="true">Yes</option>
                <option value="false">No</option>
            </x-fab::forms.select>

            <x-fab::layouts.panel
                title="Campaign defaults"
                description="Default values for campaigns created for this list."
            >
                <div class="grid grid-cols-2 gap-4">
                    <x-fab::forms.input size="xs" label="From name" class="w-full" wire:model="create.campaign_defaults.from_name" />
                    <x-fab::forms.input size="xs" label="From email" class="w-full" wire:model="create.campaign_defaults.from_email" />
                    <x-fab::forms.input size="xs" label="Subject" class="w-full" wire:model="create.campaign_defaults.subject" />
                    <x-fab::forms.input size="xs" label="Language" class="w-full" wire:model="create.campaign_defaults.language" help="A two-character ISO3166 country code." />
                </div>
            </x-fab::layouts.panel>

            <x-fab::layouts.panel
                title="Contact information"
                description="Contact information displayed in campaign footers to comply with international spam laws."
            >
                <div class="grid grid-cols-2 gap-4">
                    <x-fab::forms.input size="xs" label="List Contact Company" class="w-full" wire:model="create.contact.company" />
                    <x-fab::forms.input size="xs" label="List Contact Address" class="w-full" wire:model="create.contact.address1" />
                    <x-fab::forms.input size="xs" label="List Contact City" class="w-full" wire:model="create.contact.city" />
                    <x-fab::forms.input size="xs" label="List Contact Country" class="w-full" wire:model="create.contact.country" help="A two-character ISO3166 country code." />
                </div>
            </x-fab::layouts.panel>
        </form>

        <x-slot name="footer">
            <x-fab::elements.button class="mr-4" x-on:click="create.show = false">Cancel</x-fab::elements.button>
            <x-fab::elements.button primary type="submit" wire:click="create">Create</x-fab::elements.button>
        </x-slot>
    </x-fab::layouts.panel>

    <x-fab::lists.table title="Lists">
        <x-slot name="actions">
            <x-fab::elements.button size="xs" x-on:click="create.show = true">
                New List
            </x-fab::elements.button>
        </x-slot>
        <x-slot name="headers">
            <x-fab::lists.table.header>Name</x-fab::lists.table.header>
            <x-fab::lists.table.header>ID</x-fab::lists.table.header>
            <x-fab::lists.table.header>Double Opt In</x-fab::lists.table.header>
        </x-slot>

        @foreach($this->lists() as $list)
{{--            @dd($list)--}}
            <x-fab::lists.table.row :odd="$loop->odd">
                <x-fab::lists.table.column full primary>{{ $list->name }}</x-fab::lists.table.column>
                <x-fab::lists.table.column>{{ $list->id }}</x-fab::lists.table.column>
                <x-fab::lists.table.column>{{ $list->double_optin ? 'Yes' : 'No' }}</x-fab::lists.table.column>
            </x-fab::lists.table.row>
        @endforeach
    </x-fab::lists.table>
</div>
