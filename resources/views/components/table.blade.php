<div {{ $attributes->merge(['class' =>'overflow-x-auto w-full'])}} >
    <table class="table table-zebra table-compact w-full">
        <thead>
            <tr class="text-center">
                {{ $head }}
            </tr>
        </thead>

        <tbody class="text-center">
            {{ $body }}
        </tbody>
    </table>
</div>
