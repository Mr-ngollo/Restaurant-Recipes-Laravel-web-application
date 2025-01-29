<div>
    <select wire:change="switchLanguage($event.target.value)" class="border rounded p-2">
        <option value="en" {{ $currentLocale == 'en' ? 'selected' : '' }}>🇬🇧 English</option>
        <option value="sw" {{ $currentLocale == 'sw' ? 'selected' : '' }}>🇹🇿 Swahili</option>
    </select>
</div>
