 @if (session()->has('status'))
     <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="pt-8 pl-8 text-lg font-bold text-red-500">
         {{ session('status') }}
     </div>
 @endif
