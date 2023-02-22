@props([
    'for' => 'my-modal',
])

<div class="modal-box w-11/12 max-w-5xl">
    <h3 class="font-bold text-lg">Felhasználó hozzáadása!</h3>
    <p class="py-4">Kérem adja meg a felhasználó adatait</p>
    
    <x-input.form-control-together label='Név'><x-input.text/></x-input.form-control-together>
    <x-input.form-control-together label='Email'><x-input.text/></x-input.form-control-together>
    <x-input.form-control-together label='Valami'><x-input.text/></x-input.form-control-together>
      {{-- TODO: error handling, style, swiching input text--}}
    
    <div class="modal-action justify-around">
      <label {{ $attributes->whereDoesntStartWith('wire:key') }} for="{{ $for }}" class="btn btn-primary">Mentés</label>
      <label for="{{ $for }}" class="btn btn-primary">Mégse</label>
    </div>
  </div>