<livewire:astrogoat.mailchimp.subscribe-to-list
    :listId="$payload['list_id']"
    :hideAfter="$payload['hide_after'] ?? false"
    :prompt="$payload['prompt'] ?? ''"
    :buttonText="$payload['button_text'] ?? ''"
    :successfulResponse="$payload['successful_response'] ?? ''"
/>
