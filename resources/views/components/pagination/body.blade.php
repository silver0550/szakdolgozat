<div class="flex justify-between items-center">
  <div class="btn-group">
      <button class="btn" wire:click="previousPage" @disabled($paginator->onFirstPage())>«</button>
      @foreach($elements as $element)
          @if (is_string($element))
              <button class="btn" disabled>{{ $element }}</button>
          @endif

          @if (is_array($element))
              @foreach ($element as $page => $url)
                  <button wire:click="gotoPage({{ $page }})" @class(['btn', 'btn-active' => $page === $paginator->currentPage()])>
                      {{ $page }}
                  </button>
              @endforeach
          @endif
      @endforeach
      <button class="btn" wire:click="nextPage" @disabled(!$paginator->hasMorePages())>»</button>
  </div>
  <div class="flex items-center gap-4 ml-2">
      <select wire:model="pageSize" class="select select-bordered">
          {{-- <option value="5">5</option> --}}
          <option value="10">10</option>
          <option value="15" selected >15</option>
          <option value="20">20</option>
          <option value="50">50</option>
      </select>
  </div>
</div>
