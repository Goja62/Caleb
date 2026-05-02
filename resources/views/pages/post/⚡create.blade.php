<?php

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts.app', ['title' => 'Create Post'])] class extends Component {
    public $title = '';

    public $content = '';

    public function save()
    {
        Post::create(
            $this->validate([
                'title' => 'required|min:3',
                'content' => 'required',
            ]),
        );

        $this->redirect('/');
    }
};
?>
<div class="absolute inset-0 p-6 items-center justify-center">
    <form wire:submit="save" class="w-96 space-y-6">
        <label class="block space-y-2">
            <p
                class="inline-flex items-center text-sm font-medium [-:where(&)]:text-zinc-800 [:where(&)]:dark:text-white [&:has(#title)]:mt-3 text-red-500">
                Title
            </p>
        </label>
        <input type="text"
            class="w-full border rounded-lg block disabled:shadow-none dark:shadow-none appearance-none text-gray-900" />
        @error('title')
        <div class="mt-3 text-sm font-medium text-red-500 dark:text-red-400">{{ $message }}</div>
        @enderror
    </form>

    <label class="block space-y-2">
        <p class="inline-flex items-center text-sm font-medium [&:where(&)]:text-zinc-800 [:where(&)]:dark:text-white">
            Content
        </p>
        <textarea class="block p-3 w-full shadow-xs disabled:shadow-none border rounded-lg bg-white dark:bg-gray-900"></textarea>
    </label>

    <button type="submit"
        class="relative items-center font-medium justify-center gap-2 whitespace-nowrap disabled:opacity-7">
        Save
    </button>
</div>