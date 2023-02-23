@props([
  'paged'
  ])

<div {{$attributes->merge(['class' =>'inlin-block'])}}>
    {{$paged->links()}}
</div>