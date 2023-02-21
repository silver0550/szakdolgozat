@props([
    'for' => 'my-modal',
])

<div class="modal-box w-11/12 max-w-5xl">
    <h3 class="font-bold text-lg">Felhasználó hozzáadása!</h3>
    <p class="py-4">Kérem adja meg a felhasználó adatait</p>
    <div class="modal-action justify-around">
      <label {{ $attributes->whereDoesntStartWith('wire:key') }} for="{{ $for }}" class="btn btn-primary">Mentés</label>
      <label for="{{ $for }}" class="btn btn-primary">Mégse</label>
    </div>
  </div>s