@php
    /** @var \MailchimpMarketing\ApiClient $mailchimp */
    $mailchimp = app(\Astrogoat\Mailchimp\Mailchimp::class);
    $lists = $mailchimp->lists->getAllLists();
@endphp

<x-fab::forms.input
    label="Prompt to sign up"
    class="mt-6"
    name="payload[prompt]"
    wire:model="payload.prompt"
    wire:key="promobar_prompt"
/>

<x-fab::forms.input
    label="Successful Response"
    class="mt-6"
    name="payload[successful_response]"
    wire:model="payload.successful_response"
    wire:key="promobar_successful_response"
/>

<x-fab::forms.input
    label="Button Text"
    class="mt-6"
    name="payload[button_text]"
    wire:model="payload.button_text"
    wire:key="promobar_button_text"
/>

<x-fab::forms.select
    class="mt-6"
    label="List"
    name="payload[list_id]"
    wire:model="payload.list_id"
    wire:key="promobar_list_id"
>
    <option>-- Select list --</option>
    @foreach($lists->lists as $list)
        <option value="{{ $list->id }}">{{ $list->name }}</option>
    @endforeach
</x-fab::forms.select>

<x-fab::forms.checkbox
    label="Hide promobar after successful sign up?"
    class="mt-6"
    id="promobar_hide_after"
    name="payload[hide_after]"
    wire:model="payload.hide_after"
    wire:key="promobar_hide_after"
/>
