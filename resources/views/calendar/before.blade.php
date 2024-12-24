<div class='flex justify-between w-full items-center'>
    <div>
        <h1 class='text-xl font-semibold my-5'>({{ $this->startsAt->format('d-M-y') . ' to ' . $this->endsAt->format('d-M-y') }})</h1>
    </div>

    <div>
        <button class='text-white bg-slate-800 px-3 py-1 rounded-md' wire:click='goToPreviousMonth'>Prev</button>
        <button class='text-white bg-slate-800 px-3 py-1 rounded-md' wire:click='goToNextMonth'>Next</button>
    </div>
</div>