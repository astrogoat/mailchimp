@unless($hideAfter === true && session()->get('astrogoat.mailchimp.lists.id') === $listId && session()->get('astrogoat.mailchimp.lists.status') === 'subscribed')
    <div class="bg-teal-300 text-teal-800 text-center">
        <div class="container mx-auto py-2 px-6">
            @unless($subscribed)
                {{ $prompt }}
                <input
                    type="email"
                    name="email"
                    wire:model="email"
                    class="ml-4 h-8 border-0 rounded-md text-sm w-60 bg-teal-50"
                    placeholder="Email address"
                >
                @error('email') <span class="error">{{ $message }}</span> @enderror
                <button wire:click="subscribe" class="ml-3 bg-teal-500 px-2 py-1.5 uppercase rounded-md text-sm">{{ $buttonText }}</button>
            @else
                <span class="font-bold">
                    {{ $successfulResponse }}
                </span>
            @endif
        </div>
    </div>
@endunless
