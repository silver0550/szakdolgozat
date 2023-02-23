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
  <div class="flex items-center gap-4">
      <p class="text-sm leading-5">
          {!! __('Showing') !!}
          @if ($paginator->firstItem())
              <span class="font-medium">{{ $paginator->firstItem() }}</span>
              {!! __('to') !!}
              <span class="font-medium">{{ $paginator->lastItem() }}</span>
          @else
              {{ $paginator->count() }}
          @endif
          {!! __('of') !!}
          <span class="font-medium">{{ $paginator->total() }}</span>
          {!! __('results') !!}
      </p>
      <select wire:model="perPage" class="select select-bordered">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="20">20</option>
          <option value="50">50</option>
      </select>
  </div>
</div>
